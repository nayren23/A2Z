<?php

use LDAP\Result;

require_once("./Common\Bibliotheque_Communes\Verification_Creation_Token.php");
require_once("./modules\mod_compte\modele_compte.php");

class ModeleConnexion_gestion_Useur extends ModeleCompte
{

const nbr_elements_par_page=3;//on définit ici on veut cb d'useur par page
    public function suppresionUtilisateur($idUseur)
    {
        try {
            $sql = 'DELETE FROM utilisateur WHERE utilisateur.identifiant=:identifiant ';
            $statement = self::$bdd->prepare($sql);
            $statement->execute(array(':adresseMail' => $idUseur));
            $resultat = $statement->fetchAll(); //fetchAll pour recuper le tout dans le tableau resultat
            return $resultat;
        } catch (PDOException $e) {
            echo $e->getMessage() . $e->getCode();
        }

        $sql = 'Select * from utilisateur WHERE adresseMail=:adresseMail or identifiant=:identifiant';
        $statement = self::$bdd->prepare($sql);
        $statement->execute(array(':adresseMail' => htmlspecialchars($_POST['adresseMail']), ':identifiant' => htmlspecialchars($_POST['identifiant'])));
        $result = $statement->fetch();
    }


    // fonction pour récupérer idUser, adresseMail,identifiant, motDePasse,idGroupes,cheminImage dans un tableau 
    public function recuperationInfoCompte()
    {   
        if(isset($_GET["page"])){
            $page = $_GET["page"];
        }
        if(empty($page)){
            $page=1;//pour que la première page soit à 1
        }
        $debut = strval(($page-1)* self::nbr_elements_par_page); //pour convertir la chaine en int si jamais pour la requete sql  ci dessous
        try {
            $sql = "Select idUser, adresseMail,identifiant,cheminImage,idGroupes from utilisateur limit ". $debut .",". self::nbr_elements_par_page ;
            $statement = self::$bdd->prepare($sql);
            $statement->execute();
            $resultat = $statement->fetchAll(); //fetchAll pour recuper le tout dans le tableau resultat
            return $resultat;
        } catch (PDOException $e) {
            echo $e->getMessage() . $e->getCode();
        }
    }


    public function recuperationStatistiqueUseur()
    {
        try {
            $sql = 'SELECT COUNT(*) as userNumber FROM utilisateur WHERE idGroupes = 1 UNION ALL SELECT COUNT(*) as userNumber2 FROM utilisateur WHERE idGroupes = 2';
            $statement = self::$bdd->prepare($sql);
            $statement->execute();
            $resultat = $statement->fetchAll(); //fetchAll pour recuper le tout dans le tableau resultat
            return $resultat;
        } catch (PDOException $e) {
            echo $e->getMessage() . $e->getCode();
        }
    }

    /**
     * cette fonction calcule le nombre de pages qu'il faut pour toutes les données
     */
    public function pagination(){

        try {
            $sql = 'SELECT COUNT(*) as id FROM utilisateur ';
            $statement = self::$bdd->prepare($sql);
            $statement->execute();
            $resultat = $statement->fetchAll(); //fetchAll pour recuper le tout dans le tableau resultat
            $nbr_de_pages = ceil($resultat[0]['id'] / self::nbr_elements_par_page);//ceil pour récuperer la val entière 
            return $nbr_de_pages;
        } catch (PDOException $e) {
            echo $e->getMessage() . $e->getCode();
        }

    }
}
