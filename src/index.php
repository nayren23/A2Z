<?php

session_start();
define('SITE_ROOT',__DIR__);

require_once "connexion.php";
require_once("./Common/Classe_Generique/vue_generique.php");
require_once ("controleur/controleur.php");
require_once ("controleur/controleur_administration.php");
require_once("./Common/Classe_Generique/controleur_generique.php"); //on le fait ici car il est utilisé par plusiseur controleur
require_once("./verificationAdmin.php");

Connexion::initConnexion();

//Pour la partie Admin
if(VerifAdmin::verificationConnexionAdmin()){
    $controleur = new Controleur_administration();
    require_once("./Template/template_Administrateur.php"); //affichage du site 
}
//Pour la partie Useur
else{
    $controleur = new Controleur();
    require_once("./Template/template.php"); //affichage du site 
}
