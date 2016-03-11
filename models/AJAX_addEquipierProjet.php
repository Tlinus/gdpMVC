<?php

	session_start();
	require '../SQL/connectbdd.php';


	$array = json_decode($_POST['retour']);
	$projet = $_POST['idProjet'];

	$query= " INSERT INTO role
			(id_utilisateur, id_projet, fonction_attribue)
			VALUES
			(:id, :projet, :fct);";
			var_dump($array);
	foreach ($array as $key ) {

	 	$insert_query = $bdd->prepare($query);
	 	$result = $insert_query->execute(array(
	 		'id'=>$key[0], 
	 		'projet'=>$projet, 
	 		'fct'=>$key[1]
	 	));
	 	echo $result;
	 } 
