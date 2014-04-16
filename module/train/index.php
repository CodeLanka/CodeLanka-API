<?php

/**
* 
*/
class train
{
	private $req;
	function __construct($req)
	{
		$this->req = $req;
	}

	public function getplace()
	{
		$res = array("from" => "colombo", 
				"to"=>"maharagama",  'times' => array("s"=>"a,a,,a,a")
			);
		return $res;
	}
}

?>