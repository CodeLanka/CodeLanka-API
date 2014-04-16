<?php

/**
* 
*/
class Validator
{
	public $settings;

	function __construct($settings)
	{
		$this->settings=$settings;
	}

	public function checkMethod($chkapi, $ckmethod)
	{
		$apimethodes = $this->settings[$chkapi];
		foreach ($apimethodes as $key => $value) {

			if (isset( $apimethodes[$key][$ckmethod])) {
				return true;
			}
		}
		return false;
	}

	public function checkApi($chkapi)
	{
		return isset($this->settings[$chkapi]);
	}
}

?>