<?php 
Class Home{

	public function index(){
		if(!isset($_SESSION['id'])){
			header('location: index.php');
		}
		elseif(isset($_POST)){
			$this->isTherePost();
		}
		else{
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
			/* on récupére les taches du projet */
			include_once('./controller/task.php');
			$task = New taskController();
			$task->getTask($_SESSION['id_projet_a_afficher']);
			/* on appelle la vue */
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
	public function isTherePost(){
		switch($_POST['formulaire']){
			case 'addTaskAdmin':
				echo 'post 1';
				return 0;
			case 'addProjectAdmin':
				include_once('./controller/project.php');
				$project = new ProjectController(0);
				$projet->addProjet;
				$projet->getForDisplayProject();
				return 0;
			case 'updateProjectAdmin':
				echo 'post 3';
				return 0;
			case 'updateTaskAdmin':
				echo 'post 4'
				return 0;
			case 'addUserAdmin':
				echo 'post 5';
				return 0;
			case 'updateUserAdmin';
				echo 'post 6';
				return 0;
			case 'addRoleAdmin';
				echo 'post 7';
				return 0;
			case 'updateRoleAdmin';
				echo 'post 8';
				return 0;
			case 'updateDoneTaskUser';
				echo 'post  9';
				return 0;
		}	
	}
}