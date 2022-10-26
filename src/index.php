<?php

session_start();
define('SITE_ROOT',__DIR__);

require_once "connexion.php";
require_once "modules/mod_connexion/mod_connexion.php";

connexion::initConnexion(); // On l’appelle donc sur une classe, et non sur un objet instancié.



$_GET['module'] = isset($_GET['module']) ? $_GET['module'] : 'connexion';


switch ($_GET['module']) {

        case "connexion":
        $module = new ModConnexion();
        break;

        case "principale":
        //$module = new Mod();
        break;
        
}
?>
