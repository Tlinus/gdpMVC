<?php 
Class taskController{
	
	public function getModel(){
		require_once('./models/task.php');
	}
	public function getTask($idProjet){
		$this->getModel();
		$_SESSION['Task'] = infosTaches($idProjet);

		foreach ($_SESSION['Task'] as $key => $value) {
			
			var_dump(infosSousTache($value['id']));
			var_dump($value);
			var_dump($key);
			array_push($value, infosSousTache($value['id']));
			 
			 
		}

		var_dump($_SESSION['Task']);
	}

	public function deleteTask($id_tache){

	} 
	public function editTask(){

	}
	public function addMiniTask(){

	}
	public function deeteMiniTask(){

	}
}