<?php

	session_start();
	require './zOthers/BDD/connectbdd.php';

	
	$query= " SELECT nom, prenom FROM utilisateur where nom LIKE :name OR prenom LIKE :prenom";
	$select_query = $bdd->prepare($query);
	$select_query->bindValue(':name', 	$_POST['catch'], PDO::PARAM_STR);
	$select_query->bindValue(':prenom', $_POST['catch'], PDO::PARAM_STR);
	$select_query->execute();
	$result = $select_query->fetchAll();
	echo $result;
	return $result;
	  
