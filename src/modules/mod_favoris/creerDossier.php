<?php


class dossierBDD  extends Connexion{
    
    public function  __construct()
  {
    $this->envoieDossierBdd();
  }
    function envoieDossierBdd() {

        $sql = "select idUser from Utilisateur where identifiant = :identifiant";
        $stmt = self::$bdd->prepare($sql);
        
        $stmt->execute(array(":identifiant" => $_SESSION['identifiant']));
        $idUser = $stmt->fetch();

        $sql2 = 'INSERT INTO Dossier(nomDossier, idParent, idUser) VALUES ( :nomDossier , :idParent, :idUser)';
        $stmt2 = self::$bdd->prepare($sql2);        
        $stmt->execute(array(':identifiant' => $_SESSION['identifiant'], ':idParent' => $_GET['location'], ':idUser' => $idUser));
        $idUser = $stmt->fetch();



    }
}
?>