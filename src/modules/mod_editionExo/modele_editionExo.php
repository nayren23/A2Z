<?php

require_once("./Common/Classe_Generique/modele_connexion_generique.php");

if (constant("a2z") != "rya")
	die(affichage_erreur404());



class ModeleEditionExo  extends Modele_Connexion_Generique
{

	public function __construct()
    {
        parent::initConnexion();
    }

	/**
	 * fonction qui récupere l'ensembles des exercices d'une fiche
	 */
	public function recupererExercices()
	{
		$idFiche = htmlspecialchars($_GET['idFiche']);

		$sql1 = 'Select contenu from exercices where idFiche = :idFiche ORDER BY positionExercice'; // selectionenr les exercices avec lequel l'id de la fiche existe deja et si l'exo existe deja 
		$statement1 = Connexion::$bdd->prepare($sql1);

		$statement1->execute(array(':idFiche' => $idFiche));
		$result = $statement1->fetchAll();//on  retourne tous les exos

		return $result;
	}

		/**
	 * fonction qui récupere l'ensembles des exercices d'une fiche
	 */
	public function recupererImages()
	{
		$idFiche = htmlspecialchars($_GET['idFiche']);

		$sql1 = 'Select * from images where idUser = :idUser ORDER BY Dateimage'; // selectionenr les exercices avec lequel l'id de la fiche existe deja et si l'exo existe deja 
		$statement1 = Connexion::$bdd->prepare($sql1);
		$idUseur =$this->recuperationInfoCompte();

		$statement1->execute(array(':idUser' => $idUseur['idUser']));
		$result = $statement1->fetchAll();//on  retourne tous les exos

		return $result;
	}

	
	
}


?>