<?php

require_once("./Common/Bibliotheque_Communes/errreur404.php");
if (constant("a2z") != "rya")
	die(affichage_erreur404());


class ModeleFavoris extends Connexion {

    public function __construct () {
        
    }

   public function creerFiche() {
    $sql2 = 'INSERT INTO fiche(idUser) VALUES (:idUser)';
    $stmt2 = self::$bdd->prepare($sql2); 


    $location = intval ($_POST['location']);
    $stmt2->execute(array(':idUser'=>$idUser));
   }

}
?>