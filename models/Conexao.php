<?php

define("DB_HOST", "DESKTOP-2I2E65D\\MSSQLSERVER01");
define("DB_USER", "");
define("DB_PASSWORD", "");
define("DB_NAME", "master");
define("DB_DRIVER", "sqlsrv");

class Conexao
{
    private static $connection;

    private function __construct()
    {
    }

    public static function getConnection()
    {
        $pdoConfig = DB_DRIVER . ":" . "Server=" . DB_HOST . ";";
        $pdoConfig .= "Database=" . DB_NAME . ";";

        try {
            if (!isset(self::$connection)) {
                self::$connection = new PDO($pdoConfig, DB_USER, DB_PASSWORD);
                self::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }
        } catch (PDOException $e) {
            $mensagem = "DRIVERS DISPONÍVEIS: " . implode(",", PDO::getAvailableDrivers());
            $mensagem .= "\nErro: " . $e->getMessage();
            throw new Exception($mensagem);
        }

        return self::$connection;
    }
}
