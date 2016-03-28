<?php


class ProjectController{
	private $id;
	private $title;
	private $deadline;
	private $allProjects;

	public function __construct($id){
		$this->id = $id;
	}

	public function getModel(){
		include_once('./models/project_model.php');
	}

	public function addProjet(){
		getModel();
		$project = new projet($_POST['titre'], $_POST['deadline']);
		$_SESSION['id_projet_a_afficher'] = $project->newProject();
		$this->id = $_SESSION['id_projet_a_afficher'];
		return 1;
	}
	public function editProject(){
		getModel();
		$project = new projet($_POST['titre'], $_POST['deadline']);
		$_SESSION['id_projet_a_afficher'] = $project->updateProject($id);
		return 1;
	}
	public function deleteProject($id){
		getModel();
		ProjectModel::deleteProject($id);
		return 1;
	}
	public function getForDisplayProject(){
		$this->getModel();
		$_SESSION['infos_projet_a_afficher'] = InfosProjets($this->id);
	}
	public static function witchProject(){
		/* On récupére les projets de l'utilisateur */
		require_once('./models/utilisateurs_model.php');
		getProjetsDunUtilisateur($_SESSION['id']);

		/* si l'utilisateur n'a pas de projet en cours */
		if($_SESSION['nbProjets'] == 0){ $_SESSION['id_projet_a_afficher'] =0; }

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
			$this->allProjects = $a;
			$_SESSION['id_projet_a_afficher'] = max($a);
		}
	}
}