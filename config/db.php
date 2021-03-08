<?php

    class Database {
        private static $dbName         = "proyecto";
        private static $dbHost         = "localhost";
        private static $dbUsername     = "root";
        private static $dbUserPassword = "";
        private static $dbPort         = '3306';
        private static $conexion       = null;

            public static function connect() {
                if(null == self::$conexion){
                    try{
                        self::$conexion = new PDO("mysql:host=" . self::$dbHost . ";" . "port=" .
                            self::$dbPort . ";" . "dbname=" . self::$dbName, self::$dbUsername, self::$dbUserPassword);
                        self::$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    }catch(PDOException $e){
                        die(' El siguiente error a ocurrido : ' . $e->getMessage());
                    }
                }
                return self::$conexion;
            }
            
            public static function disconnect(){
                self::$conexion = null;
            }
    } 
?>