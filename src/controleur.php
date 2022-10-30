<?php
require_once("modele.php");
require_once "modules/mod_connexion/mod_connexion.php";
require_once "modules/mod_compte/mod_compte.php";

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

                case "compte":
                    if (isset($_SESSION["identifiant"])) {  //page accessible uniquement si on est connecter
                    require_once "modules/mod_compte/mod_compte.php";
    
                    $this->module = new ModCompte();
                    }
                    else{
                        echo"connecte toi d'abord";
                    }
                    break;

                // case "principale":
                //$module = new Mod();
                //  break;

        }
        if (isset($_SESSION["identifiant"])) {
            $this->resultat = $this->module->getControleur()->vue->affichageTampon();
        }
    }
}
