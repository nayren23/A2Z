<?php
require_once "vue_gestion_Useur.php";
require_once "modele_gestion_Useur.php";
require_once("Common/Bibliotheque_Communes/Verification_Creation_Token.php");
require_once("./Common/Bibliotheque_Communes/affichageRecurrent.php");
require_once("./Common/Bibliotheque_Communes/affichageRecurrent.php"); //

class ContConnexion_gestion_Useur extends Controleurgenerique
{
    public function __construct()
    {
        $this->vue = new VueConnexion_gestion_Useur;
        $this->modele = new ModeleConnexion_gestion_Useur;
        $this->action = (isset($_GET['action']) ? $_GET['action'] : 'gestionUseur');
    }

    //execution qui est appelle dans le mod_connexion
    public function exec()
    {
        switch ($this->action) {

            case 'gestionUseur':
                $this->affichageListeUseur();

                if (isset($_GET['suppresionUtilisateur'])) {
                    $this->affichageSuppresionUseur();
                } elseif (isset($_GET["affichagMotDePasseErrone"])) {
                    affichagMotDePasseErrone();
                } elseif (isset($_GET['suppresionCompteActuelle'])) {
                    $this->affichageSuppresionCompteActuelleFaux();
                } elseif (isset($_GET['affichageChangementInfoUseurReussit'])) {
                    $this->affichageChangementInfoUseurReussit();
                }
                break;

            case 'suppresionUseur':
                $this->affichage_confirmation_SuppresionUseu();
                break;

            case 'suppresionUseurConfirmer':

                if ($this->verificationConfirmationMdp() == 2) {
                    if ($this->suppresionUseur() == 2) {
                        header('Location: ./index.php?module=gestionUseur&action=gestionUseur&suppresionUtilisateur=true;');
                    } elseif ($this->suppresionUseur() == 1) {
                        header('Location: ./index.php?module=gestionUseur&action=gestionUseur&suppresionCompteActuelle=false;');
                    }
                } else {
                    header('Location: ./index.php?module=gestionUseur&action=gestionUseur&affichagMotDePasseErrone=true;');
                }
                break;

            case 'affichageInfoUseur':
                $this->affichageInfoUseur();
                break;

            case 'changementInfoUseur'://formulaire de demande mdp admin par sécurité
                $this->confirmationModificationUseur();
                break;

            case 'modificationUseur'://si le changement c'est bien passé
                if ($this->modificationDonneUseur() == 2) {
                    header('Location: ./index.php?module=gestionUseur&action=gestionUseur&affichageChangementInfoUseurReussit=true;');
                }
                break;

            case 'modificationUseurConfirmer'://ici verification que l'admin a mit le bon mdp

                if ($this->verificationConfirmationMdp() == 2) {
                    $this->formulaireModificationUseur();
                } else {
                    header('Location: ./index.php?module=gestionUseur&action=gestionUseur&affichagMotDePasseErrone=true;');
                }
                break;
            default:
                die("Action inexistantes");
        }
    }



    //affichage du dashboard contenant tous les useurs
    public function affichageListeUseur()
    {
        $resultat = $this->modele->recuperationInfoCompte();
        $nb_page = $this->modele->pagination($resultat);
        if (count($resultat) == 0) {
            header('Location: ./index.php?module=gestionUseur&action=gestionUseur&page=1');
        }
        $this->vue->affichageListeUseur($resultat, $nb_page);
    }



    public function suppresionUseur()
    {
        $adminactuel = $this->modele->recuperationIdUser(); //pour éviter qu'on puisse supprimé le compte sur lequel on est connecté
        return $this->modele->suppresionUseur($adminactuel);
    }

    //fonction de demande de confirmation du mdp pour la suppresion
    public function affichage_confirmation_SuppresionUseu()
    {
        creation_token();
        $this->vue->confirmationSuppresionUseur();
    }

    public function verificationConfirmationMdp()
    {
        return $this->modele->verificationConfirmationMdp();
    }

    public function affichageInfoUseur()
    {
        $resultat = $this->modele->recuperationInfoCompteUseur();
        $this->vue->affichageInfoUseur($resultat);
    }

    public function formulaireModificationUseur()
    {
        creation_token();
        $resultat = $this->modele->recuperationInfoCompteUseur();
        $this->vue->formulaireModificationUseur($resultat);
    }

    public function modificationDonneUseur()
    {
        return $this->modele->modificationDonneUseur();
    }

    public function confirmationModificationUseur()
    {
        $this->vue->confirmationModificationUseur();
    }
    //----------------Notification-----------------------//

    public function affichageSuppresionUseur()
    {
        $this->vue->affichageSuppresionUseur();
    }

    public function affichageSuppresionCompteActuelleFaux()
    {
        $this->vue->affichageSuppresionCompteActuelleFaux();
    }

    public function affichageChangementInfoUseurReussit()
    {
        $this->vue->affichageChangementInfoUseurReussit();
    }
}
