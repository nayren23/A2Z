<?php

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
