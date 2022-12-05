<?php

require_once("./Common/Bibliotheque_Communes/errreur404.php");
if (constant("a2z") != "rya")
die(affichage_erreur404("module=administration&action=connexion"));

require_once "cont_connexion_administration.php";


class ModConnexion_administration
{
    private $con;
    public function __construct()
    {
        $this->con = new ContConnexion_administration();
        $this->con->exec();
    }

    public function getControleur()
    {
        return $this->con;
    }
}
