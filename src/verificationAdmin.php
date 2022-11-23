<?php

require_once("./connexion.php");

class  VerifAdmin extends Connexion{

function verificationConnexionAdmin()
{
    //Verification de si on est deja connecte

    if (isset($_SESSION['identifiant'])) {
        //Vous êtes déjà connecté sous l’identifiant 
        //TROUVER UN AUTRE MOYEN POUR LE IF
    
        try { //On cherche si l'id existe déjà
            $sql = 'Select * from utilisateur WHERE (identifiant=:identifiant)';
            $statement = Connexion::$bdd->prepare($sql);
            $statement->execute(array(':identifiant' => $_SESSION['identifiant'] ));
            $result = $statement->fetch();
            if ($result) { //si l'id est correct alors on verifie le mdp
                if ($result['idGroupes'] == 2) {
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
}