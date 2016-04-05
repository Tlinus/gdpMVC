<?php

	session_start();
	require './zOthers/BDD/connectbdd.php';


	
	$projet = $_POST['try'];

	$query= " SELECT nom, prenom FROM utilisateur";
	$select_query = $bdd->prepare($query);
	$select_query->execute();
	$result = $select_query->fetchAll();
	echo $result;
	  
