<?php


class connexion
{
	private $password;
	private	$email;
	private $bdd;
	
	public function __construct($email, $password)
		{
			$this->email 			= $email;
			$this->password 		= $password;
			$this->bdd 				= bdd();
		}
	public function verif()
		{
			require_once('./models/utilisateurs.php');
			
			$reponse = getPassword($this->email);

			if($reponse)
				{
					if ($this->password == $reponse['mdp'])
						{
							return 'ok';
						}
					else 
						{
							$erreur = 'le mot de passe est incorrect';
							return $erreur;
						}
				}
			else
				{
					$erreur ='La combinaison adresse e-mail, mot de passe est incorect.';
					return $erreur;
				}
		}
	public function  session()
		{
			require_once('./models/utilisateurs.php');
			sessionOn($this->email, $this->password);
			return 1;
			
		}
}