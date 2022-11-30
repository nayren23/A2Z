<?php

require_once __DIR__ ."/vue_favoris.php";
require_once __DIR__."/modele_favoris.php";

if (isset($_POST['idDossier'])) {
    session_start();
Connexion::initConnexion();
$controleur = new ContFavoris();

}
class ContFavoris extends Controleurgenerique
{
    private $location;

    public function __construct() {

        $this->vue = new VueFavoris;
        $this->location = $_GET['location'];
        $this->modele = new ModeleFavoris;
        $this->afficherBoutonCreerDossier();
        $this->afficheCarouselFiches();

        

        
    }

    public function getLocation() {
        return $this->location;
    }

    public function envoyezDossierBdd() {
        $this->dossier = envoieDossierBdd();
    }

    public function afficheCarouselFiches() {
        $this->vue->carouselFiches();
    }

    public function afficherBoutonCreerDossier() {
        $this->vue->boutonCreerDossier();
        
    }

    public function afficherIconeDossier(){
        $this->modele->recupereDossierSelonLocation("vue>->affichageDossier");
           
    }
}
?>