<!DOCTYPE html>

<html lang='fr'>
	<head>
		<meta charset="utf-8">

        <title>88 Keys - Connexion</title>

        <link rel="stylesheet" href="style/connexion_inscription_style.css">
        <link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet">

	</head>

	<body>

		<h1>Bienvenue sur l'espace 88 Keys !</h1>


		<div id="login-form">
		


			<div id="form">
            <form action="connexion.php" method="post">
                <h2>Identification</h2>       
                	<label>Email</label><br>
                <div>
                    <input type="email" name="email" class="form-control" required autocomplete="off">
                </div>
                	<label>Mot de passe</label><br>
                <div>
                    <input type="password" name="password" class="form-control" required autocomplete="off">
                </div>
                <div>
                		<?php
				if(isset($_GET['login_err']))
				{
					$err = htmlspecialchars($_GET['login_err']);

					switch($err) 
					{
						case 'password':
						?>
						<div class="alert alert-danger">
							<strong>Erreur</strong> mot de passe incorrect
						</div>
						<?php
						break;
						
						case 'email':
						?>
						<div class="alert alert-danger">
							<strong>Erreur</strong> email incorrect
						</div>
						<?php
						break;

						case 'already':
						?>
						<div class="alert alert-danger">
							<strong>Erreur</strong> compte non existant
						</div>
						<?php
						break;
					}
				}
			?>


                    <button type="submit" class="btn btn-primary btn-block">Connexion</button>
                </div>   
            </form>
        </div>

        <p class="text-center"><a href="inscription.php">Je n'ai pas de compte, m'inscrire</a></p>
        </div>


	</body>

</html>