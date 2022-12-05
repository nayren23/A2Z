<?php

require_once("./Common/Bibliotheque_Communes/errreur404.php");
if (constant("a2z") != "rya")
	die(affichage_erreur404("index.php?module=connexion&action=connexion"));

function affichage_erreur404($lien)
{
?>
    <link rel="stylesheet" href="Style_css/erreur404.css">
    <h1>Erreur 404</h1>
    <p class="zoom-area"><b>A2Z</b> Page Inconnu </p>
    <section class="error-container">
        <span class="four"><span class="screen-reader-text">4</span></span>
        <span class="zero"><span class="screen-reader-text">0</span></span>
        <span class="four"><span class="screen-reader-text">4</span></span>
    </section>
    <div class="link-container">
        <a  href="<?php echo $lien; ?>" class="more-link">Retour à la page d'accueil</a>
    </div>
<?php

}


?>