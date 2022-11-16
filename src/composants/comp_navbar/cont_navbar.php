<?php

require_once "vue_navbar.php";
require_once "modele_navbar.php";

class Cont_navbar
{
    private $action;
    private $vue;
    private $modele;

    public function __construct()
    {
        $this->vue = new Vue_navbar;
        $this->modele = new ModeleNavBar;

    }

    public function exec()
    {
        $image =$this->recuperationPhoto()["cheminImage"];
        $this->affichageHabillage($image);
    }

    public function affichageHabillage($image)
    {
        $this->vue->navBarHabillage($image);
    }

    public function recuperationPhoto(){
        return $this->modele->recupererPhoto();
    }
}
