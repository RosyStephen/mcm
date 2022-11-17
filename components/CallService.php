<?php
	namespace app\components;
	
	
	use Yii;
	use yii\base\Component;
	use yii\base\InvalidConfigException;
	use \yii\base\Exception;
	
	class CallService extends Component
	{
		
		public $apiUrl = 'https://restcountries.com/v3.1';
		public $LOGIN = 'society';
		public $PASSWORD = '123456';
		public $VERSION = '4.0';
		public $LANGUAGE =  'en';
		public $SSL_VERIFICATION = false;
		
		public function  countryList($serviceName, $parameters){
			
			
			$request = json_encode(array('p' => $parameters));
			
			$serviceUrl = $this->apiUrl . '/'.$serviceName;
		//	echo  \yii\helpers\VarDumper::dumpAsString($parameters,10,10);
			$headers = array("Content-type: application/json;charset=utf-8",
			"Accept: application/json",
			"Cache-Control: no-cache",
			"Pragma: no-cache"
			//"Content-Length:".strlen($request)
			);
			
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $serviceUrl);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
			curl_setopt($ch, CURLOPT_TIMEOUT, 60);
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
			curl_setopt($ch, CURLOPT_POSTFIELDS, $request);
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, $this->SSL_VERIFICATION);$curl = curl_init();

			
			$response = curl_exec($curl);
			
			$response = curl_exec($ch);
			//print_r($response);
			$network_err = curl_errno($ch);
			if ($network_err) {
				Yii::error('curl_err: ' . $network_err);
				throw new Exception($network_err);
			}
			else {
				$httpStatus = (int)curl_getinfo($ch, CURLINFO_HTTP_CODE);
				curl_close($ch);
				if ($httpStatus == 200)  {
					
					$unwrapResponse = json_decode($response);
					return $unwrapResponse;
				}
				else {
					throw new  Exception("Country service return HttpStatus $httpStatus");
				}
			}
		}
		public function getUserIP() {
			$ip = '';
			if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
				$ip = $_SERVER['HTTP_CLIENT_IP'];
			}
			elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
				$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
			}
			elseif (!empty($_SERVER['REMOTE_ADDR'])) {
				$ip = $_SERVER['REMOTE_ADDR'];
			}
			else {
				$ip = "127.0.0.1";
			}
			return $ip;
		}
		
	}
?>