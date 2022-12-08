<?php

require_once("./Common/Bibliotheque_Communes/errreur404.php");
if (constant("a2z") != "rya")
    die(affichage_erreur404_admin());

require_once "cont_gestion_Useur.php";


class Mod_gestionUseur
{
    private $con;
    public function __construct()
    {
        $this->con = new ContConnexion_gestion_Useur();
        $this->con->exec();
    }

    public function getControleur()
    {
        return $this->con;
    }
}
