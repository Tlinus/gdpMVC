<?php
include_once('./zOthers/BDD/connectbdd.php');
Class UtilisateurModel{
	private $utilisateur_id;
	private $utilisateur_nom;
	private $utilisateur_prenom;
	private $utilisateur_mdp;
	private $utilisateur_email;
	private $utilisateur_fonction;
	private $utilisateur_application;
	private $utilisateur_avatar;
	private $utilisateur_is_admin;
	
	public function __construct($id, $utilisateur_nom = '', $utilisateur_prenom ='', $utilisateur_mdp='', $utilisateur_email='', $utilisateur_fonction='', $utilisateur_application='', $utilisateur_avatar='', $utilisateur_is_admin=''){
		$this->utilisateur_id = $id;
		if($utilisateur_nom == ''){
			$this->getInfosUtilisateur($utilisateur_id);
		}
		else{
			$this->utilisateur_nom = $utilisateur_nom;
			$this->utilisateur_prenom = $utilisateur_prenom;
			$this->utilisateur_mdp = $utilisateur_mdp;
			$this->utilisateur_email = $utilisateur_email;
			$this->utilisateur_fonction = $utilisateur_fonction;
			$this->utilisateur_application = $utilisateur_application;
			$this->utilisateur_avatar = $utilisateur_avatar;
			$this->utilisateur_is_admin = $utilisateur_is_admin;
		}
	}

	public function getUtilisateur($utilisateur_id){
		global $bdd;
		$utilisateur_query			= " SELECT * FROM utilisateur
										WHERE id = :id ";

		$pdo_select					= $bdd->prepare($utilisateur_query);
		$pdo_select->bindValue		(':id', 		$utilisateur_id,		PDO::PARAM_INT);
		$pdo_select->execute();
		$utilisateur				= $pdo_select->fetch();

		$this->utilisateur_nom = $utilisateur['nom'];
		$this->utilisateur_prenom = $utilisateur['prenom'];
		$this->utilisateur_mdp = $utilisateur['mdp'];
		$this->utilisateur_email = $utilisateur['email'];
		$this->utilisateur_fonction = $utilisateur['fonction'];
		$this->utilisateur_application = $utilisateur['application'];
		$this->utilisateur_avatar = $utilisateur['avatar'];
		$this->utilisateur_is_admin = $utilisateur['is_admin'];
	}
	public function addUser(){
		$requete = $this->bdd->prepare('INSERT INTO utilisateur (nom, prenom, email, fonction, avatar, mdp, application, is_admin) VALUES (:nom, :prenom, :email, :fonction, :avatar, :mdp, :app :admin)');
		$requete->execute(array(
			':nom' => $this->nom,
			':prenom' => $this->prenom,
			':email' => $this->email,
			':fonction' => $this->fonction,
			':avatar' => $this->avatar,
			':mdp' => $this->mdp,
			':app' => $this->utilisateur_application,
			':admin' => $this->utilisateur_is_admin
		));
	}

	public function updateUser(){
		$requete = $this->bdd->prepare('UPDATE  utilisateur SET nom = :nom, prenom =:prenom , email =:email, fonction = :fonction, avatar = :avatar, mdp =:mdp, application =:app, is_admin = :admin WHERE id = :is');
		$requete->execute(array(
			':nom' => $this->utilisateur_nom,
			':prenom' => $this->utilisateur_prenom,
			':email' => $this->utilisateur_email,
			':fonction' => $this->utilisateur_fonction,
			':avatar' => $this->utilisateur_avatar,
			':mdp' => $this->utilisateur_mdp,
			':app' => $this->utilisateur_application,
			':admin' => $this->utilisateur_is_admin,
			':id' => $this->id_utilisateur
		));
	}

	public function deleteUser(){
		$query = "DELETE * FROM role WHERE id_utilisateur = :id;";
		$pdo_query = $this->bdd->prepare($query);
		$pdo_query->bindValue(':id',		$this->utilisateur_id,		PDO::PARAM_INT); 
		$pdo_query->execute();

		$query = $this->bdd->prepare("DELETE * FROM utilisateur WHERE id = :id");
		$query->bindValue(':id', 			$this->utilisateur_id, 		PDO::PARAM_INT);
		$query->execute();
	}
}
function getPassword($email){
	global $bdd;
	$requete = $bdd->prepare('SELECT * FROM utilisateur 
											WHERE email = :email ');
	$requete->execute(array(':email' 	=> $email));

	return $requete->fetch();
}
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
			$_SESSION['mail'] = $requete['email'];
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

function getProjetsDunUtilisateur($id){
	global $bdd;
	$role_query					= "SELECT * FROM role Where id_utilisateur = :id;";
	$pdo_select					= $bdd->prepare($role_query);
	$pdo_select->bindValue		(':id',		$id,			PDO::PARAM_INT);
	$pdo_select->execute();
	$_SESSION['nbProjets']		= $pdo_select->rowCount();
	$_SESSION['projets']		= $pdo_select->fetchAll();
	
}
?>