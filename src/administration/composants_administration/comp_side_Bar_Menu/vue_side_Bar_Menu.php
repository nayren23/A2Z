<?php

require_once("./Common/Bibliotheque_Communes/errreur404.php");
if (constant("a2z") != "rya")
die(affichage_erreur404("module=administration&action=connexion"));

require_once "./Common/Classe_Generique/vue_generique.php";

class Vue_side_Bar_Menu extends Vue_Generique
{

    public function  __construct()
    {
        parent::__construct(); // comme un super
    }
    //fonction pour l'affichage du Footer
    function side_Bar_Menu($idUseur)
    {
?>


        <nav class="main-menu">
            <ul>
                <li class="has-subnav">
                    <a href="index.php?module=gestionUseur&action=gestionUseur">
                        <i class="fa fa-home fa-2x"></i>
                        <span class="nav-text">
                        Tableau de bord
                        </span>
                    </a>
                </li>
                <li class="has-subnav">
                    <a href="index.php?module=gestionUseur&action=creationAdmin">
                        <i class="fa fa-list fa-2x"></i>
                        <span class="nav-text">
                            Gestion administateur
                        </span>
                    </a>

                </li>
                <li>
                    <a href="index.php?module=gestionUseur&action=affichageInfoUseur&idUseur=<?php echo $idUseur['idUser'] ?>">
                        <i class="fa fa-info fa-2x"></i>
                        <span class="nav-text">
                            Profil
                        </span>
                    </a>
                </li>
            </ul>

            <ul class="logout">
                <li>
                    <a href="index.php?module=administration&action=deconnexion">
                        <i class="fa fa-power-off fa-2x"></i>
                        <span class="nav-text">
                            Déconnexion
                        </span>
                    </a>
                </li>
            </ul>
        </nav>
<?php
    }
}
?>