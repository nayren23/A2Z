<?php


class dossierBDD  {
    
    public function  __construct()
  {
    
  }
    function envoieDossierBdd() {
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode(isset($_POST["dossier"]) ? $nomDossier = $_POST["dossier"] : "nomDossier null");
        header('Location: ./index.php?module=favoris');



        $sql = 'select idUser from Utilisateur where identifiant = ?';
        $stmt = self::$bdd->prepare($sql);
        $stmt->bind_param("s", $_SESSION["identifiant"]); 
        $idUser = $stmt->fetch();
        echo json_encode(isset($idUser)? $idUser : "idUser null");
        




        $sql2 = 'INSERT INTO Dossier(nomDossier, idParent, idUser) VALUES ( ? , ?, ?)';
        $stmt = self::$bdd->prepare($sql2);
    }
}
?>