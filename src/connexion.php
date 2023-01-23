<?php

class Connexion
{
    protected static $bdd;

    //Initialise base de donnée
    public static function initConnexion()
    {
        
        $id = "dutinfopw201620";
        $dbname = "dutinfopw201620";
        $mdp = "dejyjamu";
        $adress = "localhost";

        self::$bdd = new PDO("mysql:host=$adress;dbname=$dbname", $id, $mdp);
    }
}

/*
Version 1.0 - 2022/11/30
GNU GPL  Copyleft (C inversé) 2023-2033
Initiated by Hamidi.Yassine,Chouchane.Rayan,Claude.Aldric
Web Site = http://localhost/A2Z/src/index.php?module=connexion&action=connexion 
*/
?>