<?php

namespace App\Tables;

use \App\Config;

class Categories extends Table{

    protected static $table = "categories";

    /*public static function getAll(){

        return Config::getDb()->query("SELECT * FROM ".self::$table." ORDER BY id",__CLASS__);
    }*/

    public function getUrl(){

        return "?p=category&id=".$this->id;
    
       }
}