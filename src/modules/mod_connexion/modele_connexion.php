<?php

use LDAP\Result;

class ModeleConnexion extends Connexion
{


    public function insereInscription()
    {
        try {


            $sql = 'INSERT INTO connexion (login,mdp) VALUES(:login, :mdp)';
            $statement = Connexion::$bdd->prepare($sql);


            $statement->execute(array(':login' => $_POST['login'], 'mdp' => password_hash($_POST['mdp'], PASSWORD_DEFAULT)));
            echo'Bravo vous venez de créer votre compte avec comme id :' .$_POST['login'];
        } catch (PDOException $e) {
            echo $e->getMessage() . $e->getCode();
        }
    }

    public function verificationConnexion()
    {

        if (isset($_SESSION["login"])) {
            echo 'Vous êtes déjà connecté sous l’identifiant: ' . $_POST['login'];
        } 
        else {

            try {

                $sql = 'Select * from connexion WHERE (login=:login)';
                $statement = self::$bdd->prepare($sql);
                $statement->execute(array(':login' => $_POST['login']));
                $result = $statement->fetch();

                if ($result) { //existe deja 
                    if (password_verify($_POST['mdp'], $result['mdp'])) {
                        $_SESSION['login'] = $result['login'];
                        echo 'Bravo vous etes connecté sous l id : ' . $_SESSION['login'];
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

        if (isset($_SESSION["login"])) {
            echo 'Vous vous déconnectez sous l’identifiant: ' . $_SESSION['login'];
            unset($_SESSION["login"]); // je pense mais pas sur
            session_destroy();
        }
        else {
            echo'Vous devez d abord vous connecté pour faire cette action !!!';
        }
        // unset() détruit la ou les variables dont le nom a été passé en argument var. 

    }
}
