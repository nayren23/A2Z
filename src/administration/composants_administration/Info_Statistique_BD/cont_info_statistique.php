<?php

require_once "vue_info_statistique.php";
require_once "modele_info_statistique.php";
class Cont_info_statistique extends Controleurgenerique
{

    public function __construct()
    {
        $this->vue = new Vue_info_statistique;
        $this->modele = new Modele_info_statistique;
    }

    public function exec()
    {
        $statUseur= $this->recuperationStatistiqueUseur();
        $this->affichage_info_statistique($statUseur);
    }

    public function affichage_info_statistique($statUseur)
    {
        $this->vue->affichage_info_statistique($statUseur);
    }

    public function recuperationStatistiqueUseur(){
       return $this->modele->recuperationStatistiqueUseur();
    }
}
