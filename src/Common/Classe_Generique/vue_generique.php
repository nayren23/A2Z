<?php

require_once("./Common/Bibliotheque_Communes/errreur404.php");
if (constant("a2z") != "rya")
	die(affichage_erreur404());

class Vue_Generique 
{

    public function  __construct()
    {
        ob_start();
    }
  
    public function affichageTampon(){
        return ob_get_clean();
    }
}

    ?>

