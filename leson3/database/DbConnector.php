<?php

namespace App\Database;

use PDO;

class DbConnector
{
    public static function make(): PDO
    {
        $databasepath = __DIR__;
        $sqliteDSN = "sqlite:$databasepath/tasks.sqlite";
        $sqliteOptions = array(PDO::ATTR_PERSISTENT => true);

        return new PDO(
            dsn: $sqliteDSN,
            options: $sqliteOptions
        );
    }
}