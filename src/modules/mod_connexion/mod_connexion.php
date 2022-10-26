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
                if ($this->con->insereDonneInscription()) {
                    $this->con->affichageInscriptionReussite();
                } else {
                    $this->con->affichageAdreMailUtiliser();
                }
                break;

                ////////////////////////////////////////////////// CONNEXION ///////////////////////////////////////////////////////
            case 'connexion':
                $this->con->afficherFormulaireConnexion();
                if (isset($_GET['errorConnexion'])) {  // verification pour voir si la connexion c'est mal passé
                    $this->con->affichageCompteInexsistant();
                } elseif (isset($_GET['erroDeconnexion'])) {
                    $this->con->affichageDeconnexionImpossible();
                } elseif (isset($_GET['DeconnexionReussite'])) {
                    $this->con->affichageDeconnexion();
                }

                break;

            case 'connexionidentifiant':
                if ($this->con->insereDonneConnexion()) {
                    $this->con->affichageConnexionReussie();
                } else {
                    header('Location: ./index.php?module=connexion&action=connexion&errorConnexion=true'); //redirection vers la page 
                }
                break;

                ////////////////////////////////////////////////// DECONNEXION ///////////////////////////////////////////////////////
            case 'deconnexion':
                if ($this->con->deconnexion()) {
                    header('Location: ./index.php?module=connexion&action=connexion&DeconnexionReussite=true');
                } else {
                    header('Location: ./index.php?module=connexion&action=connexion&erroDeconnexion=true');
                }
                break;
        }
        $this->con->affichageNavBar(); //affichage constant de la navbar
    }
}
