<?php


class ProjectController{
	private $id;

	public function __construct($id){
		$this->id = $id;
	}

	public function getModel(){
		include_once('./models/project.php');
	}

	public function addProjet(){

	}
	public function editProject(){

	}
	public function deleteProject(){

	}
	public function getForDisplayProject(){
		$this->getModel();
		$_SESSION['infos_projet_a_afficher'] = InfosProjets($this->id);
		var_dump($_SESSION['infos_projet_a_afficher']);
	}
	public static function witchProject(){
		/* On récupére les projets de l'utilisateur */
		require_once('./models/utilisateurs.php');
		getProjetsDunUtilisateur($_SESSION['id']);

		/* si l'utilisateur n'a pas de projet en cours */
		if($_SESSION['nbProjets'] == 0){ $_SESSION['id_projet_a_afficher'] == null; }

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
			$_SESSION['id_projet_a_afficher'] = max($a);
		}
	}
}