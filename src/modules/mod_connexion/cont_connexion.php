<?php

require_once('vue_connexion.php');
require_once('modele_connexion.php');

class ContConnexion
{

    private $vue;
    private $modele;
    private $action;

    public function __construct()
    {
        $this->vue = new VueConnexion;
        $this->modele = new ModeleConnexion;

        // ? veutr dire if  
        // : veut dire else  
        $this->action = (isset($_GET['action']) ? $_GET['action'] : 'bienvenue');
    }


    public function getAction(){
        return $this->action;
    }

    public function exec()
    {
        $this->vue->menu();
    }

    public function afficherFormulaireInscription()
    {
        $this->vue->form_inscription();
    }

    public function insereDonneInscription()
    {
        $this->modele->insereInscription();
    }

    public function afficherFormulaireConnexion()
    {
        $this->vue->form_connexion();
    }

    public function insereDonneConnexion()
    {
        $this->modele->verificationConnexion();
    }

    public function affichageDeco(){
        $this->vue->deconnexion();
    }

    public function deconnexion(){
        $this->modele->deconnexionM();
    }
}
