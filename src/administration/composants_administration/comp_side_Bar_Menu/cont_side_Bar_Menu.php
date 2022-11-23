<?php

require_once "vue_side_Bar_Menu.php";

class Cont_side_Bar_Menu extends Controleurgenerique
{

    public function __construct()
    {
        $this->vue = new Vue_side_Bar_Menu;
    }

    public function exec()
    {
        $this->affichageHabillage();
    }

    public function affichageHabillage()
    {
        $this->vue->side_Bar_Menu();
    }
}
