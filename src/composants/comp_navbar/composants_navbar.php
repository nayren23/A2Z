<?php

require_once("./Common/Bibliotheque_Communes/errreur404.php");
if (constant("a2z") != "rya")
	die(affichage_erreur404());

require_once "cont_navbar.php";


class Composant_navbar
{
    private $controleur;
    public function __construct()
    {
        $this->controleur = new Cont_navbar();
        $this->controleur->exec();
    }

    public function getControleur()
    {
        return $this->controleur;
    }
}
