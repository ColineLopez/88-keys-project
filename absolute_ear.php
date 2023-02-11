<!DOCTYPE html>
<html lang="fr">
<head>
 	<meta charset="utf-8"> 
 	<title> 88 Keys - Jeu : Travaille ton oreille </title>
 	<link rel="stylesheet" href="style/absolute_ear_style.css">
 	<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@500&display=swap" rel="stylesheet">
 </head>

 <body>

 	<?php include("header.php") ?>

 	<h1>Travaille ton oreille !</h1>

<p class="piano">

	<?php 

		include_once("class_piano.php");
		include_once('display_errors_off.php');

		$buttonPost = $_POST['button_post'];
		$enteredValue = htmlspecialchars(trim($_POST['note']));

		$hidden = $_POST['storeRandVal'];

		$generate_instrument = new Instrument;
		$notes = $generate_instrument->select_instrument();
		$random_note = $generate_instrument->pick_randnote();

		$name = $generate_instrument->name_file($random_note);

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

	<div class="page">

	 	<h2>Jeu</h2>

		<p>
			Écoute ce son et essaye d'identifier de quelle note il s'agit. Sélectionne ensuite la réponse dans la liste et vérifie si tu as gagné !
		</p>
		
		<p>
			<audio id="random_note" style="display: none;">
			<source src= <?php echo $random_note ; ?> />
			</audio>
			<input type="button" class="sound_random" onclick="document.getElementById('random_note').play();" />	
		</p>

		<form action="" method="POST">
			<input type="hidden" name="storeRandVal" value="<?php echo $name; ?>">
			<select name="note"> 
				<option value="A M Y">Do</option>
				<option value="B N">Do# / Réb</option>
				<option value="C O">Ré</option>
				<option value="D P">Ré# / Mib</option>
				<option value="E Q">Mi</option>
				<option value="F R">Fa</option>
				<option value="G S">Fa# / Solb</option>
				<option value="H T">Sol</option>
				<option value="I U">Sol# / Lab</option>
				<option value="J V">La</option>
				<option value= "K W">La# / Sib</option>
				<option value="L X">Si</option>
			</select>
			<input type="submit" class="button" name="button_post" value="Valider ma réponse !">
		</form>

		<?php
			
			if(isset($buttonPost)){
				if(strpos($enteredValue, $hidden) !== FALSE){
					?>
					<strong>Bravo !</strong> C'est la bonne réponse !
					<?php
				}else{
					?>
					<span class="red"> <strong>Faux !</strong> Dommage, ce n'était pas la bonne réponse ! </span>
					<?php
				}
			}
		?>

	</div>

 	<?php include("footer.php") ?>

 </body>
 </html>