<?php


class ModeleCompte  extends Connexion
{

    //fonction changement d'identifiant et verifie sil est unique 
    public function changerIdentifiant()
    {

        try {
            //ici on teste si l'identifiant est différents des autres
            $sql = 'Select * from Utilisateur WHERE identifiant=:identifiant';
            $statement = self::$bdd->prepare($sql);
            $statement->execute(array(':identifiant' => $_POST['nouveauidentifiant']));
            $resultat = $statement->fetch();

            //si on trouve le bon user alors
            if ($resultat) {
                return false; //identifiant deja utilisé';
            } else {

                // ici on UPDATE les donnee dans la BDD
                $commande = ' UPDATE utilisateur SET identifiant ="' . $_POST['nouveauidentifiant'] . '" WHERE  identifiant=:identifiant';
                $statement = Connexion::$bdd->prepare($commande);
                $statement->execute(array(':identifiant' => ($_SESSION["identifiant"])));
                $result = $statement->fetch();

                //on oublie pas ici de changer également le $Session 
                $_SESSION['identifiant'] = $_POST['nouveauidentifiant'];
                return true;
            }
        } catch (PDOException $e) {
            echo $e->getMessage() . $e->getCode();
        }
    }

    //fonction changement d'adresse mail et verifie s il est unique 
    public function changerAdresseMail()
    {

        try {
            //ici on teste si l'adresse mail entrer par l'user  est différents des autres
            $sql = 'Select * from Utilisateur WHERE adresseMail=:adresseMail';
            $statement = self::$bdd->prepare($sql);
            $statement->execute(array(':adresseMail' => $_POST['nouveladresseMail']));
            $result = $statement->fetch();

            //si on trouve le bon user alors
            if ($result) {
                return false; //adresseMail deja utilisé';
            } else {
                // ici on UPDATE les donnee dans la BDD
                $commande = ' UPDATE utilisateur SET adresseMail ="' . $_POST['nouveladresseMail'] . '" WHERE  identifiant=:identifiant';
                $statement = Connexion::$bdd->prepare($commande);
                $statement->execute(array(':identifiant' =>  $_SESSION['identifiant']));
                $result = $statement->fetch();
                return true;
            }
        } catch (PDOException $e) {
            echo $e->getMessage() . $e->getCode();
        }
    }

    //fonction de changement de mot de passe avec le hashage
    public function changerMotDePasse()
    {

        try {
            // ici on UPDATE les donnee dans la BDD
            $sql = 'UPDATE utilisateur SET motDePasse ="' .  password_hash($_POST['nouveauMotDePasse'], PASSWORD_DEFAULT) . '" WHERE  identifiant=:identifiant';
            $statement = Connexion::$bdd->prepare($sql);
            $statement->execute(array(':identifiant' =>  $_SESSION['identifiant']));
            $result = $statement->fetch();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage() . $e->getCode();
        }
    }

    /*fonction qui récupere l'image upload  par l'user et met le format de l'image au format base 64   et qui teste plusieurs choses
       1- tout d'abord  si on a pas d'erreur pour le transfert 
       2- puis on vérifie la taille du fichier
       3- ensuite l'extension du fichier si c'est bien une image
       4- ensuite on met la photo dans un dossier temporaire pour ensuite la mettre au format base 64 
    */
    public function recupereImage()
    {
        if (isset($_POST['submit'])) {

            $tailleMaximum = 500000;
            $extension = array('.jpg', '.jpeg', '.gif', '.png');

            if ($_FILES['nouvelPhotoDeProfile']['error'] > 0) {
                return 1; // erreur lors du transfert
            }

            $tailleFichier = $_FILES['nouvelPhotoDeProfile']['size'];

            if ($tailleFichier > $tailleMaximum) {
                return 2; //taille trop grande
            }

            $nomFichier =  $_FILES['nouvelPhotoDeProfile']['name'];
            $extensionFichier = "." . strtolower(substr(strrchr($nomFichier, '.'), 1));

            if (!in_array($extensionFichier, $extension)) {
                return 3; //fichier pas une image;
            }

            $nomTemporaire = $_FILES['nouvelPhotoDeProfile']['tmp_name'];
            $nomUnique = md5(uniqid(rand(), true)); // on lui donne  un id unique au nom fichier
            $nomFichier = "upload/" . $nomUnique . $extensionFichier;
            $resultat = move_uploaded_file($nomTemporaire, $nomFichier); //Déplace un fichier téléchargé ici dans upload

            if ($resultat) {
                $path = $nomFichier;
                $type = pathinfo($path, PATHINFO_EXTENSION);
                $data = file_get_contents($path);
                $base64 = 'data:image/' . $type . ';base64, ' . base64_encode($data);
                return $base64; // echo"transfert termniné";
            }
        }
    }

    // fonction qui envoie l'image reçu en base 64 à la BDD
    public function changementPhoto($image)
    {
        try {
            // ici on UPDATE les donnee dans la BDD
            $commande = ' UPDATE utilisateur SET cheminImage ="' . $image . '" WHERE  identifiant=:identifiant';
            $statement = Connexion::$bdd->prepare($commande);
            $statement->execute(array(':identifiant' =>  $_SESSION['identifiant']));
            $result = $statement->fetch();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage() . $e->getCode();
        }
    }

    // fonction génerique pour récupérer toutes les infosd'un user dans un seul tableau 
    public function recuperationInfoCompte()
    {
        $sql = 'Select * from Utilisateur WHERE identifiant=:identifiant';
        $statement = self::$bdd->prepare($sql);
        $statement->execute(array(':identifiant' => $_SESSION['identifiant']));
        $resultat = $statement->fetch();
        return $resultat;
    }
}
