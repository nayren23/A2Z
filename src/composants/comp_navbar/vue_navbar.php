<?php

class Vue_navbar
{ //fonction pour l'affichage de la nav bar

    function navBarHabillage()
    {
?>

<link rel="stylesheet" href="Style_css/NavBar.css">
        <nav>
            <div class="conteneur">
            <div class="container">
                <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                  <a href="index.php?module=editionExo">  <img class="logo" src="ressource/images/TabA2Z.png" width="64" height="64"></a>
                    <div class="navigation">
                        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                            <li><a href="index.php?module=editionExo" class="nav-link px-2 link-secondary">Accueil</a></li>
                            <li><a href="index.php?module=favoris" class="nav-link px-2 link-dark">Mes Fiches</a></li>
                            <li><a href="#" class="nav-link px-2 link-dark">Fiches publiques</a></li>
                        </ul>
                    </div>

                </div>
                <div class="photoProfil">
                    <a href="index.php?module=editionExo" class="d-block link-dark text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="ressource/images/pdp.jpeg" alt="mdo" width="48" height="48" class="rounded-circle">
                    </a>
                    <ul class="dropdown-menu text-small">
                        <li><a class="dropdown-item" href="index.php?module=compte&action=affichageInfoCompte">Profil</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="index.php?module=connexion&action=deconnexion">Déconnexion</a></li>
                    </ul>
                </div>
            </div>
            </div>
            </div>
        </nav>

    <?php
    }
}
?>