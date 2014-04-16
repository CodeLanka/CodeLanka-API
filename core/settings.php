<?php

/**
* 
*/
class Settings
{
	public $settings;
	public $jsonSettings;  // API Settings
	public $sysSettings;  // Sys Settings

	function __construct(){
		
		$this->makeApiSettings();
		$this->makeSysSettings();
	}

	public function makeSysSettings(){
		$settings=file_get_contents("data/settings.json");
		$this->sysSettings=json_decode($settings,true);
	}

	public function makeApiSettings()
	{
		$settings=file_get_contents("data/apis.json");
		$this->jsonSettings=json_decode($settings,true);
		//var_dump($settings);
	}
}

?>