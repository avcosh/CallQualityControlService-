<?php
namespace App\Services;
use App\ThirdParty\Crest\Crest;
use App\Models\Calldata;
use App\Models\Text;
use App\Models\TrackedText;
use App\Models\Usedtag;
//error_reporting(E_ERROR);
set_time_limit(500);

class CoincidenceService
{
	public function getCoincidence()
	{
		$trackedText = new TrackedText();
		$text = new Text();
		$usedtag = new Usedtag();
		  
		
		$trackedTextswho1 = $trackedText->where('who', 1)->findAll();
	    $textswho1 = $text->where('channel', 1)->findAll();
	
		$trackedTextswho2 = $trackedText->where('who', 2)->findAll();
	    $textswho2 = $text->where('channel', 2)->findAll();
	
		$tags = [];
		$i = 0;
		foreach($trackedTextswho1 as $tt1){
		    foreach($textswho1 as $t1){
				if ( (strstr( mb_strtolower($t1->text),  mb_strtolower($tt1->trackedtext))) || (stripos( mb_strtolower($tt1->trackedtext),  mb_strtolower($t1->text)) !== false) ) {
				$tags[$i]['tag'] = $tt1->tag;	
				$tags[$i]['calldata_id'] = $t1->calldata_id;
				$i++;
				} 	
			}
        }
		
		foreach($trackedTextswho2 as $tt2){
		    foreach($textswho2 as $t2){
				if ( (strstr( mb_strtolower($t2->text),  mb_strtolower($tt2->trackedtext))) || (stripos( mb_strtolower($tt2->trackedtext),  mb_strtolower($t2->text)) !== false) ) {
				$tags[$i]['tag'] = $tt2->tag;	
				$tags[$i]['calldata_id'] = $t2->calldata_id;
                $i++;				
				} 	
			}
        }
	    
		$result = [];
        foreach ($tags as $tag) {
            $is_unique = true;
            foreach ($result as $item) {
                if ($item['tag'] === $tag['tag']) {
                    $is_unique = false;
                    break;
                }
            }

            if ($is_unique) {
                $result[] = $tag;
            }
        }
		
		foreach($result as $res){
		    $usedtag->insert($res);	
		}
		
		
		
	}
}