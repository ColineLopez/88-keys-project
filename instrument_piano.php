<!DOCTYPE html>
<html lang="fr">
<head>
 	<meta charset="utf-8"> 
 	<title> 88 Keys - Piano </title>
 	<link rel="stylesheet" href="style/absolute_ear_style.css">
 	<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@500&display=swap" rel="stylesheet">
 </head>

 <body>

 	<?php include("header.php") ?>


 	<h1>Joue du piano !</h1>

<p class="piano">

	<?php 

		include_once("class_piano.php");

		$generate_instrument = new Instrument;
		$notes = $generate_instrument->select_instrument('piano');
	 
	    $classKeyTable = ['white m', 'black', 'white m', 'black', 'white', 'white m', 'black', 'white m', 'black', 'white m', 'black', 'white',
	                      'white', 'black', 'white', 'black', 'white', 'white', 'black', 'white', 'black', 'white', 'black', 'white',
	                      'white'];

	 
	    $compteur = 0;
	    foreach ($notes as $note){
	            
	?>
        <audio id=<?php echo $compteur ; ?> style="display: none;">
        <source src=<?php echo $note ; ?> />
        </audio>
        <input type="button" class=<?php echo $classKeyTable[$compteur]; ?> onclick="document.getElementById(<?php echo $compteur ;?>).play();" />

	<?php
    	$compteur++; 
    	} 
	?>


 	<?php include("footer.php") ?>

 </body>
 </html>