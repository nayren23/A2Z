<?php

require_once "vue_side_Bar_Menu.php";
require_once "modele_comp_side_Bar_Menu.php";

class Cont_side_Bar_Menu extends Controleurgenerique
{

    public function __construct()
    {
        $this->vue = new Vue_side_Bar_Menu;
        $this->modele = new Modele_comp_side_Bar_Menu;
    }

    public function exec()
    {
        $this->affichageHabillage();
    }

    public function affichageHabillage()
    {
        $idUseur= $this->modele->recuperationIdUser();
        var_dump($idUseur);
        $this->vue->side_Bar_Menu($idUseur);
    }
}
