<?php
header('Content-Type: application/json; charset=utf-8');
echo json_encode(isset($_POST["dossier"])? $_POST["dossier"] : "null");

$sql = 'INSERT INTO Dossier VALUES ("$_POST["dossier"]","")';
$statement = self::$bdd->prepare($sql);


?>