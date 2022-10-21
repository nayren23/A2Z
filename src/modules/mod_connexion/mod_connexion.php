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
                if($this->con->insereDonneInscription()){
                    $this->con-> inscriptionReussite ();
                }
                break;

            case 'connexion':
                $this->con->afficherFormulaireConnexion();
                break;

            case 'connexionidentifiant':
                $this->con->insereDonneConnexion();
                //changer ici et appelller la page d'acceuil principale
                break;

            case 'deconnexion':
                $this->con->vueDeconnexion();
                $this->con->deconnexion();
                break;
        }
        // $this->con->exec();
    }


}
