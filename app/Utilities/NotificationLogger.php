<?php

namespace App\Utilities;

use Log;

final class NotificationLogger{

	const CHANNEL = "notificationsys";

	public function __construct(){
		
	}

	public function writeToLog($level, $eventType, $inputMessage, $registeredBy, $channel = self::CHANNEL){
		
		$message = $this->buildLoggerRecord($level, $eventType, $inputMessage, $registeredBy);
		return $this->chooseLoggingLevel($level, $message);

	}

	private function buildLoggerRecord($level, $eventType, $inputMessage, $registeredBy){
		return "{$level}  {$eventType}  {$inputMessage}  {$registeredBy}";		
	}

	private function chooseLoggingLevel($level, $message){

		if($message != ''){
			switch ($level) {
				case 'emergency':
					Log::channel(self::CHANNEL)->emergency($message);
					break;

			    case 'alert':
					Log::channel(self::CHANNEL)->alert($message);
					break;

				case 'critical':
					Log::channel(self::CHANNEL)->critical($message);
					break;

				case 'error':
					Log::channel(self::CHANNEL)->error($message);
					break;

				case 'warning':
					Log::channel(self::CHANNEL)->warning($message);
					break;

				case 'notice':
					Log::channel(self::CHANNEL)->notice($message);
					break;

				case 'info':
					Log::channel(self::CHANNEL)->info($message);
					break;

			    case 'debug':
					Log::channel(self::CHANNEL)->debug($message);
					break;
				
				default:
					throw new Exception("Invalid Message", 1);
					break;
			}
		}

		return false;
	}

}	