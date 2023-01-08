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

        var_dump($_POST['location'], $idUser);
        $location = intval ($_POST['location']);
        
        $sql2 = 'INSERT INTO fiche(nomFiche, idParent, idUser) VALUES ( :nomDossier , :idParent, :idUser)';
        $stmt2 = self::$bdd->prepare($sql2); 

        $stmt2->execute(array(':titreFicheLivre'=>$_POST['nomFiche'], ':idParent'=> $location, ':idUser'=>$idUser));


      } catch (PDOException $e) {
        echo false;

      }
      echo true;
    }

    public function recupereFicheSelonLocation() {
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
$fiche = new ficheBDD();
if (isset($_POST['nomFiche'])){
  $fiche->envoieficheBdd();
 }
 
?>