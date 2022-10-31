<?php


class ModeleCompte  extends Connexion
{

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


    public function recuperationInfoCompte(){
        $sql = 'Select * from Utilisateur WHERE identifiant=:identifiant';
        $statement = self::$bdd->prepare($sql);
        $statement->execute(array(':identifiant' => $_SESSION['identifiant']));
        $resultat = $statement->fetch();
        //var_dump($resultat["identifiant"]);
        //echo $resultat["identifiant"] . $resultat["motDePasse"] . $resultat["adresseMail"];
        return $resultat ;
    }
}
