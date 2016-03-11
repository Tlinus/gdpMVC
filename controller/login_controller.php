<?php 

Class Index{

	public function index(){
		if(isset($_SESSION['id'])){
			$this->connected();
		}
		else{
			$this->unconnected();
		}
	}

	public function unconnected(){
		
		if (isset($_POST['email']) AND isset($_POST['password']))	{  
			require_once('./controller/Connexion_clas.php');
			//on envoie les données à la class connexion
       		$connexion = new connexion($_POST['email'], $_POST['password']);

        	$verif = $connexion->verif();

        	if ($verif == 'ok'){  // on verifie que les données ont bien été assimiler par la bdd
            	$connexion->session();
            	header("refresh:0", $_SERVER['PHP_SELF']);
            }
            else{
            	$error=$verif;
            	include_once('./views/login.php');
            }
        }
        else{
        	include_once('./views/login.php');
        }            
	}

	public function connected(){
		header('location: Interface');
	}
}