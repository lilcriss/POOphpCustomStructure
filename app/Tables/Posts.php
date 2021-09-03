<?php

namespace App\Tables;

use \App\Config;

 

class Posts extends Table {

    public static function getAll(){

        return Config::getDb()->query("

        SELECT posts.*,categories.name as category 
        FROM posts 
        LEFT JOIN categories
        On posts.categories_id = categories.id
        ORDER BY id",__CLASS__);
    }



    public function getExcerpt(){

        return substr($this->text,0,120) . "<a href='".$this->url."'>[...]</a>";
    }

    public function getId(){

        return $this->id;
    }

    public function getTitle(){

        return $this->title;
    }

    public function getText(){

        return $this->text;
    }

    public function getImage(){

        return $this->image;
    }

    public function getThumb(){

       if (is_file("./images/".$this->image)){

           return $this->image;
       }

        return "default.jpg";
    }

    public function getUrl(){

    return "?p=single&id=".$this->id;

   }
}