<?php
require_once "./vue_generique.php";

class Vue_side_Bar_Menu extends Vue_Generique
{

    public function  __construct()
    {
        parent::__construct(); // comme un super
    }
    //fonction pour l'affichage du Footer
    function side_Bar_Menu()
    {
?>


        <nav class="main-menu">
            <ul>
                <li>
                    <a href="#">
                        <i class="fa fa-home fa-2x"></i>
                        <span class="nav-text">
                            Dashboard
                        </span>
                    </a>

                </li>
                <li class="has-subnav">
                    <a href="#">
                        <i class="fa fa-table fa-2x"></i>
                        <span class="nav-text">
                            Liste utilisateur
                        </span>
                    </a>

                </li>
                <li class="has-subnav">
                    <a href="#">
                        <i class="fa fa-list fa-2x"></i>
                        <span class="nav-text">
                            Gestion administateur
                        </span>
                    </a>

                </li>
                <li>
                    <a href="#">
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