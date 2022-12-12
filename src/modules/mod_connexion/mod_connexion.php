<?php

require_once("./Common/Bibliotheque_Communes/errreur404.php");
if (constant("a2z") != "rya")
	die(affichage_erreur404());

require_once "cont_connexion.php";


class ModConnexion
{
    private $con;
    public function __construct()
    {
        $this->con = new ContConnexion();
        $this->con->exec();
    }

    public function getControleur()
    {
        return $this->con;
    }
}
