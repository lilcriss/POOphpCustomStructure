<?php

namespace App\Tables;

use \App\Config;

class Table{

    protected static $table;
    /**
     * @return string Une chaîne de caractères qui permet de manipuler la table correspondante
     * Le nom de la table est identique au nom de la class mais en minuscule
     */
    protected static function getTable(){

        if (static::$table === null){

            $class_name = explode('\\',get_called_class());
            static::$table = strtolower(end($class_name));
        }
        return static::$table;
    }

    public static function getAll(){

        return Config::getDb()->query("SELECT * FROM ".static::getTable()." ORDER BY id",get_called_class());
    }

    public static function getOne($id){

        return Config::getDb()->query("SELECT * FROM ".static::getTable()." WHERE id=?",get_called_class(),[$id]);
    }

    public function __get($key)
    {
      $method = 'get'.ucfirst($key); 
      $this->$key = $this->$method();
      return $this->$key ;
    }
}

