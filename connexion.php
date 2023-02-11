<?php
	session_start();
	require_once 'config.php';


	if(!empty($_POST['email']) && !empty($_POST['password']))
	{
		$email = htmlspecialchars($_POST['email']);
		$password = htmlspecialchars($_POST['password']);

		$email = strtolower($email);

		$check = $bdd->prepare('SELECT pseudo, email, password FROM utilisateur WHERE email = ?');
		$check->execute(array($email));
		$data = $check->fetch();
		$row = $check->rowCount();

		if($row > 0)
		{
			if(filter_var($email, FILTER_VALIDATE_EMAIL))
			{
				$password = hash('sha256', $password);
				if($data['password'] === $password)
				{
					$_SESSION['user'] = $data['pseudo'];
					header('Location:landing.php');
					die();
				}else { header('Location:page_connexion.php?login_err=password'); die(); }
			}else { header('Location:page_connexion.php?login_err=email'); die();}
		}else { header('Location:page_connexion.php?login_err=already'); die(); }
	}else { header('Location:index2.php'); die(); }

?>