<?php
	function bdd() 
		{
			$host='localhost';
			$bd ='gdp';
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