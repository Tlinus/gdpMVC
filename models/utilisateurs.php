<?php
include_once('./zOthers/BDD/connectbdd.php');
function getUtilisateur($utilisateur_id){
	global $bdd;
	$utilisateur_query			= " SELECT * FROM utilisateur
									WHERE id = :id ";

	$pdo_select					= $bdd->prepare($utilisateur_query);
	$pdo_select->bindValue		(':id', 		$utilisateur_id,		PDO::PARAM_INT);
	$pdo_select->execute();
	
	$utilisateurs				= $pdo_select->fetch();
	 
	$_SESSION['user'] =  [
		'utilisateur_id'				=> $utilisateurs['id'],
		'utilisateur_nom'				=> $utilisateurs['nom'],
		'utilisateur_prenom'			=> $utilisateurs['prenom'],
		'utilisateur_mdp' 				=> $utilisateurs['mdp'],
		'utilisateur_email' 			=> $utilisateurs['email'],
		'utilisateur_fonction' 			=> $utilisateurs['fonction'],
		'utilisateur_application' 		=> $utilisateurs['application'],
		'utilisateur_avatar' 			=> $utilisateurs['avatar'],
		'utilisateur_is_admin' 			=> $utilisateurs['is_admin']
	];
	return 1;
}
function sessionOn($email, $password){
			global $bdd;
			$requete = $bdd->prepare('SELECT * FROM utilisateur WHERE email = :email AND mdp= :mdp');
			$requete->execute(array(':email' => $email, ':mdp' => $password));
			$requete = $requete->fetch();
			$_SESSION['id'] = $requete['id'];
			$_SESSION['isAdmin'] = $requete['is_admin'];
			$_SESSION['mail'] =$requete['email'];
			getUtilisateur($requete['id']);
			return 1;
			
}
function getToutUtilisateur(){
	$utilisateur_query			= "SELECT * FROM utilisateur;";
	
	$pdo_select					= $bdd->prepare($utilisateur_query);
	
	$pdo_select->execute();
	$utilisateurs				= $pdo_select->fetchAll();
	$utilisateurs_nombre 		= $pdo_select->rowCount();

	return array($utilisateurs, $utilisateurs_nombre);
}

function getUtilisateursNonAssigneSurLeProjet($projet_id){
	$utilisateurProjet_query	= " SELECT * 
									FROM utilisateur 
									WHERE id NOT IN (
									SELECT id_utilisateur
									FROM role 
									WHERE id_projet = :id_projet);";	
	
	$pdo_select					= $bdd->prepare($utilisateurProjet_query);
	$pdo_select->bindValue		(':id_projet', 		$Projet_id,		PDO::PARAM_INT);
	$pdo_select->execute();
	
	$utilisateursLibre= $pdo_select->fetchAll();

	return $utilisateursLibre;
}

function getUtilisateursAssigneSurProjet($projet_id){
	$utilisateur_query			= " SELECT * FROM role 
									INNER JOIN utilisateur
									ON role.id_utilisateur = utilisateur.id
									WHERE id_projet = :id_projet;";

	$pdo_select					= $bdd->prepare($utilisateur_query);
	$pdo_select->bindValue		(':id_projet', 		$projet_id,		PDO::PARAM_INT);
	$pdo_select->execute();
	$utilisateurs				= $pdo_select->fetchAll();

	return $utilisateurs;
}

function getProjetDunUtilisateur($id){
	$role_query			= "SELECT * FROM role
						Where id_utilisateur = :id;";
	$pdo_select					= $bdd->prepare($role_query);
	$pdo_select->bindValue(		':id',		$id,			PDO::PARAM_INT);
	$pdo_select->execute();
	$nbProjets 				= $pdo_select->rowCount();
	return $idProjets				= $pdo_select->fetchAll();
	
}
?>