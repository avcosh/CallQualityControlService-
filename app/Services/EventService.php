<?php
namespace App\Services;
use App\ThirdParty\Crest\Crest;
use App\Models\Calldata;
use App\Models\Text;
use App\Services\ContactEntityService;
//error_reporting(E_ERROR);
set_time_limit(500);

class EventService
{
	public $callId;
	public $transcriptionService;
	
	public function __construct($transcriptionService, $callId)
	{
		$this->transcriptionService = $transcriptionService;
		$this->callId = $callId;
	}
	
    public function getData()
	{
	    // Получаю данные о звонке,зная его CALL_ID
	    $result = CRest::call(
				'voximplant.statistic.get',
				[
					'filter' => [
					  'CALL_ID' => $this->callId, 
					],
				]
		);
		
	  
		$callStartDate = $result['result'][0]['CALL_START_DATE']; // Время инициализации звонка
		$callType =      $result['result'][0]['CALL_TYPE']; // Тип звонка: 1 Исходящий, 2 Входящий.
		$callDuration =  $result['result'][0]['CALL_DURATION']; // Продолжительность звонка в секундах
		$crmEntityType = $result['result'][0]['CRM_ENTITY_TYPE']; // Тип связанной сущности
		$crmEntityId =   $result['result'][0]['CRM_ENTITY_ID']; // ID связанной сущности
		$recordFileId =  $result['result'][0]['RECORD_FILE_ID']; // Идентификатор файла с записью звонка
		$portalUserId =  $result['result'][0]['PORTAL_USER_ID']; // Идентификатор пользователя звонившего или ответившего
	
		// получаю DOWNLOAD_URL
		$result2 = CRest::call(
				'disk.file.get',
				[
					'id' => $recordFileId, 
				]
			);
		$localdownloadUrl =  $result2['result']['DOWNLOAD_URL']; // Загрузка файла
		
		//$downloadUrl =  $result2['result']['DETAIL_URL']; // Вот это ссылка на файл
		
	    //Сохраняю файл локально
		$folder = date('s');
		file_put_contents("uploads/{$folder}.mp3", file_get_contents($localdownloadUrl));
		
		$downloadUrl = "uploads/$folder.mp3";
	
		//Отправляю файл в сервис и получаю текст
        $textData = $this->transcriptionService->getText($downloadUrl);

        // Удаляю файл	
		if (unlink($downloadUrl)) {
		    echo "Файл успешно удален";
		} else {
			echo "Не удалось удалить файл";
		}
		
		//if $crmEntityType == CONTACT - получаю сделки этого контакта, беру активную и ее пишу в БД
		if($crmEntityType == "CONTACT"){
		    $contactEntityService = new ContactEntityService();
            $crmEntityId = $contactEntityService->getDealByContact($crmEntityId);
            $crmEntityType = "DEAL";
           			
		}
		
		//Возвращаю данные о звонке + текст звонка
        $data = [];
		$data['callStartDate'] = $callStartDate;
		$data['callType'] = $callType;
		$data['callDuration'] = $callDuration;
		$data['crmEntityType'] = $crmEntityType; // Только лид или сделка
		$data['crmEntityId'] = $crmEntityId;
		$data['recordFileId'] = $recordFileId;
		$data['portalUserId'] = $portalUserId;
		
		
		
		// Записываю данные в таблицу calldata
		$calldata = new Calldata();
		$calldata->insert($data);
		$calldataId = $calldata->getInsertID();
		
		// Записываю данные в таблицу text
		$text = new Text();
		$textContent = [];
		$i = 0;
		foreach($textData[0]['raw'] as $raw){
		 $textContent[$i]['text'] = $raw['text'];
		 $textContent[$i]['time'] = $raw['time'];
		 $textContent[$i]['channel'] = $raw['channel'];
		 $textContent[$i]['calldata_id'] = $calldataId;
		 $i++;
		}
		foreach($textContent as $textCont){
		    $text->insert($textCont);
		}
		
		return $calldataId;
	}
	
}