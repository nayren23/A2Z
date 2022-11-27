<?php

require_once("./connexion.php");

class  VerifAdmin extends Connexion{

public static function verificationConnexionAdmin()
{

    if (isset($_SESSION['identifiant'])) {
    
        try {
            $sql = 'Select * from utilisateur WHERE (identifiant=:identifiant)';
            $statement = Connexion::$bdd->prepare($sql);
            $statement->execute(array(':identifiant' => $_SESSION['identifiant'] ));
            $result = $statement->fetch();
            if ($result) { 
                if ($result['idGroupes'] == 2) {
                    return true; 
                }
            } else {
                return false; 
            }
        } catch (PDOException $e) {
            echo $e->getMessage() . $e->getCode();
        }
    }
}
}