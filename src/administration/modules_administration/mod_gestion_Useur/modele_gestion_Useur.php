<?php

use LDAP\Result;

require_once("./Verification_Creation_Token.php"); //

class ModeleConnexion_gestion_Useur extends Connexion
{

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
                var_dump($result['idGroupes']);
                if ($result) { //si l'id est correct alors on verifie le mdp
                    if (password_verify(htmlspecialchars($_POST['motDePasse']), $result['motDePasse']) && $result['idGroupes'] == 2) {
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

    // fonction pour récupérer idUser, adresseMail,identifiant, motDePasse,idGroupes dans un tableau 
    public function recuperationInfoCompte()
    {
        try {
            $sql = 'Select idUser, adresseMail,identifiant,cheminImage,idGroupes from utilisateur';
            $statement = self::$bdd->prepare($sql);
            $statement->execute();
            $resultat = $statement->fetchAll();//fetchAll pour recuper le tout dans le tableau resultat
            return $resultat;
        } catch (PDOException $e) {
            echo $e->getMessage() . $e->getCode();
        }
    }
}
