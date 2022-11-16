<?php

session_start();
define('SITE_ROOT',__DIR__);

require_once "connexion.php";
require_once("./vue_generique.php");
require_once ("controleur.php");

$controleur = new Controleur();

if (isset($_SESSION["identifiant"])) {  //page accessible uniquement si on est connecter

require_once("template.php"); //affichage du site 
}
?>
