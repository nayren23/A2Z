<?php
require_once "vue_gestion_Useur.php";
require_once "modele_gestion_Useur.php";
require_once("./Verification_Creation_Token.php");
require_once("./affichageRecurrent.php"); 

class ContConnexion_gestion_Useur extends Controleurgenerique
{
    public function __construct()
    {
        $this->vue = new VueConnexion_gestion_Useur;
        $this->modele = new ModeleConnexion_gestion_Useur;
        $this->action = (isset($_GET['action']) ? $_GET['action'] : 'administration');
    }

    //execution qui est appelle dans le mod_connexion
    public function exec()
    {
        switch ($this->action) {

            case 'administration':
                $this->form_connexion_gestion_Useur();
                break;

            case 'gestionUseur':
                $this->affichageListeUseur();
                break;
        }
    }


    public function form_connexion_gestion_Useur()
    {
        $this->vue->form_connexion_gestion_Useur();
    }

    public function affichageListeUseur()
    {
        $resultat = $this->modele->recuperationInfoCompte();
        $this->vue->affichageListeUseur($resultat);
    }
}
