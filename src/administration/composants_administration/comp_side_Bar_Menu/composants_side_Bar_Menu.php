<?php

require_once "cont_side_Bar_Menu.php";


class Composant_side_Bar_Menu
{
    private $controleur;
    public function __construct()
    {
        $this->controleur = new Cont_side_Bar_Menu();
        $this->controleur->exec();
    }

    public function getControleur()
    {
        return $this->controleur;
    }
}
