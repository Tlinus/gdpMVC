<?php
	session_start();
	require '../SQL/connectbdd.php';
	$query ="DELETE FROM role 
			WHERE id_utilisateur = :idUser AND id_projet = :idProjet ;";

	$delete_query = $bdd->prepare($query);
	$delete_query->bindValue(':idUser',		$_POST['idUser'],		PDO::PARAM_INT);
	$delete_query->bindValue(':idProjet',	$_POST['idProjet'],		PDO::PARAM_INT);
	$delete_query->execute();
 ?>