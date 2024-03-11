<?php
namespace App\Services;
use App\ThirdParty\Crest\Crest;
use \DateTime;
//error_reporting(E_ERROR);
set_time_limit(500);

class TranscriptionService
{
	
    public function getText($downloadUrl)
	{
	    // Отправляю файл в сервис
        $token = '7c824320ed4c54d46ada8e8b0c8b736c16c1ecfc';
    
        $header = [
            'Authorization: Token ' . $token,
            'Content-Type: multipart/form-data',
        ];

        $ch = curl_init();

		//Устанавливаем URL для запроса
		curl_setopt($ch, CURLOPT_URL, 'https://calltext.ru/api/upload/');
		curl_setopt($ch,CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		//Устанавливаем тип запроса
		curl_setopt($ch, CURLOPT_POST, 1);
		//Устанавливаем заголовки
		curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
		//Устанавливаем тело запроса -  файл
		curl_setopt($ch, CURLOPT_POSTFIELDS, [
		    'file' => new \CurlFile($downloadUrl),
		    'category' => 'www'
		]);
	 

		$result = curl_exec($ch);
	   
		if(curl_errno($ch)){
			echo "Ошибка при выполнении запроса: " . curl_error($ch);
		}
		else {
		    $data = json_decode($result, true);
		    $slug = $data['slug'];
        }
	
        curl_close($ch);
	    //echo $slug; //Его далее передавать
	    //die;
		sleep(getenv('app.TRANSCRIPTIONSERVICETIMEOUT')); //5 минут в файле .env
		
		// Получаю текст из сервиса
		
		//$slug = 'b109c72b-aa9b-4946-9ac1-f72974f7c4d4'; // Пока МОК
		$header2 = [
            'Authorization: Token ' . $token,
        ];

        $ch2 = curl_init();

		//Устанавливаем URL для запроса
		curl_setopt($ch2, CURLOPT_URL, 'https://calltext.ru/api/texts/?cslug=' . $slug);
		//curl_setopt($ch2, CURLOPT_URL, 'https://calltext.ru/api/texts/');
		curl_setopt($ch2,CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch2, CURLOPT_RETURNTRANSFER, 1);
		
		//Устанавливаем заголовки
		curl_setopt($ch2, CURLOPT_HTTPHEADER, $header2);
	
		$result2 = curl_exec($ch2);
	   // dd($result2);
		if(curl_errno($ch2)){
			echo "Ошибка при выполнении запроса: " . curl_error($ch2);
		}
		else {
		    $data2 = json_decode($result2, true);
		}
		 
        curl_close($ch2);
	    //d($data2);
		return $data2;
		/*$text = '';
		foreach($data2[0]['raw'] as $res){
		 $text .= $res['text'] . " , ";
          		 
		}
	
		return $text;*/
		
	}
	
}