<?php

require_once("./Common/Bibliotheque_Communes/errreur404.php");
if (constant("a2z") != "rya")
die(affichage_erreur404_admin());

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
        $this->vue->side_Bar_Menu($idUseur);
    }
}
