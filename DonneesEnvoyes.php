<?php	
//Infos globales disponibles sur TOUTES les pages...	
	//Infos de l'utilisateur connéctés:
		//	accés rapides (exhaustif):
				$_SESSION['id'] 
				$_SESSION['isAdmin'] 
				$_SESSION['mail'] 
		/*	En PHP:*/  echo ($_SESSION['is_admin']);
		//accés à toutes les infos: 
			$_SESSION['user'] =  [
				'utilisateur_id'				=> $utilisateurs['id'],
				'utilisateur_nom'				=> $utilisateurs['nom'],
				'utilisateur_prenom'			=> $utilisateurs['prenom'],
				'utilisateur_mdp' 				=> $utilisateurs['mdp'],
				'utilisateur_email' 			=> $utilisateurs['email'],
				'utilisateur_fonction' 			=> $utilisateurs['fonction'],
				'utilisateur_application' 		=> $utilisateurs['application'],
				'utilisateur_avatar' 			=> $utilisateurs['avatar'],
				'utilisateur_is_admin' 			=> $utilisateurs['is_admin']
			];
		/* En PHP */ echo ($_SESSION['user']['utilisateur_avatar']);

	// Infos du projet en cours à afficher
		
		$_SESSION['nbProjets'] == //nombre de projet sur lequel l'utilisateur à un role;
		$_SESSION['id_des_projets_utilisateur'] // est un tableau contenant tout les id des projets sur lequel l'utilisateur à un role;

		$_SESSION['id_projet_a_afficher'])// projet de l'utilisateur séléctionné actuellement;
		$_SESSION['infos_projet_a_afficher']// contient un array avec les valeurs: 'id' 'titre'  'dead_line'  'createur' ;
		// Si l'utilisateur n'à aucun projet, la valeur par défaut de cette array vaut: 
			[
			'id' => '0',
			'titre' => 'Aucun projet à afficher',
			'dead_line' => 'never',
			'createur' => 'Administrator'
			];
		/* En PHP */ echo ($_SESSION['infos_projet_a_afficher']['titre']);

	// Infos des taches liés au projet en cours:
		$_SESSION['Task']	// contient toutes les taches du projet à afficher;
							// C'est un tableau à plusieurs dimensions avec à la premiére dimension les indexs des taches principales;
							// ansi si il y a 3 taches liées au projet, la premiére dimension vaudra:
		$_SESSION['Task'] == ['0','1','2'];
							// à la deuxiéme dimensions il y à toutes les infos de la tache:
		$_SESSION['Task'][0] ==  'id','commentaire','intitule','id_projet','dead_line','sous_tache_id','is_sstache','done',8 => []; 
							// ATTENTION $_SESSION['Task'][0] ne correspond pas à l'ID de la tache c'est seulement la place qu'elle à dans le tableau $_SESSION['Task'];
		/* En PHP */ echo ($_SESSION['Task'][0]['id']); // peut valoir 38 par exemple;
		/* ou en php */
		foreach ($_SESSION['Task'] as $key => $value) {echo($value['intitule']);}	// affichera tout les intitules des taches (!!! Principales !!!) du projet en cours!
		//enfin à la 8éme position de chaque tache principale tu trouveras un tableau contenant à la premiére dimension les indexs des sous taches liés à la tache mere;
		$_SESSION['Task'][0][8][0] ==  'id','commentaire','intitule','id_projet','dead_line','sous_tache_id','is_sstache','done';
		// Ainsi  pour display Toutes les infos des taches tu devras faire au minimum deux foreach imbriqués!! (Demande moi si tu as besoin d'un coup de main);



 