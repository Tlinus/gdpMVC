<?php 
Class Home{

	public function index(){
		if(!isset($_SESSION['id'])){
			header('location: index.php');
		}
		if($_SESSION['isAdmin'] ==1){
			$this->admin();
		}
		else{ $this->user();}
	}

	public function admin(){
		include_once('./views/chef.php');
	}

	public function user(){
		/* On récupére les projets de l'utilisateur */
		require_once('./models/utilisateurs.php');
		getProjetsDunUtilisateur($_SESSION['id']);

		/* si l'utilisateur n'a pas de projet en cours */
		if($_SESSION['nbProjets'] == 0){ include_once('./views/user_sans_projet.php'); }

		/* si l'utilisateur n'a qu'un seul projet */
		elseif(count($_SESSION['projets']) ==1){
			$_SESSION['id_projet_a_afficher'] = $_SESSION['projets'][0][1];
		}

		/* sinon l'utilisateur à plusieurs projets en cours, on prends alors le dernier creer par défaut */
		else{
			$a =[];
			foreach ($_SESSION['projets'] as $key) {
				array_push($a, $key['id_projet']);
			}
			require_once('./models/projet.php');
			$_SESSION['id_projet_a_afficher'] = max($a);
			$_SESSION['infos_projet_a_afficher'] = InfosProjets($_SESSION['id_projet_a_afficher']);
			include('./views/user.php');

		}

	}
}