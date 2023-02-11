<!DOCTYPE html>
<html lang="fr">
 <head>
 	<meta charset="utf-8"> 
 	<title> 88 Keys - Blind Test </title>
 	<link rel="stylesheet" href="style/blind_test_style.css">
 	<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@500&display=swap" rel="stylesheet">
 </head>

 <body>

 	<?php 
 		include_once('header.php');
		include_once('fonction_blind_test.php');
		include_once('display_errors_off.php');

		$niveau = 1;

		$buttonPost = $_POST['button_post']; 
		$enteredValue = htmlspecialchars(trim($_POST['test_input_p']));

		$hidden = $_POST['storeRandVal'];
		$son = new BlindTest;
		$rand = $son->pick_randfile();
		$randomValue = $son->name_files()[$rand[0]];

		$enteredValue = $son->low_2_stripAccents($enteredValue);

	?>

	<div class="page">

	<div class="essais_restants">
    	<img class="croche" src="images/croche_barree.png" alt="Croche barrée">
    	<img class="croche" src="images/croche.png" alt="Croche">
    	<img class="croche" src="images/croche.png" alt="Croche">
  	</div>

	<h1>Niveau <?php echo $niveau;?> </h1> 

	<div>
	<img class="micro" src="images/microphone.png" alt="Microphone">
</div>
	
	<div>
	<audio id='son' style="display: none;">
    	<source src=  <?php echo  '"' . $rand[1] . '"' ; ?>/>
  	</audio>
  	<img class="play" src="images/bouton_play.gif" onclick="document.getElementById('son').play();"> 
  	<figcaption>Nombres d'écoutes restantes : 3</figcaption>
  </div>

	<form action="" method="post">
<input type="hidden" name="storeRandVal" value="<?php echo $randomValue; ?>">
        <fieldset>
            <!-- <label for="test_input" id="label_input">Enter value: <?php //echo $randomValue; ?></label> -->
            <div>
            	<input id="test_input" name="test_input_p">
            </div>
            <div>
            	<input type="submit" class="button" name="button_post" value="Valider ma réponse">
            </div>
        </fieldset>
    </form>


	<?php 
		if(isset($buttonPost)){
		    if($enteredValue == $hidden){ 
	?>
		  		<strong>Bravo !</strong> C'est la bonne réponse ! 
	<?php 
		        //echo "TRUE";
		    }elseif($randomValue != $hidden){
	?>
		        <span class="red"> <strong>Faux !</strong> Dommage, ce n'était pas la bonne réponse ! </span>
	<?php
		    }else{
	?>
		        <span class="red"> <strong>Faux !</strong> Dommage, ce n'était pas la bonne réponse ! </span>
	<?php
		    }
		}
	?>

	</div>

	<?php include('footer.php') ?>

</body>
</html>



