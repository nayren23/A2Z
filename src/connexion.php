<?php

class Connexion{

    protected static $bdd;


    //initialise $bdd 

    public static function initConnexion(){

        self :: $bdd = new PDO('mysql:host=database-etudiants.iut.univ-paris8.fr;dbname=dutinfopw201619', 'dutinfopw201619', 'gysezypu'); // on met self :: car c'est champ statique à l’intérieur d’une classe

    }
}

?>