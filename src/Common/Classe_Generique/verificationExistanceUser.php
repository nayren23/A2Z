<?php

require_once("./Common/Bibliotheque_Communes/errreur404.php");
require_once "./Common/Classe_Generique/modele_connexion_generique.php";

if (constant("a2z") != "rya")
    die(affichage_erreur404());

class verificationExistanceUser extends Modele_Connexion_Generique
{
    public function verificationExistanceUser()
    {

        try { //On cherche si l'id existe déjà
            if (isset($_SESSION['identifiant'])) {

                $sql = 'Select * from utilisateur WHERE (identifiant=:identifiant)';
                $statement = self::$bdd->prepare($sql);
                $statement->execute(array(':identifiant' => htmlspecialchars($_SESSION['identifiant'])));
                $result = $statement->fetch();
                if (!$result) { //si l'id est correct alors on verifie le mdp
                    $this->deconnexionM();
                    header('Location: ./index.php?module=connexion&action=connexion&SuppresionCompte=true');
                }
            }


        } catch (PDOException $e) {
            echo $e->getMessage() . $e->getCode();
        }
    }
}
