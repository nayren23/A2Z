<?php

require_once "vue_connexion.php";
require_once "modele_connexion.php";
require_once("./Verification_Creation_Token.php");
require_once("./affichageRecurrent.php"); //

class ContConnexion
{

    private $modele;
    private $action;

    public function __construct()
    {
        $this->vue = new VueConnexion;
        $this->modele = new ModeleConnexion;

        // ? veutr dire if  
        // : veut dire else  
        $this->action = (isset($_GET['action']) ? $_GET['action'] : 'connexion');
    }

    //execution qui est appelle dans le mod_connexion
    public function exec()
    {
        switch ($this->action) {

                ////////////////////////////////////////////////// INSCRIPTION ///////////////////////////////////////////////////////
            case 'inscription':
                $this->affichageFormulaireInscription();
                if (isset($_GET['errorInscription'])) {  // verification pour voir si la connexion c'est mal passé
                    $this->affichageAdreMailUtiliser();
                }
                elseif(isset($_GET['errorMotDePasseDifferents'])) {  // verification pour voir si la connexion c'est mal passé
                    affichagMotDePasseDifferent();
                }
            
                break;

            case 'creationCompte':
                if ($this->insereDonneInscription() == 4) {
                    echo"wtf";
                    header('Location: ./index.php?module=connexion&action=connexion&InscriptionReussi=true'); //redirection vers la page 
                } else if($this->insereDonneInscription() == 3) {
                    header('Location: ./index.php?module=connexion&action=inscription&errorInscription=true'); //redirection vers la page 
                }
                else if($this->insereDonneInscription() == 2) {
                    header('Location: ./index.php?module=connexion&action=inscription&errorMotDePasseDifferents=true'); //redirection vers la page 
                }
                break;

                ////////////////////////////////////////////////// CONNEXION ///////////////////////////////////////////////////////
            case 'connexion':
                $this->afficherFormulaireConnexion();
                if (isset($_GET['errorConnexion'])) {  // verification pour voir si la connexion c'est mal passé
                    $this->affichageCompteInexsistant();
                } elseif (isset($_GET['erroDeconnexion'])) {
                    $this->affichageDeconnexionImpossible();
                } elseif (isset($_GET['DeconnexionReussite'])) {
                    $this->affichageDeconnexion();
                } elseif (isset($_GET['InscriptionReussi'])) {
                    $this->affichageInscriptionReussite();
                }
                break;

            case 'connexionidentifiant':
                if ($this->insereDonneConnexion()) {
                    $this->affichageConnexionReussie(); // mettre cette fonction dans mod principale
                    header('Location: ./index.php?module=editionExo&connexion=true'); //redirection vers la page 
                } else {
                    header('Location: ./index.php?module=connexion&action=connexion&errorConnexion=true'); //redirection vers la page 
                }
                break;

                ////////////////////////////////////////////////// DECONNEXION ///////////////////////////////////////////////////////
            case 'deconnexion':
                if ($this->deconnexion()) {
                    header('Location: ./index.php?module=connexion&action=connexion&DeconnexionReussite=true');
                } else {
                    header('Location: ./index.php?module=connexion&action=connexion&erroDeconnexion=true');
                }
                break;
        }
    }

    ////////////////////////////////////////////////// INSCRIPTION ///////////////////////////////////////////////////////

    public function affichageFormulaireInscription()
    {
        creation_token();
        $this->vue->form_inscription();
    }

    public function insereDonneInscription()
    {
        return  $this->modele->insereInscription();
    }

    public function affichageInscriptionReussite()
    {
        $this->vue->affichageInscriptionReussite();  //toasts
    }

    public function affichageAdreMailUtiliser()
    {
        $this->vue->affichageAdreMailUtiliser();  //toasts
    }

    
    ////////////////////////////////////////////////// CONNEXION ///////////////////////////////////////////////////////

    public function afficherFormulaireConnexion()
    {
        creation_token();
        $this->vue->form_connexion();
    }

    public function insereDonneConnexion()
    {
        return  $this->modele->verificationConnexion();
    }

    public function affichageCompteInexsistant()
    { //toasts
        $this->vue->compteInexsistant();
    }

    public function affichageConnexionReussie()
    {  //toasts

        $this->vue->affichageConnexionReussie();  //toasts
    }

    ////////////////////////////////////////////////// DECONNEXION ///////////////////////////////////////////////////////

    public function affichageDeco()
    {
        $this->vue->deconnexion();
    }

    public function deconnexion()
    {
        return  $this->modele->deconnexionM();
    }

    public function affichageDeconnexion()
    {
        $this->vue->affichageDeconnexion();  //toasts
    }

    public function affichageDeconnexionImpossible()
    {
        $this->vue->affichageDeconnexionImpossible();  //toasts
    }
}
