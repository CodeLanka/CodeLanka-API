<?php

/**
* 
*/
class Response{

	public function processResponse($array,$type="json"){
		
		if ($type=="json") {
			header ("Content-Type:application/json");
			$this->showresponse(json_encode($array));
		}else if ($type=="xml") {
			header ("Content-Type:text/xml");
			$this->showresponse(ContentTypeGen::toxml($array));
		}

	}

	public  function showresponse($response){
		echo $response;
	}


}

?>