<?php

use LDAP\Result;

class ModeleConnexion extends Connexion
{


    public function insereInscription()
    {
        try {
            //ici on teste si l'adresse mail est deja utilise
            $sql = 'Select * from Utilisateur WHERE (adresseMail=:adresseMail)';
            $statement = self::$bdd->prepare($sql);
            $statement->execute(array(':adresseMail' => $_POST['adresseMail']));
            $result = $statement->fetch();
            if($result){
                echo'adresseMail deja utilisé';
                return false;
            }

            else{

            // ici on insere les donnee dans la BDD
            $sql = 'INSERT INTO Utilisateur (adresseMail,identifiant,motDePasse) VALUES(:adresseMail,:identifiant, :motDePasse)';
            $statement = Connexion::$bdd->prepare($sql);
            $statement->execute(array(':adresseMail'=>$_POST['adresseMail'],':identifiant' => $_POST['identifiant'], 'motDePasse' => password_hash($_POST['motDePasse'], PASSWORD_DEFAULT)));
            return true;
        }
        } catch (PDOException $e) {
            echo $e->getMessage() . $e->getCode();
        }
    }

    public function verificationConnexion()
    {

        if (isset($_SESSION["identifiant"])) {
            //echo 'Vous êtes déjà connecté sous l’identifiant: ' . $_POST['identifiant'];
        } 

        else {

            try {

                $sql = 'Select * from Utilisateur WHERE (identifiant=:identifiant)';
                $statement = self::$bdd->prepare($sql);
                $statement->execute(array(':identifiant' => $_POST['identifiant']));
                $result = $statement->fetch();

                if ($result) { //existe deja 
                    if (password_verify($_POST['motDePasse'], $result['motDePasse'])) {
                        $_SESSION['identifiant'] = $result['identifiant'];
                        echo 'Bravo vous etes connecté sous l id : ' . $_SESSION['identifiant'];
                    }
                }
                 else {
                    echo 'Vous n avez pas de compte';
                }
            } catch (PDOException $e) {
                echo $e->getMessage() . $e->getCode();
            }
        }
    }

    public function deconnexionM()
    {

        if (isset($_SESSION["identifiant"])) {
           // echo 'Vous vous déconnectez sous l’identifiant: ' . $_SESSION['identifiant'];  // a supprimer 
            unset($_SESSION["identifiant"]); // je pense mais pas sur
            session_destroy();
        }
        else {
          //  echo'Vous devez d abord vous connecté pour faire cette action !!!';  // a supprimer 
        }
        // unset() détruit la ou les variables dont le nom a été passé en argument var. 

    }
}
