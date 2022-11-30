<?php

session_start();
define('SITE_ROOT',__DIR__);

require_once "connexion.php";
require_once("./Common/Classe_Generique/vue_generique.php");
require_once ("controleur.php");
require_once("./Common/Classe_Generique/controleur_generique.php"); //on le fait ici car il est utilisé par plusiseur controleur

$controleur = new Controleur();

require_once("./verificationAdmin.php");

if(VerifAdmin::verificationConnexionAdmin()){
    require_once("./Template/template_Administrateur.php"); //affichage du site 
}
else{
    require_once("./Template/template.php"); //affichage du site 
}
?>