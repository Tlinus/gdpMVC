<?php 
Class taskController{
	
	public function getModel(){
		require_once('./models/task.php');
	}
	public function getTask($idProjet){
		$this->getModel();
		$_SESSION['Task'] = infosTaches($idProjet);
		if(count(infosSousTache($value['id'])) != 0){
			foreach ($_SESSION['Task'] as $key => $value) {
					$_SESSION['Task'][$key][] = infosSousTache($value['id']);
			}
		}
		
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