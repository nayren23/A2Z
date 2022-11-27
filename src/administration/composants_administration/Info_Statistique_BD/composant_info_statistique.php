<?php

require_once "cont_info_statistique.php";


class Composant_info_statistique
{
    private $controleur;
    public function __construct()
    {
        $this->controleur = new Cont_info_statistique();
        $this->controleur->exec();
    }

    public function getControleur()
    {
        return $this->controleur;
    }
}
