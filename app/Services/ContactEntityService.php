<?php
namespace App\Services;
use App\ThirdParty\Crest\Crest;
use App\Models\Calldata;
use App\Models\Text;
//error_reporting(E_ERROR);
set_time_limit(500);

class ContactEntityService
{
    public function getDealByContact($contactId)
	{
	    $result = CRest::call(
				'crm.deal.list',
				[
					'filter' => [
					  'CONTACT_ID' => $contactId,
					  'STAGE_SEMANTIC_ID' => "P",
                			  
					],
				]
		);
		
       return $result['result'][0]['ID'];
				
	}	
}