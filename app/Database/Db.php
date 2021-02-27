<?php

namespace App\Database;

use Exception;
use PDO;

class Db
{
    private static PDO $instance;

    public static function connect()
    {
        if (!isset(self::$instance)) {
            try {

                $dsn = "mysql:host=" . HOST . ";dbname=" . DBNAME;
                $driver_options = array(
                    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'",
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
                );

                self::$instance = new PDO($dsn, USER, PASSWORD, $driver_options);
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }

        return self::$instance;
    }
}
