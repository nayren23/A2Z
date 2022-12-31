<?php

require_once "../../connexion.php";

session_start();

class SauvegardePhoto  extends Connexion
{

    public function __construct()
    {
        parent::initConnexion();
    }

    public function recupererPhotos()
    {

        if (isset($_POST['image'])) {
            $photo = $_POST['image']; // tableau en JSON contenant tout (id et le code html)
            $tableauContenuImage = json_decode($photo, true);

            $sql1 = 'INSERT into images (cheminImages,DateImage,idUser,DescriptionImages)  VALUES (:cheminImages ,:DateImage,:idUser,:DescriptionImages)';
            $statement1 = Connexion::$bdd->prepare($sql1);

            $cheminImages = $tableauContenuImage['imageData'];
            $DescriptionImages = $tableauContenuImage['nomImage'];


            $DateImage  = date("Y-m-d");
            $idUser = $this->recuperationInfoCompte();
            $statement1->execute(array(':cheminImages' => htmlspecialchars($cheminImages), ':DateImage' => htmlspecialchars($DateImage), ':idUser' => htmlspecialchars($idUser['idUser']), ':DescriptionImages' => htmlspecialchars($DescriptionImages)));
        }
    }

    // fonction génerique pour récupérer toutes les infos d'un user dans un seul tableau 
    public function recuperationInfoCompte()
    {
        try {
            $sql = 'Select * from utilisateur WHERE identifiant=:identifiant';
            $statement = self::$bdd->prepare($sql);
            $statement->execute(array(':identifiant' => $_SESSION['identifiant']));
            $resultat = $statement->fetch();
            return $resultat;
        } catch (PDOException $e) {
            echo $e->getMessage() . $e->getCode();
        }
    }
}

$photoExercice = new SauvegardePhoto();
$photoExercice->recupererPhotos();