<?php
require_once "./connexion.php";

require_once("./Common/Bibliotheque_Communes/errreur404.php");
if (constant("a2z") != "rya")
	die(affichage_erreur404());



class ModeleEditionExo  extends Connexion
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

	public function recupererPhotos(){

		if(isset($_POST['image'])){
			$photo64 = $_POST['image']; // tableau en JSON contenant tout (id et le code html)
			var_dump($photo64);
		}


	}

	
}

$photoExercice = new ModeleEditionExo();
$photoExercice->recupererPhotos();

?>