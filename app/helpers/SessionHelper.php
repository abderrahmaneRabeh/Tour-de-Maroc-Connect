<?php
namespace App\Helpers;

class SessionHelper {
    public static function init() {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }
    
    public static function flash($name = '', $message = '', $class = 'bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative') {
        if(!empty($name)) {
            if(!empty($message) && empty($_SESSION[$name])) {
                if(!empty($_SESSION[$name])) {
                    unset($_SESSION[$name]);
                }

                if(!empty($_SESSION[$name . '_class'])) {
                    unset($_SESSION[$name . '_class']);
                }

                $_SESSION[$name] = $message;
                $_SESSION[$name . '_class'] = $class;
            } elseif(empty($message) && !empty($_SESSION[$name])) {
                $class = !empty($_SESSION[$name . '_class']) ? $_SESSION[$name . '_class'] : '';
                echo '<div class="' . $class . '" role="alert">';
                echo $_SESSION[$name];
                echo '<span class="absolute top-0 bottom-0 right-0 px-4 py-3" onclick="this.parentElement.style.display=\'none\';">
                        <i class="fas fa-times"></i>
                      </span>';
                echo '</div>';
                unset($_SESSION[$name]);
                unset($_SESSION[$name . '_class']);
            }
        }
    }
}

// This function should be included in config/helpers.php or some other global file
function flash($name = '', $message = '', $class = 'bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative') {
    SessionHelper::flash($name, $message, $class);
}

// For error messages, you might want a different style
function flashError($name = '', $message = '') {
    $class = 'bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative';
    flash($name, $message, $class);
}