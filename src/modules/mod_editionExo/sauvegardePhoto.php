<?php

require_once "../../connexion.php";

session_start();

class SauvegardePhoto  extends Connexion
{

    public function __construct()
    {
        parent::initConnexion();
    }

    public function envoiePhotos()
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
            $this->recuperationPhotos();
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

    /**
     * FOnction pour récupérer toutes les images de la BDD pour ensuite les envoyé à Js 
     */
    public function recuperationPhotos()
    {
        try {

            //Requetes SQL
            $sql = 'SELECT idImages FROM `images` WHERE idUser=:idUser'; //On récupere d'abord tous les id des images à afficher
            $sql2 = 'SELECT cheminImages FROM `images` WHERE idImages=:idImages'; //On prend les images 1 à 1

            //preparation des requetes SQL
            $statement1 = self::$bdd->prepare($sql);
            $statement2 = self::$bdd->prepare($sql2);

            //////////////////// 1ere Requete ////////////////////

            $idUser = $this->recuperationInfoCompte();
            $statement1->execute(array(':idUser' => $idUser['idUser']));
            $resultat_Tab_ID = $statement1->fetchAll(PDO::FETCH_ASSOC);

            $nouveauxTableauBdd = array_map(fn ($value): string => $value['idImages'], $resultat_Tab_ID); //Pour éviter les structure lourdes de php

            //////////////////// 2ème requete ////////////////////
            $tailleTabImage = count($nouveauxTableauBdd);

            //Boucle for pour envoyer 1 à 1 les images à Js
            for ($i = 0; $i < $tailleTabImage; $i++) {

                $sql2 = 'SELECT cheminImages FROM `images` WHERE idImages =:idImages';
                $statement2->execute(array(':idImages' => $nouveauxTableauBdd[$i]));
                $resultat_Tab_cheminImages[$i] = $statement2->fetch(PDO::FETCH_ASSOC);
            }

            header("Content-Type: application/json"); // On avertit le navigateur du type de donnée qu'on lui envoit !!!Hyper important ne pas enlever ou la page va complétement buguer!!!
            echo json_encode($resultat_Tab_cheminImages); //Envoie à Js
        } catch (PDOException $e) {
            echo $e->getMessage() . $e->getCode();
        }
    }
}

$photoExercice = new SauvegardePhoto();

if(isset($_POST['image'])){
    $photoExercice->envoiePhotos();
}else{
    $photoExercice->recuperationPhotos();
}
