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
            for ($i = 0; $i < count($tableauContenuExerciceDecode)-1; $i++){
               
                

                $sql = 'INSERT into exercices (idExo, contenu)  VALUES (:idExo , :contenu)'; 

                $statement = Connexion::$bdd->prepare($sql);
                $idExercice = $tableauContenuExerciceDecode['idExo'][$i] ;
                $html =  $tableauContenuExerciceDecode['html'][$i] ;
                
                var_dump($tableauContenuExerciceDecode['idExo'][$i]);
                var_dump($idExercice);
                var_dump($html);
                

                $statement->execute(array(':idExo' => $idExercice, ':contenu' => $html)); //vois si pour le mdp on fait htmlspecialchars
              


            }
            
        } catch (PDOException $e) {
            echo $e->getMessage() . $e->getCode();
        }
    }
}


$exoSauvegarder = new saveExo();
$exoSauvegarder->insereInscription();
?>
