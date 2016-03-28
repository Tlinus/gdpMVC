<?php 
Class TaskController{
	
		private $id;
		private $projet;
		private $parent_tache_id;
		private $is_sstache;
		public $intitule;
		public $deadline;
		public $pdo;
		public $commentaire;
		public $done;
		private $instance;

	public function __construct($intitule, $commentaire, $deadline, $projet= 0, $id=0){
		global $bdd;
		$this->intitule 		= htmlspecialchars($intitule);
		$this->commentaire		= htmlspecialchars($commentaire);
		$this->deadline			= $deadline;
		$this->projet			= $projet;
		$this->pdo 				= $bdd;
		$this->parent_tache_id	= 0;
		$this->is_sstache		= 0;
		$this->done 			= 0;
	}
	public static function getModel(){
		require_once('./models/task_model.php');
	}
	public static function getTask($idProjet){
		TaskController::getModel();
		$_SESSION['Task'] = infosTaches($idProjet);
		foreach ($_SESSION['Task'] as $key => $value) {
			if(count(infosSousTache($value['id'])) != 0){
				$_SESSION['Task'][$key][] = infosSousTache($value['id']);
			}
		}	
	}
	/*public function callModel();
	{
		$this->getModel();
		$this->instance = new taskModel($_POST['title'], $_POST['comments'], $_POST['deadline'], $_SESSION['id_projet_a_afficher']);
	}*/

	public function addTask(){
		getModel();
		$newTask = New TaskModel($this->intitule, $this->commentaire, $this->deadline, $this->projet);
		if(isset($_POST['isSousTache'])){
			isSousTache($idParentTask);
			$newTask->isSousTache($_POST['parentTask']);
		}
		$this->id = $newTask->newTache;
	}

	public static function deleteTask($id_tache){
		getModel();
		TaskModel::deleteTask($id_tache);
	} 
	public function isSousTache($idParentTache){
			$this->parent_tache_id	= $idParentTache;
			$this->is_sstache		= 1;
		}
	public function editTask(){

	}
	public function addMiniTask(){

	}
	public function deleteMiniTask(){
		
	}
}