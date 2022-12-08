<?php

require_once "../../connexion.php";

session_start();

class saveExo extends connexion{


    public function __construct(){
        parent::initConnexion();
    }


    public function insereInscription()
    {   
        $exerciceJSON = $_POST['stringRecu']; // tableau en JSON contenant tout (id et le code html)
        //var_dump($exerciceJSON);
        $tableauContenuExerciceDecode = json_decode($exerciceJSON,true);
        //decoder le json en fichier
        try {       
            // faire une boucle for qui va d'une part
            $sql = 'INSERT into exercices (idExo, contenu)  VALUES (:idExo , :contenu)'; 
            $statement = Connexion::$bdd->prepare($sql);
            
            var_dump($tableauContenuExerciceDecode);
            var_dump(count($tableauContenuExerciceDecode['idExo']));
            for ($i = 0; $i < count($tableauContenuExerciceDecode['idExo']); $i++){
               
               


                $idExercice = htmlspecialchars($tableauContenuExerciceDecode['idExo'][$i]) ;
                $html =  htmlspecialchars($tableauContenuExerciceDecode['html'][$i]);
                
                $tableauExec = array(':idExo' => $idExercice, ':contenu' => json_encode($html));


                $statement->execute($tableauExec); //vois si pour le mdp on fait htmlspecialchars



            }
            
        } catch (PDOException $e) {
            echo $e->getMessage() . $e->getCode();
        }
    }
}


$exoSauvegarder = new saveExo();
$exoSauvegarder->insereInscription();
?>