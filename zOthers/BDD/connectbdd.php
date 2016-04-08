<?php
	function bdd() 
		{
			$titre = 'Index du forum';
			$host='localhost';
<<<<<<< Updated upstream
			$bd='gdp';
=======
			$bd='gpd';
>>>>>>> Stashed changes
			$user='root';
			$password = "root";
			
			try
				{
					$bdd= New PDO('mysql:host='.$host.'; dbname='.$bd, $user, $password);
					$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				}
			catch (PDOExeption $error) 
				{
					printf('Erreur: %s\n', $error->getMessage());
					
					$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					exit(0);
				}
			
			return $bdd;
		}

	$bdd = bdd();