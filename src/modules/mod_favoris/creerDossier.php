<?php

echo __DIR__;
require_once "../../connexion.php";

session_start();
$_SESSION["identifiant"] = "ok";

class dossierBDD extends Connexion
{
  

    public function  __construct()
  {
    parent::initConnexion();

    if (isset($_POST['dossier'])){
     $this->envoieDossierBdd();
    }
    if (isset($_POST['nomDossier'])) {
      
    }

    }


    function envoieDossierBdd() {
      
      try {
        
        $sql = "select idUser from Utilisateur where identifiant = :identifiant";
        $stmt = self::$bdd->prepare($sql);
        
        $stmt->execute(array(":identifiant" => $_SESSION['identifiant']));
        $idUser = $stmt->fetch();

        echo $idUser;
        
        $sql2 = 'INSERT INTO Dossier(nomDossier, idParent, idUser) VALUES ( :nomDossier , :idParent, :idUser)';
        $stmt2 = self::$bdd->prepare($sql2); 


        $stmt->execute(array(':nomDossier'=>$_POST['dossier'], ':idParent'=> $_GET["location"], ':idUser'=>$idUser));
        
        $idUser = $stmt->fetch();
        echo $idUser0,$_GET['location'], $_POST['dossier'];
        
        $this->contFav->afficheIconeDossier();

      } catch (PDOException $e) {
        echo $e->getMessage() . $e->getCode();
      }


    }
}

$dossier = new dossierBDD();

?>