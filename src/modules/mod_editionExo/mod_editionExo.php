<?php

require_once("./Common/Bibliotheque_Communes/errreur404.php");
if (constant("a2z") != "rya")
	die(affichage_erreur404());

require_once "cont_editionExo.php";


class ModEditionExo
{
    private $con;
    public function __construct()
    {
        $this->con = new ContEditionExo();
        $this->con->exec();

    }

    public function getControleur()
    {
        return $this->con;
    }
}
