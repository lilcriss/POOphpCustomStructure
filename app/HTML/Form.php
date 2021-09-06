<?php
namespace App\HTML;

use DateTime;

/**
 * Class Form
 * Permet de générer des éléments  de formulaire rapidement et facilement...
 */
class Form{
    /**
     * @var array Données utilisées par le formulaire
     */
    private $data ;
    /**
     * @var string Tag utilisé pour entourer les champs de formulaire
     */
    public $surround = 'p';

    /**
     * @param array $data permet de renseigner l'attibut value des champs
     */
    public function __construct($data=array()){

        $this->data = $data;
    }

    private function surround ($html){
        
        return '<'.$this->surround.'>'.$html.'</'.$this->surround.'>';
    }

    protected function getValue($index){

        return isset ($this->data[$index]) ? $this->data[$index] : null ;

    }

    /**
     * @param string $name permet de préciser le nom de champs input
     * @param string $type permet de préciser le type de champs input
     * @return string Retourne un champs input formaté
     */

    protected function input($name,$type="text"){
        
        return $this->surround ('<input type ="'.$type.'" name="'.$name.',
        "value=" '.$this->getValue($name).'">') ;
    }

    public function submit(){
        
        return $this->surround('<button type="submit">Envoyer</button>');
    }

    public function displayDate(){
        $d = new DateTime();
        return $d->format("y-m-d");
    }
}