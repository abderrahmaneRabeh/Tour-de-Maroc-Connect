<?php

namespace App\Classes;

class Like
{
    private $id;
    private $fan_id;
    private $etape_id;

    public function __construct($id = null, $fan_id = null, $etape_id = null)
    {
        $this->id = $id;
        $this->fan_id = $fan_id;
        $this->etape_id = $etape_id;
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