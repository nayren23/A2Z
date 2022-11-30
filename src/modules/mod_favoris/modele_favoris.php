<?php


class ModeleFavoris extends Connexion {

    public function __construct () {
        
    }

    public function recupereDossierSelonLocation($affichageDossier) {
        try {
        $sql = "select idDossier, nomDossier from dossier where idParent = ?";
        $stmt = self::$bdd->prepare($sql);
        
        $stmt->execute(array(":idParent" => $_GET['location']));
        $stmt->fetchAll(PDO::FETCH_FUNC, $affichageDossier);
        } catch (PDOException $e) {
        echo $e->getMessage() . $e->getCode();
      }

    }

    function separeDossier()  {

    }
}
?>