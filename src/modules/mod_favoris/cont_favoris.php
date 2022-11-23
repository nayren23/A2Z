<?php

require_once "vue_favoris.php";
require_once "modele_favoris.php";

class ContFavoris
{
    private $vue;
    private $location;

    public function __construct() {

        $this->vue = new VueFavoris;
        $this->location = $_GET['location'];
        $this->AfficherBoutonCreerDossier();

        
        $this->exec();

        
    }

    public function getVue() {
        return $this->vue;

    }

    public function getLocation() {
        return $this->location;
    }

    public function envoyezDossierBdd() {
        $this->dossier = envoieDossierBdd();
    }


    public function AfficherBoutonCreerDossier() {
        $this->vue->boutonCreerDossier();
        
    }

    public function exec()
    {
        switch ($this->location) {
            case $_SESSION['identifiant'] :


            
        }
    }
}
?>