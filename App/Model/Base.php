<?php
namespace App\Model;

abstract class Base
{
    protected static function getDb()
    {
        return new \PDO("mysql:host=localhost;dbname=web",
                    "root", "toor");
    }
}
?>
