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
            $photo64 = $_POST['image']; // tableau en JSON contenant tout (id et le code html)

            $sql1 = 'INSERT into images (cheminImages, DescriptionImages,idBanqueImageUser,DateImage)  VALUES (:cheminImages , :DescriptionImages, :idBanqueImageUser, :DateImage)';
            $statement1 = Connexion::$bdd->prepare($sql1);

            $cheminImages = $photo64;
            $DescriptionImages = 0;
            $idBanqueImageUser = 1;
            $DateImage  = date("Y-m-d");

            $statement1->execute(array(':cheminImages' => $cheminImages, ':DescriptionImages' => $DescriptionImages, ':idBanqueImageUser' => $idBanqueImageUser, ':DateImage'=> $DateImage ));
        }
    }

}

$photoExercice = new SauvegardePhoto();
$photoExercice->recupererPhotos();
