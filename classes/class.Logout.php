<?php

class Logout {
    static function destroySession() {
        // remove all session variables
        session_unset(); 

        // destroy the session 
        session_destroy(); 

    header('Location: index.php');
    }
}