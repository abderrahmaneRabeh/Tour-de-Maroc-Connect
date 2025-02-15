<?php
namespace App\Classes;

class User
{
    protected $id;
    protected $nom;
    protected $email;
    protected $mot_de_passe;
    protected $role;
    protected $img;
    protected $bio;
    protected $points;
    protected $date_inscription;

    public function __construct($id = null, $nom = null, $email = null, $mot_de_passe = null, $role = null, $img = null, $bio = null, $points = null, $date_inscription = null)
    {
        $this->id = $id;
        $this->nom = $nom;
        $this->email = $email;
        $this->mot_de_passe = $mot_de_passe;
        $this->role = $role;
        $this->img = $img;
        $this->bio = $bio;
        $this->points = $points;
        $this->date_inscription = $date_inscription;
    }

    // Getters
    public function getId()
    {
        return $this->id;
    }
    public function getNom()
    {
        return $this->nom;
    }
    public function getEmail()
    {
        return $this->email;
    }
    public function getMotDePasse()
    {
        return $this->mot_de_passe;
    }
    public function getRole()
    {
        return $this->role;
    }
    public function getImg()
    {
        return $this->img;
    }
    public function getBio()
    {
        return $this->bio;
    }
    public function getPoints()
    {
        return $this->points;
    }
    public function getDateInscription()
    {
        return $this->date_inscription;
    }

    // Setters
    public function setId($id)
    {
        $this->id = $id;
    }
    public function setNom($nom)
    {
        $this->nom = $nom;
    }
    public function setEmail($email)
    {
        $this->email = $email;
    }
    public function setMotDePasse($mot_de_passe)
    {
        $this->mot_de_passe = $mot_de_passe;
    }
    public function setRole($role)
    {
        $this->role = $role;
    }
    public function setImg($img)
    {
        $this->img = $img;
    }
    public function setBio($bio)
    {
        $this->bio = $bio;
    }
    public function setPoints($points)
    {
        $this->points = $points;
    }
    public function setDateInscription($date_inscription)
    {
        $this->date_inscription = $date_inscription;
    }
}

