<?php

session_start();
define('SITE_ROOT',__DIR__);

require_once "connexion.php";


require_once("./vue_generique.php");
require_once ("controleur.php");


?>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
<?php
$controleur = new Controleur();

echo $controleur->resultat; // affichage du tampon 
?>
