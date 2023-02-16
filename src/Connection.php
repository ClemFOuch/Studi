<?php
namespace App;
use \PDO;

class Connection {

    public static function getPDO (): PDO
    {
        return new PDO('mysql:dbname=ventalis;host=127.0.0.1','Ventalis','V3n7@I1$!', [ 
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]);
    }

}