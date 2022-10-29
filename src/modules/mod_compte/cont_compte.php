<?php

require_once "vue_compte.php";
require_once "modele_compte.php";

class ContCompte
{

    private $modele;
    private $action;

    public function __construct()
    {
        $this->vue = new VueCompte;
        $this->modele = new ModeleCompte;

        // ? veutr dire if  
        // : veut dire else  
        $this->action = (isset($_GET['action']) ? $_GET['action'] : 'bienvenue');
    }

    //execution qui est appelle dans le mod_connexion
    public function exec()
    {
        switch ($this->action) {

                ////////////////////////////////////////////////// INSCRIPTION ///////////////////////////////////////////////////////
            case 'miseAJourInfoCompte':

                break;

        }
    }

}
