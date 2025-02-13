<?php

namespace App\Classes;

use App\Classes\User;

class Cyclist extends User
{
    // Specific to cyclistes
    private $equipe_id;
    private $nationalite;
    private $historique;


    public function __construct($id, $nom, $email, $mot_de_passe,$role, $img, $bio, $points, $date_inscription, $equipe_id, $nationalite, $historique)
    {
        parent::__construct($id, $nom, $email, $mot_de_passe,$role, $img, $bio, $points, $date_inscription);
        $this->equipe_id = $equipe_id;
        $this->nationalite = $nationalite;
        $this->historique = $historique;
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

    public function getEquipeId()
    {
        return $this->equipe_id;
    }

    public function getNationalite()
    {
        return $this->nationalite;
    }

    public function getHistorique()
    {
        return $this->historique;
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
        $this->mot_de_passe = password_hash($mot_de_passe, PASSWORD_DEFAULT);
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

    public function setEquipeId($equipe_id)
    {
        $this->equipe_id = $equipe_id;
    }

    public function setNationalite($nationalite)
    {
        $this->nationalite = $nationalite;
    }

    public function setHistorique($historique)
    {
        $this->historique = $historique;
    }

    public function setDateInscription($date_inscription)
    {
        $this->date_inscription = $date_inscription;
    }
}
