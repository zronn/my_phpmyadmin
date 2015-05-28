<?php
	if (!isset($_SESSION['user']))
	{
		if (!empty($_POST['user']))
		{
			$serveur = $_SERVER["SERVER_NAME"]; 
			$base = "mysql";
					
			@$mysqli = new mysqli($serveur, $_POST['user'], $_POST['password'], $base); 
			if ($mysqli->connect_error) {
				header('Location: ../index.php?erreur=' . $mysqli->connect_error);
				exit;
			}
			else
			{
				// Démarrage ou restauration de la session
				session_start();
				$_SESSION['user'] = $_POST['user'];
				$_SESSION['password'] = $_POST['password'];
				$_SESSION['server'] = $serveur;
				header('Location: ../pages/index.php');
			}
		}
		else
		{
			/*header('Location: ../pages/index.php');*/
			echo "Une erreur est survenue.";
		}
	}
?>