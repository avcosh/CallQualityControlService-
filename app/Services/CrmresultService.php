<?php
namespace App\Services;
use App\ThirdParty\Crest\Crest;
//error_reporting(E_ERROR);
set_time_limit(500);

class CrmresultService
{
    public function getDealsCategoriesList()
	{
		$result = CRest::call(
				'crm.dealcategory.list',
				[] 
							
			);
		
		$arr = [];
		$i = 0;
		foreach($result['result'] as $res){
			$arr[$i]['ID'] = $res['ID'];
			$arr[$i]['NAME'] = $res['NAME'];
			$i++;
		}
		return $arr;
	}
	
	public function getSuccessLeadStage()
	{
	    $result = CRest::call(
				'crm.status.list',
				[
				    'filter' => [
					  'ENTITY_ID' => 'STATUS'
					],
				] 
							
			);
		foreach($result['result'] as $res) :?>
		    <option value="<?=$res['STATUS_ID']?>"><?=$res['NAME']?></option>	
		<?php endforeach?><?php	
	}
	
	public function getLeadStageEdit($successStage)
	{
	    $result = CRest::call(
				'crm.status.list',
				[
				    'filter' => [
					  'ENTITY_ID' => 'STATUS'
					],
				] 
							
			);
		foreach($result['result'] as $res) :?>
		  <option value="<?=$res['STATUS_ID']?>" <?=$successStage == $res['STATUS_ID'] ? "selected" : "" ?>>
			<?=$res['NAME']?>
		  </option>	
		<?php endforeach?><?php	
	}
	
	public function getSuccessDealStage($category)
	{
		$result = CRest::call(
				'crm.dealcategory.stage.list',
				[
				   'id' => $category
				] 
			);
		foreach($result['result'] as $res) :?>
		    <option value="<?=$res['STATUS_ID']?>"><?=$res['NAME']?></option>	
		<?php endforeach?><?php
	}
	
	public function getDealStageEdit($category, $success_stage)
	{
		$result = CRest::call(
				'crm.dealcategory.stage.list',
				[
				   'id' => $category
				] 
			);
		foreach($result['result'] as $res) :?>
		    <option value="<?=$res['STATUS_ID']?>" <?=$success_stage == $res['STATUS_ID'] ? "selected" : "" ?>>
			<?=$res['NAME']?>
			</option>	
		<?php endforeach?><?php
	}
	
	
	public function getDealsCategoriesName($id)
	{
	    $result = CRest::call(
				'crm.dealcategory.list',
				[
				  'filter' => 
				  [
				      'ID' => $id
				  ]
				] 
			);	
		return $result['result'][0]['NAME'];
	}
	
	public function getLeadStageName($statusId)
	{
	    $result = CRest::call(
				'crm.status.list',
				[
				    'filter' => [
					  'ENTITY_ID' => 'STATUS',
					  'STATUS_ID' => $statusId,
					],
				] 
							
			);	
		return $result['result'][0]['NAME'];
	}
	
	public function getDealStageName($stage)
	{
	    $result = CRest::call(
				'crm.status.list',
				[
				    'filter' => [
					    'STATUS_ID' => $stage,
					],
				] 
							
			);	
		return $result['result'][0]['NAME'];	
	}
	
}