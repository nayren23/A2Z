<?php
header('Content-Type: application/json; charset=utf-8');
echo json_encode(isset($_POST["dossier"])? $_POST["dossier"] : "null");

$sql = 'INSERT INTO Dossier(nomDossier, idParent, idUser) VALUES ( ? , ?, ?)';
$stmt = self::$bdd->prepare($sql);
$nomDossier = $_POST["dossier"];
$idParent = 
$idUser = 

header('Location: ./index.php?module=favoris&dossierCourant='.$nomDossier.';'); //redirection vers la page 


?>