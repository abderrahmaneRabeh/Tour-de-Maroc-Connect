<?php

namespace App\Classes;

class Signalement
{
    private $id_signalement;
    private $fan_id;
    private $etape_id;
    private $description;
    private $date_signalement;
    private $is_archived;

    public function __construct($id_signalement = null, $fan_id = null, $etape_id = null, $description = null, $date_signalement = null, $is_archived = null)
    {
        $this->id_signalement = $id_signalement;
        $this->fan_id = $fan_id;
        $this->etape_id = $etape_id;
        $this->description = $description;
        $this->date_signalement = $date_signalement;
        $this->is_archived = $is_archived;
    }

    public function __get($name)
    {
        return $this->$name;
    }

    public function __set($name, $value)
    {
        $this->$name = $value;
    }

}