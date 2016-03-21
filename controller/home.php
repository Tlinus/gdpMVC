<?php 
Class Home{

	public function index(){
		if(!isset($_SESSION['id'])){
			header('location: index.php');
		}
		else{
			if(isset($_POST)){
				$this->postControl();
			}
			$this->definitionProjetAAfficher();
		}
	}

	public function loadView(){
		if($_SESSION['isAdmin'] == 1){ include_once('./views/chef.php');}
		elseif ($_SESSION['isAdmin'] == 2) { include_once('./views/admin.php');}
		else{ include_once('./views/user.php'); }
	}
	
	public function definitionProjetAAfficher(){
		if(isset($_SESSION['infos_projet_a_afficher'])){
			$this->loadView();
		}
		else{
			/* on determine quelle projet doit être afficher */ 
			include_once('./controller/project.php');
			ProjectController::witchProject();

			/* on récupéres les infos du projet */
			$project = new ProjectController($_SESSION['id_projet_a_afficher']);
			$project->getForDisplayProject();

			/* on récupére les taches du projet */
			include_once('./controller/task.php');
			$task = New taskController();
			$task->getTask($_SESSION['id_projet_a_afficher']);
			/* on appelle la vue */
			$this->loadView();
		}
	}
	public function postControl(){
		if(isset($_POST['project'])){
			if(isset($_POST['create'])){}
		}
		elseif (isset($_POST['task'])) {
			# code...
		}
		elseif (isset($_POST['user'])) {
			# code...
		}
	}
}