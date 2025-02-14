<?php

namespace App\Classes;

class historiques
{

    private $historique_id ;
    private $evenement ;
    private $description; 
    private $dateEvenement; 
    private $classement ;
    private $cycliste_id;


    
    public function __construct($historique_id, $evenement, $description, $dateEvenement, $cycliste_id, $classement = null)
    {
        $this->historique_id = $historique_id;
        $this->evenement = $evenement;
        $this->description = $description;
        $this->dateEvenement = $dateEvenement;
        $this->cycliste_id = $cycliste_id;
        $this->classement = $classement;
    }

    
    public function __get($property)
    {
        return $this->$property;
    }

    public function __set($property, $value)
    {
        $this->$property = $value;
    }
}