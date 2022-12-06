<?php
/*
    Utils has every necesary to get information in dotenv values
*/
include('./lib/printerphp/main.php');

function get_full_fields($value){
    return $value != "";
}

function get_values(string $data){
    $split_by_quotation = explode("\n", $data);
    $array_values = array_filter($split_by_quotation,"get_full_fields");
    $obj = new stdClass();
    
    foreach($array_values as &$elem){
        [$key,$value] = explode("=",$elem);
        $obj->$key = $value;
    }
    return $obj;

}

?>