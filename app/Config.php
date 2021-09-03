<?php
namespace App;

class Config{

    private static $siteTitle = "Mon Site POO MVC";

    const DB_DSN = "mysql:host=localhost;dbname=webflix";

    const DB_USER = "root";

    const DB_PASS = "";

    private static $database;

    public static function getDb(){
        if (self::$database===null) {
            self::$database = new Database(self::DB_DSN,self::DB_USER,self::DB_PASS); 
        }
       return self::$database;
    }

    public static function getTitle(){

        return self::$siteTitle;
    }

    public static function setTitle($title){

        self::$siteTitle = $title;
    }
}
