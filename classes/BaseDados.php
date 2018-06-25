<?php
require_once('config.php');

class BaseDados {
    private static $instance;
    const CONNECT_TIMEOUT = 5;  // in seconds
    const DEBUG = 0;

    /**
     * Verifica a ligação à BD
     *
     * @return boolean
     */
    public function isConnected()
    {
        echo (boolean)self::$instance;
    }

    private static function getInstance(){
        if(!isset(self::$instance)) {
            try {
                self::$instance = new PDO('mysql:host=' . SERVERNAME . ';dbname=' . DB_NAME, USERNAME, PASSWORD);
                self::$instance->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                self::$instance->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }
        return self::$instance;
    }
    public static function prepare($sql) {
        return self::getInstance()->prepare($sql);
    }
}
