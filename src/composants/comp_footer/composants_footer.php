<?php

require_once("./Common/Bibliotheque_Communes/errreur404.php");
if (constant("a2z") != "rya")
	die(affichage_erreur404());

require_once "cont_footer.php";


class Composant_footer
{
    private $controleur;
    public function __construct()
    {
        $this->controleur = new Cont_footer();
        $this->controleur->exec();
    }

    public function getControleur()
    {
        return $this->controleur;
    }
}
