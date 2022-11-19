<?php

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
