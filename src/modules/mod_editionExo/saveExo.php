<?php

require_once "../../connexion.php";

session_start();

class saveExo extends connexion{


    public function __construct(){
        parent::initConnexion();
    }


    public function insereInscription()
    {   
       
        try {
            $sql = 'INSERT INTO fiche (idFiche) VALUES(:idFiche)';
            $statement = Connexion::$bdd->prepare($sql);
            $statement->execute(array(':idFiche' => ($_POST['adresseMail']))); //vois si pour le mdp on fait htmlspecialchars
        } catch (PDOException $e) {
            echo "erreur";
        }
    }
}


$exoSauvegarder = new saveExo();
$exoSauvegarder->insereInscription();
?>
