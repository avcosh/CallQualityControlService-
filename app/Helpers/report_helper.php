<?php
use App\ThirdParty\Crest\Crest;

    function sourceGet()
	{
	    $result = CRest::call(
			'crm.status.list',
			[
			 'filter' => [
					'ENTITY_ID' => 'SOURCE',
					
				],	
				
			]
			);
			
		   foreach($result['result'] as $res):?>
			<option value="<?=$res['STATUS_ID']?>"><?=$res['NAME']?></option>   
		   <?php endforeach ?> <?php
			
		   
	}
	
    function sourceNameGet($status_id)
	{
	    if($status_id == NULL){
			echo "Все источники";
			return;
		}
		$result = CRest::call(
			'crm.status.list',
			[
			 'filter' => [
					'ENTITY_ID' => 'SOURCE',
					'STATUS_ID' => $status_id
					
					
				],	
				
			]
			);
		echo $result['result'][0]['NAME'];
			
		   
	}