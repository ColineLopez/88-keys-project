<!DOCTYPE html>

<html lang='fr'>
	<head>
		<meta charset="utf-8">

		<title>88 Keys - Inscription</title>
        <link rel="stylesheet" href="style/connexion_inscription_style.css">
        <link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet">
        
	</head>

	<body>

		<h1>Bienvenue sur l'espace 88 Keys !</h1>

		<div id="login-form">
				
<div id="form">			
 <form action="inscription_traitement.php" method="post">
                <h2 class="text-center">Inscription</h2>       
                <div class="form-group">
                	<label class=>Pseudo</label><br>
                    <input type="text" name="pseudo" class="form-control"  required autocomplete="off">
                </div>
                <div class="form-group">
                	<label>Email</label><br>
                    <input type="email" name="email" class="form-control"  required autocomplete="off">
                </div>
                <div class="form-group">
                	<label>Mot de passe</label><br>
                    <input type="password" name="password" class="form-control"  required autocomplete="off">
                </div>
                <div class="form-group">
                	<label>Confirmez votre mot de passe</label><br>
                    <input type="password" name="password_retype" class="form-control" required autocomplete="off">
                </div>
                <div class="form-group">
                	<?php
					if(isset($_GET['reg_err']))
					{
						$err = htmlspecialchars($_GET['reg_err']);

						switch($err) 
						{
							case 'success':
							?>
							<div class="alert alert-success">
								<strong>Succès</strong> inscription réussie ! <br>
								<a href='index.php'>Retour à la page d'Accueil</a>
							</div>
							<?php
							break;

							case 'password':
							?>
							<div class="alert alert-danger">
								<strong>Erreur</strong> mot de passe différent
							</div>
							<?php
							break;
							
							case 'email':
							?>
							<div class="alert alert-danger">
								<strong>Erreur</strong> email non valide
							</div>
							<?php
							break;

							case 'email_length':
							?>
							<div class="alert alert-danger">
								<strong>Erreur</strong> email trop long
							</div>
							<?php
							break;

							case 'pseudo_length':
							?>
							<div class="alert alert-danger">
								<strong>Erreur</strong> pseudo trop long
							</div>
							<?php
							break;

							case 'already':
							?>
							<div class="alert alert-danger">
								<strong>Erreur</strong> compte déjà existant
							</div>
							<?php
							break;
						}
					}
				?>
                    <button type="submit" class="btn btn-primary btn-block">Inscription</button>
                </div>   
            </form>
        </div>
    </div>

	</body>

</html>