<?php

define("DB_HOST", "localhost");
define("DB_USER", "postgres");
define("DB_PASSWORD", "postgres");
define("DB_NAME", "postgres");
define("DB_DRIVER", "pgsql");

class Conexao
{
    public static $connection;

    public function __construct()
    {
    }

    public static function getConnection()
    {
        $pdoConfig = DB_DRIVER . ":" . "host=" . DB_HOST . ";";
        $pdoConfig .= "dbname=" . DB_NAME . ";";

        try {
            if (!isset(self::$connection)) {
                self::$connection = new PDO($pdoConfig, DB_USER, DB_PASSWORD);
                self::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }
        } catch (PDOException $e) {
            $mensagem = "Erro ao conectar ao PostgreSQL: " . $e->getMessage();
            throw new Exception($mensagem);
        }

        return self::$connection;
    }
}
