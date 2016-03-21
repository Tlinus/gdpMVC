<?php 
Class taskController{
	
	public function getModel(){
		require_once('./models/task.php');
	}

	public function getTask($idProjet){
		$this->getModel();
		$_SESSION['Task'] = infosTaches($idProjet);

		foreach ($_SESSION['Task'] as $key => $value) {
			if(count(infosSousTache($value['id'])) != 0){
				foreach (infosSousTache($value['id']) as $ky => $val) {
					array_push($_SESSION['Task'], $val);
				}
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