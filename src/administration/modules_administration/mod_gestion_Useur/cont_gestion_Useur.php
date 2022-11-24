<?php
require_once "vue_gestion_Useur.php";
require_once "modele_gestion_Useur.php";
require_once("Common\Bibliotheque_Communes\Verification_Creation_Token.php");
require_once("./Common\Bibliotheque_Communes\affichageRecurrent.php");

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
                break;

            default: die("Action inexistantes");
        }
    }



    //affichage du dashboard contenant tous les useurs
    public function affichageListeUseur()
    {
        $resultat = $this->modele->recuperationInfoCompte();
        $statUseur = $this->modele->recuperationStatistiqueUseur();
        $nb_page=$this->modele->pagination($resultat);
        if(count($resultat)==0){
            header('Location: ./index.php?module=gestionUseur&action=gestionUseur&page=1');
        }
        $this->vue->affichageListeUseur($resultat, $statUseur, $nb_page);
    }

    public function recuperationStatistiqueUseur()
    {
        $statuseur = $this->modele->recuperationStatistiqueUseur();
    }
}
