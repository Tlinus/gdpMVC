<?php 
Class HomeController{


	public function index(){
		if(!isset($_SESSION['id'])){
			header('location: logout.php');
		}
		elseif(isset($_POST['formulaire'])){
			$this->isTherePost();
		}
		else{
			$this->definitionProjetAAfficher();
		}
	}

	public function loadView(){
		global $twig;
		//if($_SESSION['isAdmin'] == 1){ $template = $twig->display('chef/chef.twig');}
		//elseif ($_SESSION['isAdmin'] == 2) { $template = $twig->display('user/user.twig'); include_once('admin/admin.twig');}
		//else{ $template = $twig->display('user/user.twig'); }
	}
	
	public function definitionProjetAAfficher(){
		if(isset($_SESSION['infos_projet_a_afficher'])){
			/* on récupére les taches du projet */
			include_once('./controller/task_controller.php');
			// $task = New taskController;
			taskController::getTask($_SESSION['id_projet_a_afficher']);
			/* on appelle la vue */
			$this->loadView();
		}
		else{
			/* on determine quelle projet doit être afficher */ 
			include_once('./controller/project_controller.php');
			ProjectController::witchProject();

			/* on récupéres les infos du projet */
			$project = new ProjectController($_SESSION['id_projet_a_afficher']);
			$project->getForDisplayProject();

			/* on récupére les taches du projet */
			include_once('./controller/task_controller.php');
			TaskController::getTask($_SESSION['id_projet_a_afficher']);
			/* on appelle la vue */
			$this->loadView();
		}
	}
	public function isTherePost(){
		switch($_POST['formulaire']){
			case 'addTaskAdmin':
				include_once('./controller/task_controller.php');
				$task= new taskController($_POST['title'], $_POST['comments'], $_POST['deadline'], $_SESSION['id_projet_a_afficher']);
				if(isset($_POST['idParentTask'])){ $task->isSousTache($_POST['idParentTask']);}
				$task->addTask();
				return 0;
			case 'addProjectAdmin':
				include_once('./controller/project_controller.php');
				$project = new ProjectController($_POST['title'], $_POST['deadline']);
				$projet->addProjet;
				$projet->getForDisplayProject();
				return 0;
			case 'updateProjectAdmin':
				include_once('./controller/project_controller.php');
				$project = new ProjectController($_POST['title'], $_POST['deadline']);
				$projet->updateProject($_POST['idProject']);
				$projet->getForDisplayProject();
				return 0;
			case 'updateTaskAdmin':
				echo 'post 4';
				return 0;
			case 'addUserAdmin':
				include_once('./models/inscription_model.php');
				$user = New InscriptionModel($_POST['fonction'], $_POST['email'], $_POST['pwd'], $_POST['pwd2'], $_POST['name'], $_POST['lastName'], $_POST['avatar']);
				$ok = $user->verif;
				if($ok == 'ok'){
					$user->enregistrement();
				}
				else{
					include_once('./Views/chef.php');
				}
				return 0;
			case 'updateUserAdmin';
				include_once('./models/inscription_model.php');
				$user = New InscriptionModel($_POST['fonction'], $_POST['email'], $_POST['pwd'], $_POST['pwd2'], $_POST['name'], $_POST['lastName'], $_POST['avatar']);
				$ok = $user->verif;
				if($ok == 'ok'){
					$user->updateUser($_POST['id']);
				}
				else{
					include_once('./Views/chef.php');
				}
				return 0;
			case 'addRoleAdmin';
				echo 'post 7';
				return 0;
			case 'updateRoleAdmin';
				echo 'post 8';
				return 0;
			case 'updateDoneTaskUser';
				include_once('./models/task_model.php');
				taskDone($_POST['$task_id']);
				return 1;
		}	
	}
}