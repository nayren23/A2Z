<?php

use LDAP\Result;

require_once("./Verification_Creation_Token.php"); //

class ModeleConnexion extends Connexion
{

    public function insereInscription()
    {

        if (!verification_token())
            return 1;

        elseif (strcmp($_POST['motDePasse'], $_POST['DeuxiemeMotDePasse']) != 0) {
            return 2;
        }

        try {
            //ici on teste si l'adresse mail est deja utilise
            $sql = 'Select * from utilisateur WHERE adresseMail=:adresseMail or identifiant=:identifiant';
            $statement = self::$bdd->prepare($sql);
            $statement->execute(array(':adresseMail' => htmlspecialchars($_POST['adresseMail']), ':identifiant' => htmlspecialchars($_POST['identifiant'])));
            $result = $statement->fetch();
            if ($result) {
                return 3; //adresseMail deja utilisé';
            } else {

                // ici on insere les donnee dans la BDD
                $sql = 'INSERT INTO utilisateur (adresseMail,identifiant,motDePasse) VALUES(:adresseMail,:identifiant, :motDePasse)';
                $statement = Connexion::$bdd->prepare($sql);
                $statement->execute(array(':adresseMail' => htmlspecialchars($_POST['adresseMail']), ':identifiant' => htmlspecialchars($_POST['identifiant']), 'motDePasse' => password_hash(htmlspecialchars($_POST['motDePasse']), PASSWORD_DEFAULT))); //vois si pour le mdp on fait htmlspecialchars
                return 4;
            }
        } catch (PDOException $e) {
            echo $e->getMessage() . $e->getCode();
        }
    }

    public function verificationConnexion()
    {
        //Verification de si on est deja connecte
        if (isset($_SESSION['identifiant'])) {
            //Vous êtes déjà connecté sous l’identifiant 
            //TROUVER UN AUTRE MOYEN POUR LE IF
        }
        if (!verification_token())
            return 1; // faire une pop up et verification dans le  controlleur
        else {

            try { //On cherche si l'id existe déjà
                $sql = 'Select * from utilisateur WHERE (identifiant=:identifiant)';
                $statement = self::$bdd->prepare($sql);
                $statement->execute(array(':identifiant' => htmlspecialchars($_POST['identifiant'])));
                $result = $statement->fetch();

                if ($result) { //si l'id est correct alors on verifie le mdp
                    if (password_verify(htmlspecialchars($_POST['motDePasse']), $result['motDePasse'])) {
                        $_SESSION['identifiant'] = $result['identifiant'];
                        return true; // connexion reussie au site
                    }
                } else {
                    return false; //pas de compte
                }
            } catch (PDOException $e) {
                echo $e->getMessage() . $e->getCode();
            }
        }
    }

    public function deconnexionM()
    {
        if (isset($_SESSION["identifiant"])) {
            unset($_SESSION["identifiant"]);
            session_destroy();
            return true;
        } else {
            return false; //Vous devez d abord vous connecté pour faire cette action !!!
        }
    }
}
