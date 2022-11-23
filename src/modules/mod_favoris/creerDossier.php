<?php

require_once "../../connexion.php";
require_once "./cont_favoris.php";


class dossierBDD extends Connexion
{
  
  private $contFav;
    public function  __construct()
  {
    $this->envoieDossierBdd();
    $this->$contFav = new ContFavoris();

      }


    function envoieDossierBdd() {
      echo $this->$contFav->getLocation();
      try {

        $sql = "select idUser from Utilisateur where identifiant = :identifiant";
        $stmt = self::$bdd->prepare($sql);
        
        $stmt->execute(array(":identifiant" => $_SESSION['identifiant']));
        $idUser = $stmt->fetch();
        echo $idUser;
        $sql2 = 'INSERT INTO Dossier(nomDossier, idParent, idUser) VALUES ( :nomDossier , :idParent, :idUser)';
        $stmt2 = self::$bdd->prepare($sql2); 


        $stmt->execute(array(':nomDossier'=>$_POST['dossier'], ':idParent'=>$_GET['location'], ':idUser'=>$idUser));
        $idUser = $stmt->fetch();

      } catch (PDOException $e) {
        echo $e->getMessage() . $e->getCode();
      }


    }
}
echo $_POST['dossier'];


session_start();
Connexion::initConnexion();
$dossier = new dossierBDD();

?>