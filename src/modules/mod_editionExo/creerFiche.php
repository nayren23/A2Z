<?php

require_once "../../connexion.php";

session_start();

class ficheBDD extends Connexion
{

    public function  __construct()
  {
    parent::initConnexion();
    }

    function envoieFicheBdd() {
      try {
        $sql = 'select idUser from utilisateur where identifiant = :identifiant';
        $stmt = self::$bdd->prepare($sql);
        $stmt->execute(array(':identifiant' => $_SESSION['identifiant']));
        $tabretour = $stmt->fetch();
        $idUser =$tabretour['idUser'];

        $location = intval ($_POST['location']);
        
        $sql2 = 'INSERT INTO fiche(nomFiche, idDossier, idUser) VALUES ( :nomFiche , :idDossier, :idUser)';
        $stmt2 = self::$bdd->prepare($sql2); 

        $stmt2->execute(array(':nomFiche'=>$_POST['nomFiche'], ':idDossier'=> $location, ':idUser'=>$idUser));

        $sql3 = 'select idFiche from fiche where nomFiche = :nomFiche';
        $stmt3 = self::$bdd->prepare($sql3);

        $stmt3->execute(array(':nomFiche' => $_POST['nomFiche']));
        $tabretour2 = $stmt3->fetch();
        $idFiche = $tabretour2['idFiche'];

      } catch (PDOException $e) {
        echo false;

      }
      echo $idFiche;
    }

    public function recupererFicheSelonLocation() {
      try {
      $sql = "SELECT idFiche, nomFiche from fiche join utilisateur where idDossier = :idDossier and identifiant = :identifiant";
      $stmt = self::$bdd->prepare($sql);
      $stmt->execute(array(":idDossier" => $_POST['idParent'], ":identifiant" => $_SESSION['identifiant']));
      
      $resultat = $stmt->fetchAll();
    } catch (PDOException $e) {
      echo false;
    }
    echo json_encode($resultat);

  }
}
$fiche = new ficheBDD();
if (isset($_POST['nomFiche'])){
  $fiche->envoieficheBdd();
 }
 if (isset($_POST['idParent'])){
$fiche->recupererFicheSelonLocation();
 }
 
?>