<?php

require_once "../../connexion.php";

session_start();

class saveExo extends connexion{


    public function __construct(){
        parent::initConnexion();
    }


    public function insereInscription()
    {   
        $exercice = $_POST['stringRecu'];
        var_dump($exercice);
        try {
            $sql = 'INSERT INTO exercices (contenu) VALUES(:contenu)'; //Il faut mettre un update
            $statement = Connexion::$bdd->prepare($sql);
            $statement->execute(array(':contenu' => $exercice)); //vois si pour le mdp on fait htmlspecialchars
        } catch (PDOException $e) {
            echo $e->getMessage() . $e->getCode();
        }
    }
}


$exoSauvegarder = new saveExo();
$exoSauvegarder->insereInscription();
?>
