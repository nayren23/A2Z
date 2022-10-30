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
                $this->modele->recuperationIdentifiant();
                $this->vue->affichageInfoCompte();
                if (isset($_GET['changementId'])) {  // verification pour voir si la connexion c'est mal passé
                    $Titre = " Changement d'Identifiant Réussit 😉";
                    $Contenu = "Bravo, vous avez bien changé votre Identifiant !!! ";
                    $this->affichageChangementRéussie($Titre, $Contenu);
                } elseif (isset($_GET['changementIdFaux'])) {
                    $Titre = " Erreur changement d'identifiant  😲 !!!";
                    $Contenu = "L'identifiant choisi existe déjà !!! ";
                    $this->affichageChangementRéussie($Titre, $Contenu);
                }

                elseif(isset($_GET['changementAdresseMail'])){
                    $Titre = " Changement d'adreese mail Réussit 😉";
                    $Contenu = "Bravo, vous avez bien changé votre adreese mail !!! ";
                    $this->affichageChangementRéussie($Titre, $Contenu);
                }

                elseif(isset($_GET['changementAdresseMailFaux'])){
                    $Titre = " Erreur changement adresse mail 😲 !!!";
                    $Contenu = "L'adresse mail choisi existe déjà !!! ";
                    $this->affichageChangementRéussie($Titre, $Contenu);
                }

                elseif(isset($_GET['changementMDP'])){
                    $Titre = " Changement du mot de passe réussit 😉";
                    $Contenu = "Bravo, vous avez bien changé votre  mot de passe !!! ";
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
        }
    }

    public function changementIdentifiant()
    {
        return $this->modele->changerIdentifiant();
    }
    public function affichageInformationsCompte()
    {

    }

    public function affichageFormulaireModificationIdentifiant()
    {
        $this->vue->form_modification_compte_identifiant();
    }

    public function affichageFormulaireModificationMotDePasse()
    {
        $this->vue-> form_modification_compte_mot_de_passe();
    }

    public function changementMotDePasse(){
        return $this->modele->changerMotDePasse();
    }
    ///////////////////////////////Adresse Mail//////////////////////////////////////
    public function changementAdresseMail(){
        return $this->modele->changerAdresseMail();
    }

    public function affichageFormulaireModificationEmail()
    {
        $this->vue->form_modification_compte_adressemail();
    }

    public function affichageChangementRéussie($Titre, $Contenu)
    {
        $this->vue->popUpClassique($Titre, $Contenu);
    }
}
