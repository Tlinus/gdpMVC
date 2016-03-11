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
			$requete = $this->bdd->prepare('SELECT * FROM utilisateur 
											WHERE email = :email ');
			$requete->execute(array(
											':email' 	=> $this->email
								));
			$reponse = $requete->fetch();

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
			$requete = $this->bdd->prepare('SELECT * FROM utilisateur WHERE email = :email AND mdp= :mdp');
			$requete->execute(array(':email' => $this->email, ':mdp' => $this->password));
			$requete = $requete->fetch();
			$_SESSION['id'] = $requete['id'];
			$_SESSION['isAdmin'] = $requete['is_admin'];
			$_SESSION['mail'] =$requete['email'];
			return 1;
		}
}