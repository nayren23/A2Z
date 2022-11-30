<?php

require_once "./modules/mod_editionExo/vue_editionExo.php";
require_once "./modules/mod_editionExo/modele_editionExo.php";

class ContEditionExo extends Controleurgenerique
{
    public function __construct()
    {
        $this->vue = new VueEdition;
        $this->modele = new ModeleEditionExo;
        $this->action = (isset($_GET['action']) ? $_GET['action'] : 'editionExo');
    }

 


    //execution qui est appelle dans le mod_connexion
    public function exec()
    {
        switch ($this->action) {

                ////////////////////////////////////////////////// INSCRIPTION ///////////////////////////////////////////////////////
            case 'editionExo':
                $this->affichagePageEditionExo();
                if(isset($_GET['connexion'])){
                    $this->affichageConnexionReussie();
                }
                break;

           
        }
    }


    public function affichagePageEditionExo(){
        $this->vue->pageExoEdition();

    } 
    
    public function affichageConnexionReussie()
    {
        $this->vue->affichageConnexionReussie();
    }
}