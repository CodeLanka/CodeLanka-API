<?php

/**
* 
*/
class ContentTypeGen 
{
	
	function __construct()
	{
		# code...
	}

	public function array2xml($array, $node_name="root") {
		  $dom = new DOMDocument('1.0', 'UTF-8');
	    $dom->formatOutput = true;
	    $root = $dom->createElement($node_name);
	    $dom->appendChild($root);

	    $array2xml = function ($node, $array) use ($dom, &$array2xml) {
	        foreach($array as $key => $value){
	            if ( is_array($value) ) {
	                $n = $dom->createElement($key);
	                $node->appendChild($n);
	                $array2xml($n, $value);
	            }else{
	                $attr = $dom->createAttribute($key);
	                $attr->value = $value;
	                $node->appendChild($attr);
	            }
	        }
	    };

    	$array2xml($root, $array);
    	return $dom->saveXML();
	}
}

?>