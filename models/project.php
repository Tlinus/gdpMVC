<?php 
	
	Class projet{

		public $titre;
		public $cdc;
		public $deadline;
		public $pdo;

		public function __construct  ($pdo, $titre, $deadline){
			$this->titre 	= htmlspecialchars($titre);
			//$this->cdc 		= $cdc;
			$this->deadline	= $deadline;
			$this->pdo 		= $pdo;
		}


		public function addProject(){

			$query =	"INSERT INTO projet
						(titre, dead_line, createur)
						VALUES 
						(:titre, :dead, :crea);";
			$pdo_query = $this->pdo->prepare($query);
			$pdo_query->bindValue(':titre',		$this->titre,					PDO::PARAM_STR);  
			$pdo_query->bindValue(':dead',		$this->deadline, 				PDO::PARAM_INT);
			$pdo_query->bindValue(':crea', 		$_SESSION['utilisateurId'], 	PDO::PARAM_INT);
			$pdo_query->execute();


			$lastId = $this->pdo->lastInsertId();

			$query =	"INSERT INTO role
						(id_utilisateur, id_projet, fonction_attribue)
						VALUES
						(:user, :projet, :fct);";

			$pdo_query = $this->pdo->prepare($query);
			$pdo_query->bindValue(':user',		$_SESSION['utilisateurId'],		PDO::PARAM_INT);  
			$pdo_query->bindValue(':projet',	$lastId, 						PDO::PARAM_INT);
			$pdo_query->bindValue(':fct', 		"Chef de projet", 				PDO::PARAM_STR);
			$pdo_query->execute();

			return $lastId;
		}


	}

function InfosProjets($projets)
{
	global $bdd;
	if(is_null($projets)){
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
	

