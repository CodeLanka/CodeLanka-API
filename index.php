<?php

	// Import Core Files
	require "core/settings.php";
	require "core/validation.php";
	require "core/reponse.php";
	require "helpers/contenttypegen.php";

	$setting = new Settings();

	// In coming request
	$_REQUEST['api']  = "train";
	$_REQUEST['method'] = "getplace";
	$_REQUEST['type'] = "json";

	// Sterilization
	$api 	= strtolower(trim($_REQUEST['api']));
	$method = strtolower(trim($_REQUEST['method']));
	$type 	= strtolower(trim($_REQUEST['type']));

	// Ini validation and reponse
	$vali = new Validator($setting->jsonSettings);
	$res = new Response();

	if ($vali->checkApi($api)) {
		if ($vali->checkMethod($api,$method)) {

			// Loading the api module
			require 'module/'.$api.'/index.php';
			$apiClassName = $api;

			// Make Module Object
			$apiobj = new $apiClassName($_REQUEST);

			// Make Module API Methode Call
			$response = $apiobj->$method();

			// Make the content type of the reponse
			$res->processResponse($response,$type);

		}else{
			$res->processResponse(
				array("reponseMessage"=>$setting->sysSettings["err-api-methode-not"]["msg"]
			));
		}
	}else{
		$res->processResponse(array("reponseMessage"=>
			$setting->sysSettings["err-api-not"]["msg"]
		));
			
	}


?>