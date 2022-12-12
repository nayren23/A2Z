<?php

require_once "../../connexion.php";

session_start();

class dossierBDD extends Connexion
{

    public function  __construct()
  {
    parent::initConnexion();
    }

    function envoieDossierBdd() {
      try {

        $sql = 'select idUser from utilisateur where identifiant = :identifiant';
        $stmt = self::$bdd->prepare($sql);
        
        $stmt->execute(array(':identifiant' => $_SESSION['identifiant']));
        $tabretour = $stmt->fetch();
        $idUser =$tabretour['idUser'];

        $sql2 = 'INSERT INTO dossier(nomDossier, idParent, idUser) VALUES ( :nomDossier , :idParent, :idUser)';
        $stmt2 = self::$bdd->prepare($sql2); 


        $location = intval ($_POST['location']);
        $stmt2->execute(array(':nomDossier'=>$_POST['dossier'], ':idParent'=> $location, ':idUser'=>$idUser));
        
        $idUser = $stmt->fetch();

        $sql3 = 'select idDossier from dossier where nomDossier = :nomDossier';
        $stmt3 = self::$bdd->prepare($sql3);

        $stmt3->execute(array(':nomDossier' => $_POST['dossier']));
        $tabretour2 = $stmt3->fetch();
        $idDossier = $tabretour2['idDossier'];

      } catch (PDOException $e) {
        echo false;

      }
      echo $idDossier;
    }

    public function recupereDossierSelonLocation() {
      try {
      $sql = "select idDossier, nomDossier from dossier where idParent = :idParent";
      $stmt = self::$bdd->prepare($sql);
      $stmt->execute(array(":idParent" => $_POST['idDossier']));
      
      $resultat = $stmt->fetchAll();
      } catch (PDOException $e) {
      echo false;
    }
    echo json_encode($resultat);

  }
}
$dossier = new dossierBDD();
if (isset($_POST['dossier'])){
  $dossier->envoieDossierBdd();
 }
 if (isset($_POST['idDossier'])){
  $dossier->recupereDossierSelonLocation();
 }
?>