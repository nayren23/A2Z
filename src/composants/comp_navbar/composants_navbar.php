<?php

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
