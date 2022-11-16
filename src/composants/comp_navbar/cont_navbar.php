<?php

require_once "vue_navbar.php";
class Cont_navbar
{
    private $action;

    public function __construct()
    {
        $this->vue = new Vue_navbar;
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
