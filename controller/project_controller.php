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
		$this->getModel();
		$project = new ProjectModel(0, $_POST['title'], $_POST['deadline']);
		$_SESSION['id_projet_a_afficher'] = $project->addProject();
		$this->id = $_SESSION['id_projet_a_afficher'];
		return 1;
	}
	public function editProject(){
		$this->getModel();
		$project = new ProjectModel(0, $_POST['title'], $_POST['deadline']);
		$_SESSION['id_projet_a_afficher'] = $project->updateProject($id);
		return 1;
	}
	public function deleteProject($id){
		$this->getModel();
		$project = new ProjectModel($_SESSION['id_projet_a_afficher']);
		$project->deleteProject($id);
		return 1;
	}

	public function infosForChef(){
		include_once('./models/utilisateurs_model.php');
		getUtilisateursAssigneSurProjet($_SESSION['id_projet_a_afficher']);
		getUtilisateursNonAssigneSurLeProjet($_SESSION['id_projet_a_afficher']);
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
			$a =[]; $i=0;
			foreach ($_SESSION['projets'] as $key) {
				array_push($a, $key['id_projet']);

				$_SESSION['nameProjets'][$i] = idAndName($key['id_projet']);
				$i++;
			}
			$_SESSION['id_des_projets_utilisateur'] = $a;
			$_SESSION['id_projet_a_afficher'] = max($a);
		}
	}
}