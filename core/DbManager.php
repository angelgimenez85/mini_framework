<?php
namespace core;

class DbManager
{
    const SQLITE = 1;
    const MYSQL = 2;
    private static $instance = null;
    private static $optionfile = __DIR__ . "/../configs/db_config.xml";

    private function __construct()
    {
    }

    private static function getOptions(): array
    {
        if (! file_exists(self::$optionfile)) {
            throw new \Exception("No se pudo abrir el archivo de configuración. ", 1);
        }

        $options = simplexml_load_file(self::$optionfile);

        return array(
            'driver'=>(string)$options->driver,
            'sqlite_dsn'=>(string)$options->sqlite_dsn,
            'mysql_dsn'=>(string)$options->mysql_dsn,
            'user'=>(string)$options->user, 
            'pass'=>(string)$options->pass);
    }

    public static function getInstance(): \PDO
    {
        if (is_null(self::$instance)) {
            $dbConf = self::getOptions();
            try {     
                switch ($dbConf['driver']) {
                    case self::MYSQL:
                        self::$instance = new \PDO($dbConf['mysql_dsn'], $dbConf['user'], $dbConf['pass']);
                        break;
                    case self::SQLITE:
                        self::$instance = new \PDO('sqlite:'.__DIR__.$dbConf['sqlite_dsn']);
                        break;
                }
            } catch (\PDOException $exception) {
                printf("Failed to obtain database handle %s", $exception->getMessage());
            }
        }
        self::$instance->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        return self::$instance;
    }
}
