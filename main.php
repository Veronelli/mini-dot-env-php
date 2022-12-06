<?php
include("utils.php");
class DotPhp{
    /*
    DotPhp class is a librery to make it easy to get environment variables

    $filename: is for storage the filename
    */
    private $filename;
    private $values;

    function __construct($filename){
        $this->set_file($filename);
        $a = $this->get_env("TEST");
    }

    public function set_file($filename){
        $this->filename = $filename;
        $file = fopen($filename, "r");
        $data_file = fread($file, filesize($filename));
        $this->values = get_values($data_file);
        fclose($file);
        
    }

    public function get_env(string $variable){
        if(getenv($variable) == false){
            $value = $this->values->$variable;
            return $value;

        }
        return getenv($variable);
    }

}


?>