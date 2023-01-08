<?php

require_once("./Common/Bibliotheque_Communes/errreur404.php");
if (constant("a2z") != "rya")
	die(affichage_erreur404());


class ModeleFavoris extends Connexion {

    public function __construct () {
        
    }

   public function creerFiche() {
    $sql = 'INSERT INTO fiche(idUser) VALUES (:idUser)';
    $stmt = self::$bdd->prepare($sql);
    $stmt->execute(array(':identifiant' => $_SESSION['identifiant']));
    $tabretour = $stmt->fetch();
    $idUser =$tabretour['idUser'];


    $location = intval ($_POST['location']);
    $stmt2->execute(array(':idUser'=>$idUser));
   }

}
?>