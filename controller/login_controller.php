<?php 

Class LoginController{

	public function LoginController(){
		if(isset($_SESSION['id'])){
			$this->connected();
		}
		else{
			$this->unconnected();
		}
	}

	public function unconnected(){
		
		if (isset($_POST['email']) AND isset($_POST['password']))	{  
			require_once('./controller/connexion_controller.php');
			//on envoie les données à la class connexion
       		$connexion = new connexionController($_POST['email'], $_POST['password']);

        	$verif = $connexion->verif();

        	if ($verif == 'ok'){  // on verifie que les données ont bien été assimiler par la bdd
            	$connexion->session();
            	header('location: index.php');

            }
            else{
            	$error=$verif;
            	include_once('./Views/login.php');
            }
        }
        else{
        	include_once('./Views/login.php');
        }            
	}

	public function connected(){
		include_once('./controller/home_controller.php');
		$page= new HomeController(); $page->index();
	}
}