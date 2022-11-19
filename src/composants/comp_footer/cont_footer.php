<?php

require_once "vue_footer.php";
class Cont_footer
{
    private $action;

    public function __construct()
    {
        $this->vue = new Vue_footer;
    }

    public function exec()
    {
        $this->affichageHabillage();
    }

    public function affichageHabillage()
    {
        $this->vue->footerHabillage();
    }
}
