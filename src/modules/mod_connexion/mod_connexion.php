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
  ////////////////////////////////////////////////// INSCRIPTION ///////////////////////////////////////////////////////

            case 'inscription':
                $this->con->affichageFormulaireInscription();
                break;
            
                case 'creationCompte':
                if($this->con->insereDonneInscription()){
                    $this->con-> affichageInscriptionReussite ();
                }
                else{
                    $this->con->affichageAdreMailUtiliser();
                }
                break;
            
  ////////////////////////////////////////////////// CONNEXION ///////////////////////////////////////////////////////
                case 'connexion':
                $this->con->afficherFormulaireConnexion();
                break;

            case 'connexionidentifiant':
                if($this->con->insereDonneConnexion()){
                    $this->con->affichageConnexionReussie();
                }
                else{
                    $this->con->affichageCompteInexsistant();
                }
                break;
            
  ////////////////////////////////////////////////// DECONNEXION ///////////////////////////////////////////////////////
                case 'deconnexion':
                if($this->con->deconnexion()){
                    $this->con->affichageDeconnexion();
                }
                else{
                    $this->con->affichageDeconnexionImpossible();
                }
                break;
        }
        $this->con->affichageNavBar();//affichage constant de la navbar
    }
}
