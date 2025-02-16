<?php

    function redirect($page){
        header("location: ". URLROOT . "/" . $page);
    }

    function flash($name, $message, $class = '') {
        if(!empty($message)) {
            $_SESSION[$name] = $message;
            $_SESSION[$name.'_class'] = $class;
        }
    }
    
   