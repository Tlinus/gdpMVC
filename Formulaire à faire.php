Dans chaque formulaire (à part celui de connexion de l'utilisateur),
j'ai besoin que tu fasses un input hidden avec comme name 'formulaire';

et comme value selon les cas:
	Ajout de tache à un projet:
		case 'addTaskAdmin':
	Ajout de Projet: 
		case 'addProjectAdmin':
	Changement des informations du projet:
		case 'updateProjectAdmin':
	Changemeent des infos d'une tache:
		case 'updateTaskAdmin':
	Ajout d'un compte utilisateur: 
		case 'addUserAdmin':
	Modification d'un compte utilisateur
		case 'updateUserAdmin';
	Ajout d'un utilisateur sur un projet
		case 'addRoleAdmin';
	Modification de la fonction d'un utilisateur sur un projet:
		case 'updateRoleAdmin';
	Validation d'une tache efféctué:
		case 'updateDoneTaskUser';
	
