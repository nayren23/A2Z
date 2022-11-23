<?php
require_once "./vue_generique.php";

class Vue_footer extends Vue_Generique
{

    public function  __construct()
    {
        parent::__construct(); // comme un super
    }
    //fonction pour l'affichage du Footer
    function footerHabillage()
    {
?>
        <footer class="footer-distributed">
            <div class="conteneurFooter">
                <div class="footer-left">
                    <p class="footer-links">
                        <a class="link-1" href="index.php?module=editionExo">Accueil</a> <!-- Changer ici l'action une fois page acceuil finie-->

                        <a href="index.php?module=favoris">Mes Fiches</a>

                        <a href="index.php?module=principale">Fiches publiques</a>

                        <a href="index.php?module=compte&action=affichageInfoCompte">Profil</a>

                        <a href="index.php?module=principale">Contact</a>
                    </p>
                    <p class = "p"> &copy;A2Z 2022</p>
                </div>

            </div>
        </footer>
<?php
    }
}
?>