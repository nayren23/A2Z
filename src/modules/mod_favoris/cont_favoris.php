<?php
require_once("./Common/Bibliotheque_Communes/errreur404.php");
if (constant("a2z") != "rya")
	die(affichage_erreur404());

require_once "vue_favoris.php";
require_once "modele_favoris.php";

class ContFavoris extends Controleurgenerique
{

    public function __construct()
    {
        $this->vue = new VueFavoris;
        $this->AfficherBoutonCreerDossier();
    }

    public function getAction() {
        return $this->action;

    }

    public function affichageCarousel() {
        $this->vue->carousel();
    }

    public function AfficherBoutonCreerDossier() {
        $this->vue->boutonCreerDossier();
    }

}

?>