<?php

echo __DIR__;
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

      } catch (PDOException $e) {
        echo $e->getMessage() . $e->getCode();
      }
    }
}
$dossier = new dossierBDD();
if (isset($_POST['dossier'])){
  $dossier->envoieDossierBdd();
 }
?>