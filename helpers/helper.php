<?php

function array2xml($array, $node_name="root") {
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
    //var_dump($dom);
    return $dom->saveXML();
} 



// creating object of SimpleXMLElement
$xml_student_info = new SimpleXMLElement("<?xml version=\"1.0\"?><student_info></student_info>");

// function call to convert array to xml
//array_to_xml($student_info,$xml_student_info);

function array_to_xml($student_info, &$xml_student_info) {
    foreach($student_info as $key => $value) {
        if(is_array($value)) {
            if(!is_numeric($key)){
                $subnode = $xml_student_info->addChild("$key");
                array_to_xml($value, $subnode);
            }
            else{
                $subnode = $xml_student_info->addChild("item$key");
                array_to_xml($value, $subnode);
            }
        }
        else {
            $xml_student_info->addChild("$key",htmlspecialchars("$value"));
        }
    }
}

?>