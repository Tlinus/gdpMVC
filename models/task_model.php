<?php
	Class TaskModel{

		private $id;
		private $projet;
		private $parent_tache_id;
		private $is_sstache;
		public $intitule;
		public $deadline;
		public $pdo;
		public $commentaire;
		public $done;
 

		public function __construct  ( $intitule, $commentaire, $deadline, $projet, $id=0){
			$this->intitule 		= htmlspecialchars($intitule);
			$this->commentaire		= htmlspecialchars($commentaire);
			$this->deadline			= $deadline;
			$this->projet			= $projet;
			$this->pdo 				= $pdo;
			$this->parent_tache_id	= 0;
			$this->is_sstache		= 0;
		}


		public function newTache(){
			$query =	"INSERT INTO tache
						(commentaire, intitule, id_projet, dead_line, sous_tache_id, is_sstache)
						VALUES 
						(:commentaire, :intitule, :id_projet, :dead, :sous_tache_id, :is_sstache);";
			
			$pdo_query = $this->pdo->prepare($query);
			$pdo_query->bindValue(':commentaire',		$this->commentaire,		PDO::PARAM_STR);  
			$pdo_query->bindValue(':intitule',			$this->intitule,		PDO::PARAM_STR);
			$pdo_query->bindValue(':id_projet',			$this->projet,			PDO::PARAM_INT);  
			$pdo_query->bindValue(':dead',				$this->deadline, 		PDO::PARAM_INT);
			$pdo_query->bindValue(':sous_tache_id',		$this->parent_tache_id,	PDO::PARAM_INT);  
			$pdo_query->bindValue(':is_sstache',		$this->is_sstache,		PDO::PARAM_INT);  
			$pdo_query->execute();

			$this->id = $this->pdo->lastInsertId();

			return $this->id;
		}
		public function updateTask(){
			$query =	"UPDATE tache SET
			commentaire = :commentaire, intitule = :intitule, id_projet = :id_projet, dead_line = :dead, sous_tache_id = :sous_tache_id, is_sstache = :is_sstache 
						WHERE id = :id ;";
			
			$pdo_query = $this->pdo->prepare($query);
			$pdo_query->bindValue(':commentaire',		$this->commentaire,		PDO::PARAM_STR);  
			$pdo_query->bindValue(':intitule',			$this->intitule,		PDO::PARAM_STR);
			$pdo_query->bindValue(':id_projet',			$this->projet,			PDO::PARAM_INT);  
			$pdo_query->bindValue(':dead',				$this->deadline, 		PDO::PARAM_INT);
			$pdo_query->bindValue(':sous_tache_id',		$this->parent_tache_id,	PDO::PARAM_INT);  
			$pdo_query->bindValue(':is_sstache',		$this->is_sstache,		PDO::PARAM_INT);  
			$pdo_query->bindValue(':id',				$this->id,				PDO::PARAM_INT);
			$pdo_query->execute();
			return $this->id;
		}

		public function deleteTask($id){
			$query = 'DELETE * FROM tache WHERE id = :id';
			$thisQuery = $this->pdo->prepare($query);
			$thisQuery->bindValue(':id',			$id, 		PDO::PARAM_INT);
			$thisQuery->execute();
			return 1;
		}

		public static function deleteTasks($array){
			foreach ($array as $key => $value) {
				$this->deleteTask($value['id']);
			}
		}
		public function isSousTache($idParentTache){
			$this->parent_tache_id	= $idParentTache;
			$this->is_sstache		= 1;
		}

	}
function infosTaches($projetId){
	global $bdd;
	$tache_query				= "SELECT * FROM tache 
								   WHERE id_projet = :projet 
								   AND is_sstache = 0;";
	$pdo_select					= $bdd->prepare($tache_query);
	$pdo_select->bindValue		(':projet', 		$projetId, 	 PDO::PARAM_INT);
	$pdo_select->execute();
	return $taches_principal			= $pdo_select->fetchAll();
}

function infosSousTache($idTacheMere){
	global $bdd;
	$sous_tache_query				= " SELECT * FROM tache 
  									WHERE sous_tache_id = :idtache ;";
  	$pdo_select					= $bdd->prepare($sous_tache_query); 
  	$pdo_select->bindValue		(':idtache', 		$idTacheMere, PDO::PARAM_INT);
  	$pdo_select->execute();
  	return $sous_taches				= $pdo_select->fetchAll();

}
function TaskDone($id)
{
	global $bdd;
	$query 				=' UPDATE task SET done = 1 WHERE id = :id;';
	$pdo_update			= $bdd->prepare($query);
	$pdo_update->bindValue		(':id', 			$id,		PDO::PARAM_INT);
	$pdo_update->execute();
	return 1;
}