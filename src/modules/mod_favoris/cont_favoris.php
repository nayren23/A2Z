<?php

require_once "vue_favoris.php";
require_once "modele_favoris.php";
require_once "creerDossier.php";

class ContFavoris
{
    private $location = null;

    public function __construct() {
    
        $this->vue = new VueFavoris;
        $this->dossier = new dossierBDD;
        $this->AfficherBoutonCreerDossier();

        $this->location = (isset($_GET['action']) ? $_GET['action'] : 'connexion');
    }

    public function getAction() {
        return $this->action;

    }

    public function getLocation() {
        return $this->location;
    }

    public function envoyezDossierBdd() {
        $this->dossier = envoieDossierBdd();
    }

    public function affichageCarousel() {
        $this->vue->carousel();
    }

    public function AfficherBoutonCreerDossier() {
        $this->vue->boutonCreerDossier();
        
    }

    public function exec()
    {
        switch ($this->action) {

            case 'APIDossier':
                header('Location: ./index.php?module=favoris');
                
            case 'creationCompte':
                
                break;
            }
        }
}
?>