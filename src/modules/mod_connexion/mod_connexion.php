<?php

require_once "cont_connexion.php";


class ModConnexion
{


    public function __construct()
    {

        $this->con = new ContConnexion();

        switch ($this->con->getAction()) {

            case 'menue':
                $this->con->exec();
                break;

            case 'inscription':
                $this->con->afficherFormulaireInscription();
                break;

            case 'creationCompte':
                $this->con->insereDonneInscription();
                break;

            case 'connexion':
                echo'hello';
                $this->con->afficherFormulaireConnexion();
                break;

            case 'connexionLogin':
                $this->con->insereDonneConnexion();
                break;

            case 'deconnexion':
                $this->con->deconnexion();
                break;
        }
        // $this->con->exec();
    }


}
