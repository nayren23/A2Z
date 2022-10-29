<?php
require_once("modele.php");
require_once "modules/mod_connexion/mod_connexion.php";

class Controleur
{
    private $modele;
    private $module;
    public $resultat;

    public function __construct()
    {
        require_once ("modele.php");
        $this->modele = new Modele();
        $this->module = isset($_GET['module']) ? $_GET['module'] : 'connexion';
        $this->exec();
    }

    public function exec()
    {

        switch ($_GET['module']) {

            case "connexion":
                require_once "modules/mod_connexion/mod_connexion.php";

                $this->module = new ModConnexion();
                break;

                // case "principale":
                //$module = new Mod();
                //  break;

        }
        $this->resultat = $this->module->getControleur()->vue->affichageTampon();
    }
}
