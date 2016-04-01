<?php 
	
	Class ProjectModel{

		public $titre;
		public $cdc;
		public $deadline;
		public $pdo;
		

		public function __construct  ($titre, $deadline){
			$this->titre 	= htmlspecialchars($titre);
			//$this->cdc 		= $cdc;
			$this->deadline	= $deadline;
			global $bdd;
			$this->pdo 		= $bdd;
		}

		public function updateProjet($id){
			$query ="UPDATE projet SET 
			titre = :titre
			dead_line = :deadline
			WHERE id = :id ;";
			$delete_query = $bdd->prepare($query);
			$delete_query->bindValue(':titre',				$this->titre,			PDO::PARAM_STR);
			$delete_query->bindValue(':deadline', 			$this->deadline, 		PDO::PARAM_STR);
			$delete_query->bindValue(':id',					$id,					PDO::PARAM_INT);
			$delete_query->execute();

			return 1;
		}
		public function addProject(){

			$query =	"INSERT INTO projet
						(titre, dead_line, createur)
						VALUES 
						(:titre, :dead, :crea);";
			$pdo_query = $this->pdo->prepare($query);
			$pdo_query->bindValue(':titre',		$this->titre,							PDO::PARAM_STR);  
			$pdo_query->bindValue(':dead',		$this->deadline, 						PDO::PARAM_INT);
			$pdo_query->bindValue(':crea', 		$_SESSION['user']['utilisateur_id'], 	PDO::PARAM_INT);
			$pdo_query->execute();


			$lastId = $this->pdo->lastInsertId();

			$query =	"INSERT INTO role
						(id_utilisateur, id_projet, fonction_attribue)
						VALUES
						(:user, :projet, :fct);";

			$pdo_query = $this->pdo->prepare($query);
			$pdo_query->bindValue(':user',		$_SESSION['user']['utilisateur_id'],		PDO::PARAM_INT);  
			$pdo_query->bindValue(':projet',	$lastId, 									PDO::PARAM_INT);
			$pdo_query->bindValue(':fct', 		"Chef de projet", 							PDO::PARAM_STR);
			$pdo_query->execute();

			return $lastId;
		}

		public function deleteProjet($id){
			$query = "DELETE * FROM role WHERE id_projet = :id;";
			$pdo_query = $this->pdo->prepare($query);
			$pdo_query->bindValue(':id',		$id,							PDO::PARAM_INT); 
			$pdo_query->execute();

			$query = "SELECT * FROM tache where id_projet = :id  AND is_sstache = 0;" ;
			$pdo_query = $this->pdo->prepare($query);
			$pdo_query->bindValue(':id',		$id,							PDO::PARAM_INT); 
			$pdo_query->execute();
			$taches = $pdo_query->fetchall();

			require_once('models/taskModel.php');
			foreach ($taches as $key => $value) {
				TaskModel::deleteTask($value['id']);
			}

			$query = "DELETE * FROM projet WHERE id_projet = :id;";
			$pdo_query = $this->pdo->prepare($query);
			$pdo_query->bindValue(':id',		$id,							PDO::PARAM_INT); 
			$pdo_query->execute();
		}
		public static function deleteRole($idUser, $idProjet){ 
			$query ="DELETE FROM role 
			WHERE id_utilisateur = :idUser AND id_projet = :idProjet ;";

			$delete_query = $bdd->prepare($query);
			$delete_query->bindValue(':idUser',		$idUser,		PDO::PARAM_INT);
			$delete_query->bindValue(':idProjet',	$idProjet,		PDO::PARAM_INT);
			$delete_query->execute();
		}
		public function addRole($idProjet, $idUser, $fct){
			$query= " INSERT INTO role
			(id_utilisateur, id_projet, fonction_attribue)
			VALUES
			(:id, :projet, :fct);";
			$delete_query = $bdd->prepare($query);
			$delete_query->bindValue(':idUser',		$idUser,		PDO::PARAM_INT);
			$delete_query->bindValue(':idProjet',	$idProjet,		PDO::PARAM_INT);
			$delete_query->bindValue(':fct',	$fct,				PDO::PARAM_STR);
			$delete_query->execute();
		}

	}

function InfosProjets($projets)
{
	global $bdd;
	if($projets == 0){
		return $a = [
		'id' => '0',
		'titre' => 'Aucun projet à afficher',
		'dead_line' => 'never',
		'createur' => 'Administrator'
		];
	}
	elseif(is_array($projets)){
		$infos = array();
		foreach ($projets as $key) {
			$projet_query 			= "SELECT * FROM projet
										WHERE id = :id;";
			$pdo_select				= $bdd->prepare($projet_query);
			$pdo_select->bindValue(	':id',		$projets,		PDO::PARAM_INT);
			$pdo_select->execute();
			$projet				= $pdo_select->fetchAll();
			array_push($infos, $projets);
		}

		return $infos;
	}
	else{
		$projet_query 			= "SELECT * FROM projet
										WHERE id = :id;";
			$pdo_select				= $bdd->prepare($projet_query);
			$pdo_select->bindValue(	':id',		$projets,		PDO::PARAM_INT);
			$pdo_select->execute();
			$projet				= $pdo_select->fetch();
			return $projet;
	}
}
	

