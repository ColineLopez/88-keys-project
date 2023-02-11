<!DOCTYPE html>
<html lang="fr">

<head>
 	<meta charset="utf-8"> 
 	<title>88 Keys - Contact</title>
 	<link rel="stylesheet" href="style/contact_style.css">
    <link href="https://fonts.googleapis.com/css2?family=M+PLUS+1p&family=Signika:wght@300&display=swap" rel="stylesheet">
 </head>

 <body>

 	<?php include("header.php") ?>

    <div class="page">
        
 	<h1>Contactez le support</h1>

    <form action="submit_contact.php" method="POST">
        <div>
            <img class="bulle" src="images/bulle.png" alt='bulle'>
        </div>
    	<div>
    		<input class="nom_prenom" type="text" name="nom" placeholder="Nom" required autocomplete="off">
            <input class="nom_prenom" type="text" name="prenom" placeholder="Prénom" required autocomplete="off">
    	</div>
        <div>
            <input type="email" name="email" placeholder="Email" required>
        </div>
        <div>
            <input type="text" name="objet" placeholder="Entrez votre objet" required autocomplete="off"> 
        <div>
            <textarea placeholder="Ecrivez votre message ici" name="message" required autocomplete="off"></textarea>
        </div>
        <div>
            <?php
                    if(isset($_GET['reg_err']))
                    {
                        $err = htmlspecialchars($_GET['reg_err']);

                        switch($err) 
                        {
                            case 'success':
                            ?>
                            <div>
                                <strong>Merci</strong>, votre message a bien été envoyé ! <br>
                            </div>
                            <?php
                            break;

                            case 'objet_length':
                            ?>
                            <div class="erreur">
                                <strong>Erreur</strong> : objet trop long
                            </div>
                            <?php
                            break;
                            
                            case 'email':
                            ?>
                            <div class="erreur">
                                <strong>Erreur</strong> email non valide
                            </div>
                            <?php
                            break;

                            case 'email_length':
                            ?>
                            <div class="erreur">
                                <strong>Erreur</strong> email trop long
                            </div>
                            <?php
                            break;

                            case 'prenom_length':
                            ?>
                            <div class="erreur">
                                <strong>Erreur</strong> prénom trop long
                            </div>
                            <?php
                            break;

                            case 'nom_length':
                            ?>
                            <div class="erreur">
                                <strong>Erreur</strong> nom trop long
                            </div>
                            <?php
                            break;

                        }
                    }
                ?>
        <button type="submit">Envoyer</button>
    </div>
    </form>

    </div>


<?php include("footer.php") ?>
 
 </body>
</html>
