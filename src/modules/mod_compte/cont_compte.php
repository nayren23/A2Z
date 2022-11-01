<?php

require_once "vue_compte.php";
require_once "modele_compte.php";

class ContCompte
{

    private $modele;
    private $action;

    public function __construct()
    {
        $this->vue = new VueCompte;
        $this->modele = new ModeleCompte;

        // ? veutr dire if  
        // : veut dire else  
        $this->action = (isset($_GET['action']) ? $_GET['action'] : 'affichageInfoCompte');
    }

    //execution qui est appelle dans le mod_compte
    public function exec()
    {
        switch ($this->action) {

            case 'affichageInfoCompte':
                //affichage global des infos 
                $this->affichageInformationsCompte();
                if (isset($_GET['changementId'])) {  // verification pour voir si la connexion c'est mal passé
                    $Titre = " Changement d'Identifiant Réussit 😉";
                    $Contenu = "Bravo, vous avez bien changé votre Identifiant !!! ";
                    $this->affichageChangementRéussie($Titre, $Contenu);
                } elseif (isset($_GET['changementIdFaux'])) {
                    $Titre = " Erreur changement d'identifiant  😲 !!!";
                    $Contenu = "L'identifiant choisi existe déjà !!! ";
                    $this->affichageChangementRéussie($Titre, $Contenu);
                } elseif (isset($_GET['changementAdresseMail'])) {
                    $Titre = " Changement d'adreese mail Réussit 😉";
                    $Contenu = "Bravo, vous avez bien changé votre adreese mail !!! ";
                    $this->affichageChangementRéussie($Titre, $Contenu);
                } elseif (isset($_GET['changementAdresseMailFaux'])) {
                    $Titre = " Erreur changement adresse mail 😲 !!!";
                    $Contenu = "L'adresse mail choisi existe déjà !!! ";
                    $this->affichageChangementRéussie($Titre, $Contenu);
                } elseif (isset($_GET['changementMDP'])) {
                    $Titre = " Changement du mot de passe réussit 😉";
                    $Contenu = "Bravo, vous avez bien changé votre  mot de passe !!! ";
                    $this->affichageChangementRéussie($Titre, $Contenu);
                } elseif (isset($_GET['changementPhoto'])) {
                    $Titre = " Changement de photo de profil réussit 😉";
                    $Contenu = "Bravo, vous avez bien changé votre photo de profil !!! ";
                    $this->affichageChangementRéussie($Titre, $Contenu);
                } elseif (isset($_GET['PasImage'])) {
                    $Titre = " Erreur changement de photo de profil  😲 !!!";
                    $Contenu = "Le fichier n'est pas une image !!! ";
                    $this->affichageChangementRéussie($Titre, $Contenu);
                } elseif (isset($_GET['ImageTropGrande'])) {
                    $Titre = " Erreur changement de photo de profil  😲 !!!";
                    $Contenu = "La taille du fichier est trop grande!!! ";
                    $this->affichageChangementRéussie($Titre, $Contenu);
                } elseif (isset($_GET['ErreurTansfert'])) {
                    $Titre = " Erreur changement de photo de profil  😲 !!!";
                    $Contenu = "Erreur lors du transfert !!! ";
                    $this->affichageChangementRéussie($Titre, $Contenu);
                }
                break;

            case 'miseAJourIdentifiant':
                $this->affichageFormulaireModificationIdentifiant();

                break;

            case 'changementIdentifiant':

                if ($this->changementIdentifiant()) {
                    header('Location: ./index.php?module=compte&action=affichageInfoCompte&changementId=true;'); //redirection vers la page 
                } else //ici l'identifiante xiste déja
                    header('Location: ./index.php?module=compte&action=affichageInfoCompte&changementIdFaux=true;'); //redirection vers la page 
                break;

            case 'miseAJourMotDePasse':
                $this->affichageFormulaireModificationMotDePasse();
                break;

            case 'changementMotDePasse':
                if ($this->changementMotDePasse()) {
                    header('Location: ./index.php?module=compte&action=affichageInfoCompte&changementMDP=true;'); //redirection vers la page 
                }

                break;

            case 'miseAJourEmail':
                $this->affichageFormulaireModificationEmail();
                break;

            case 'changementAdresseMail':
                if ($this->changementAdresseMail()) {
                    header('Location: ./index.php?module=compte&action=affichageInfoCompte&changementAdresseMail=true;'); //redirection vers la page 
                } else //ici l'identifiante xiste déja
                    header('Location: ./index.php?module=compte&action=affichageInfoCompte&changementAdresseMailFaux=true;'); //redirection vers la page 
                break;

            case 'miseAJourPhotoDeProfile':
                $this->affichageChangementPhotoDeProfile();
                break;

            case 'changementPhotoDeProfile':
                $this->changementPhotoDeProfile();
                break;
        }
    }

    /////////////////////////////// Informations Compte//////////////////////////////////////

    public function affichageInformationsCompte()
    {
        $identifiant = $this->modele->recuperationInfoCompte()["identifiant"];
        $motDePasse = $this->modele->recuperationInfoCompte()["motDePasse"];
        $adresseMail = $this->modele->recuperationInfoCompte()["adresseMail"];
        $this->vue->affichageInfoCompte($identifiant, $motDePasse, $adresseMail);
    }

    ///////////////////////////////Identifiant//////////////////////////////////////

    public function affichageFormulaireModificationIdentifiant()
    {
        $this->vue->form_modification_compte_identifiant();
    }

    public function changementIdentifiant()
    {
        return $this->modele->changerIdentifiant();
    }
    ///////////////////////////////MotDePasse//////////////////////////////////////

    public function affichageFormulaireModificationMotDePasse()
    {
        $this->vue->form_modification_compte_mot_de_passe();
    }

    public function changementMotDePasse()
    {
        return $this->modele->changerMotDePasse();
    }
    ///////////////////////////////Adresse Mail//////////////////////////////////////
    public function changementAdresseMail()
    {
        return $this->modele->changerAdresseMail();
    }

    public function affichageFormulaireModificationEmail()
    {
        $this->vue->form_modification_compte_adressemail();
    }

    ///////////////////////////////Photo de Profile//////////////////////////////////////

    public function affichageChangementPhotoDeProfile()
    {
        $image = $this->modele->recuperationInfoCompte()["cheminImage"];

        $this->vue->modifiactionPhotoDeProfile($image);
    }

    //ici en fonction de ce que nous renvoie  recupererImage() on traite si c'est une erreur ou pas 
    public function changementPhotoDeProfile()
    {
        $image = $this->modele->recupereImage();

        switch ($image) {

            case 1; // erreur lors du transfert
                header('Location: ./index.php?module=compte&action=affichageInfoCompte&ErreurTansfert=true;'); //redirection vers la page  affichageInfoCompte
                break;

            case 2;  //taille trop grande
                header('Location: ./index.php?module=compte&action=affichageInfoCompte&ImageTropGrande=true;'); //redirection vers la page  affichageInfoCompte
                break;

            case 3; //fichier pas une image
                header('Location: ./index.php?module=compte&action=affichageInfoCompte&PasImage=true;'); //redirection vers la page  affichageInfoCompte
                break;

            default:
                $this->modele->changementPhoto($image);
                header('Location: ./index.php?module=compte&action=affichageInfoCompte&changementPhoto=true;'); //redirection vers la page affichageInfoCompte

        }
    }
    ///////////////////////////////Pop Up//////////////////////////////////////

    public function affichageChangementRéussie($Titre, $Contenu)
    {
        $this->vue->popUpClassique($Titre, $Contenu);
    }
}
