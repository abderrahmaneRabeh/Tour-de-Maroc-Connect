<?php

namespace App\Classes;

class Comment
{

    private $id;
    private $contenu;
    private $fan_id;
    private $post_id;
    private $date_creation;

    public function __construct($id = null, $contenu = null, $fan_id = null, $post_id = null, $date_creation = null)
    {
        $this->id = $id;
        $this->contenu = $contenu;
        $this->fan_id = $fan_id;
        $this->post_id = $post_id;
        $this->date_creation = $date_creation;
    }

    public function __get($attr)
    {
        return $this->$attr;
    }

    public function __set($name, $value)
    {
        $this->$name = $value;
    }

}