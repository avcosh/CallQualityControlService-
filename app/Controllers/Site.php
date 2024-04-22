<?php
namespace App\Controllers;
use App\ThirdParty\Crest\Crest;
use App\Services\EventService;
use App\Services\TranscriptionService;
use App\Services\CoincidenceService;
use App\Services\EntityService;
use App\Models\Calldata;
set_time_limit(500);

class Site extends BaseController
{
    public function index()
    {
        return view('site/index' , ['title' => ""]);
    }
	
	public function install()
    {
        $result = CRest::installApp();
		
		// Привязываем событие при установке приложения
		CRest::call(
		'event.bind',
		[
			'EVENT' => 'OnVoximplantCallEnd',
			'HANDLER' => base_url(route_to('site.event')), // url обработчика события 
		]
	    );
		
	
    }
	
	public function event()
    {
        /* Происходит событие OnVoximplantCallEnd - Б24 передает данные. 
		 * Принимаем и пишем в переменную Идентификатор звонка
		*/
		//global $_REQUEST; // Предположение
		//$callId = $_REQUEST['data']['CALL_ID']; 
		
		// Пока МОК
		//$callId = 'externalCall.354a6922914151b23fd783d5f6230225.1709706756'; // ЛИД
		$callId = 'externalCall.532965e88b9b34e7f25e609599b63efc.1709795650'; // КОНТАКТ
		
		$transcriptionService = new TranscriptionService();
		$eventService = new EventService($transcriptionService, $callId);
		$calldataId = $eventService->getData(); // Данные о звонке записываются в БД возвращается ID записи
		
		// Нашел в text совпадения с trackedtexts и записал в таблицу usedtags
	    $coincidenceService = new CoincidenceService();
		$coincidenceService->getCoincidence();
		
		// Получаем данные о звонке из таблицы calldata
		$calldata = new Calldata();
        $call = $calldata->find($calldataId);
		
		//Смотришь лид или сделка если ЛИД - ставлю CONST time лида  - CONST время ожидания от calltext 
		// 
		if($call->crmEntityType == "LEAD"){
		    sleep((getenv('app.LEADTIMEOUT')) - (getenv('app.TRANSCRIPTIONSERVICETIMEOUT'))); // в файле .env	
		}elseif($call->crmEntityType == "DEAL"){
		    sleep((getenv('app.DEALTIMEOUT')) - (getenv('app.TRANSCRIPTIONSERVICETIMEOUT'))); // в файле .env	
		}else{
			echo "Неверный тип сущности в site";
			echo $call->crmEntityType;
			die;
		}
        
		// Записываю текущий статус лида | воронку и статус сделки, в таблицу  calldata
		$entityService = new EntityService($call);
		$entityService->setCurrentStage(); 
        		
	}
	
}
