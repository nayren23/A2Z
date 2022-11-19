<?php

require_once "vue_navbar_Connexion.php";
class Cont_navbar_Connexion
{
    private $action;

    public function __construct()
    {
        $this->vue = new Vue_navbar_Connexion;
    }

    public function exec()
    {
        $this->affichageHabillage();
    }

    public function affichageHabillage()
    {
        $this->vue->navBarHabillage();
       // $this->vue->footerHabillage();
    }
}
