<?php
namespace App\Services;
use App\ThirdParty\Crest\Crest;
use App\Models\Calldata;
//error_reporting(E_ERROR);
set_time_limit(500);

class EntityService
{
	public $call;
	public $callData;
	
	public function __construct($call)
	{
		$this->call = $call;
		$this->callData = new Calldata();
	}
	
	public function setCurrentStage()
	{
		if($this->call->crmEntityType == "LEAD"){ 
			
			$result = CRest::call(
				'crm.lead.list',
				[
					'filter' => [
					  'ID' => $this->call->crmEntityId,
                			  
					],
				]
		    );
			$currentStage = $result['result'][0]['STATUS_ID'];
            $data = [
				'currentStage' => $currentStage,
			];			
			$this->callData->update($this->call->id, $data);
			
	    }elseif($this->call->crmEntityType == "DEAL"){
			
			 $result = CRest::call(
				'crm.deal.list',
				[
					'filter' => [
					  'ID' => $this->call->crmEntityId,
                			  
					],
				]
		    );
			
			$currentCategory = $result['result'][0]['CATEGORY_ID'];
			$currentStage = $result['result'][0]['STAGE_ID'];
			 $data = [
				'currentCategory' => $currentCategory,
				'currentStage'    => $currentStage,
			];
			
			$this->callData->update($this->call->id, $data);
			
		}else{
			echo "Неверный тип сущности в EntityService";
		}
		
	}
	
}