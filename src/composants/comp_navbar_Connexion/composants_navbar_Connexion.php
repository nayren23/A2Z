<?php

require_once("./Common/Bibliotheque_Communes/errreur404.php");
if (constant("a2z") != "rya")
	die(affichage_erreur404());

require_once "cont_navbar_Connexion.php";


class Composant_navbar_Connexion
{
    private $controleur;
    public function __construct()
    {
        $this->controleur = new Cont_navbar_Connexion();
        $this->controleur->exec();
    }

    public function getControleur()
    {
        return $this->controleur;
    }
}
