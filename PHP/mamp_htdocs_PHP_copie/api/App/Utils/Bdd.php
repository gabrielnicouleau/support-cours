<?php

namespace App\Utils;

class Bdd
{
    //fonction connexion BDD
    public static function connexion(): \PDO
    {
        //retour de l'objet PDO
        return new \PDO(
            'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . '',
            DB_USER,
            DB_PASSWORD,
            [\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION]
        );
    }
}