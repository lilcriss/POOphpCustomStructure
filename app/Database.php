<?php

namespace App;

use \PDO, \PDOException;

class Database{
    private $db_dsn;
    private $db_user;
    private $db_pass;
    private $pdo;

    public function __construct (
    $db_dsn ='mysql:host=localhost;dbname=webflix',
    $db_user= 'root',
    $db_pass = ''
    )
    {
        $this->db_dsn = $db_dsn;
        $this->db_user = $db_user;
        $this->db_pass = $db_pass;
    }

    private function getPDO(){

        if ($this->pdo===null){

            try {
                $db = new PDO($this->db_dsn, $this->db_user, $this->db_pass);
                $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                echo "Oups PDO error: " . $e->getMessage();
            }
            //var_dump("PDO init");
            $this->pdo = $db;

        }
   
        return $this->pdo;
    }

    public function query($statement,$class_name,$param=[]){
        $stmt = $this->getPDo()->prepare($statement);
        $stmt->execute($param);
        $result = $stmt->fetchAll(PDO::FETCH_CLASS,$class_name);
        return $result;
    }
}