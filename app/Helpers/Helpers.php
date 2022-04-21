<?php
namespace App\Helpers;

class Helpers {

    public static function sessionStart()
    {
        session_start();
    }

    // simple page redirect
    public static function redirect($page)
    {
        header('location: ' . URLROOT . '/' . $page);
    }

    // flash session message
    // example - flash('register_success', 'You are now registered', 'alert alert-danger')
    // Diplay in view - <?php echo flash('register_success');
    public static function flash($name= '', $message= '', $class = 'alert alert-success')
    {
//        session_start();

        if (!empty($name)) {
            if (!empty($message) && empty($_SESSION[$name])) {
                if (!empty($_SESSION[$name])) {
                    unset($_SESSION[$name]);
                }

                if (!empty($_SESSION[$name . '_class'])) {
                    unset($_SESSION[$name . '_class']);
                }
                $_SESSION[$name] = $message;
                $_SESSION[$name . '_class'] = $class;
            } elseif (empty($message) && !empty($_SESSION[$name])) {
                $class = !empty($_SESSION[$name . '_class']) ? $_SESSION[$name . '_class'] : '';
                echo '<div class="'. $class . '" id="msg-flash"> ' . $_SESSION[$name] . '</div>';
                unset($_SESSION[$name]);
                unset($_SESSION[$name . '_class']);
            }
        }
    }

    public static function isLoggedIn()
    {
        if (isset($_SESSION['user_id'])) {
            return true;
        } else {
            return false;
        }
    }
}



