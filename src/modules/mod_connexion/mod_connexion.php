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
            
                //Inscription
            case 'creationCompte':
                if($this->con->insereDonneInscription()){
                    $this->con-> inscriptionReussite ();
                }
                else{
                    $this->con->affichageAdreMailUtiliser();
                }
                break;
            
                //Connexion
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
                //changer ici et appelller la page d'acceuil principale
                break;
            
                //Deconnexion
            case 'deconnexion':
                $this->con->vueDeconnexion();
                $this->con->deconnexion();
                break;

        }
        $this->con->affichageNavBar();

        // $this->con->exec();
    }


}
