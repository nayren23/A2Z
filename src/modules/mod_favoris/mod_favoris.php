<?php

require_once "cont_favoris.php";


class ModFavoris
{
    public function __construct()
    {

        $this->controleur = new ContFavoris();
        header('Location: ./index.php?module=favoris&location=null');
    }

    public function getControleur()
    {
        return $this->controleur;
    }
}


?>