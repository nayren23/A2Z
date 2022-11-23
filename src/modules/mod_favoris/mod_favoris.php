<?php

require_once "cont_favoris.php";


class ModFavoris
{
    private $controleur;

    public function __construct()
    {
        $this->controleur = new ContFavoris();
    }

    public function getControleur()
    {
        return $this->controleur;
    }
}


?>