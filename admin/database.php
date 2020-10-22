<?php
/*
try {
       $connection = new PDO("mysql:host=localhost;dbname=shops","root", "");
    } catch (PDOException $e) {
       die($e->getMessage)
    }
    */

class Database {

    private static $dbHost = "localhost";
    private static $dbName = "shops";
    private static $dbUsername = "root";
    private static $dbUserpassword = "";


    private static $connection = null;

    public static function connect()
    {
    
        if(self::$connection == null)
        {
            try
            {
              self::$connection = new PDO("mysql:host=" . self::$dbHost . ";dbname=" . self::$dbName , self::$dbUsername, self::$dbUserpassword);
            }
            catch(PDOException $e)
            {
                die($e->getMessage());
            }
        }
        return self::$connection;
    }
    
    public static function disconnect()
    {
        self::$connection = null;
    }
}

// pour tester la connection : Database::connect();
?>