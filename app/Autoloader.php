<?php
namespace App;

class Autoloader {

    public static function register(){
        
        //spl_autoload_register(['Autoloader','autoload']);

        spl_autoload_register(array(__CLASS__,"autoload"));
    }

    public static function autoload($class_name){

        if (strpos($class_name,__NAMESPACE__.'\\') === 0){

        

    //var_dump($class_name);
    //die;
        //$class_name = str_replace('Webforce\\','',$class_name);
        $class_name = str_replace(__NAMESPACE__.'\\','',$class_name);
        //var_dump($class_name);
        require __DIR__."/$class_name.php";
    }

    }
}