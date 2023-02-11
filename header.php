<?php 
session_start();
$rand = md5(uniqid(mt_rand(), true));
$timestamp_expire = time() + 365*24*3600;
setcookie('ident', $rand, $timestamp_expire);
$_SESSION['ip'] = $_SERVER['REMOTE_ADDR'];
$_SESSION['cookie'] = $rand;
?>

<!DOCTYPE html>

<html lang="fr">

<head>
 	<meta charset="utf-8"> 
 	<link rel="stylesheet" href="style/header_style.css">
	<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@500&display=swap" rel="stylesheet">
 </head>

 <body>

    <nav>
      <ul class="menu">
        <li>
          <a href="index.php"> <img src="images/logo_88keys.svg" alt="Logo 88 Keys"> </a>
        </li>
        <li>
        	INSTRUMENTS
          <ul class="sub-menu">
            <a href="instrument_piano.php"><li>Piano</li></a>
            <a href="instrument_violon.php"><li>Violon</li></a>
            <a href="instrument_guitare.php"><li>Guitare</li></a>
          </ul>
        </li>
        
        <li><a href="blind_test_rules.php">
          BLIND TEST</a>
        </li>
        <li><a href="absolute_ear_rules.php">
          TRAVAILLE TON OREILLE</a>
          <ul class="sub-menu">
            <a href="absolute_ear.php"><li>Mode d'entraînement</li></a>
            <a href="page_en_attente.php"><li>Mode simple</li></a>
            <a href="page_en_attente.php"><li>Mode difficile</li></a>
            <a href="page_en_attente.php"><li>Mode hardcore</li></a>
          </ul>
        </li>
        
        <?php if(isset($_SESSION['user'])) { ?>
        <li>
          MON PROFIL	
          <ul class="sub-menu">
            <a href="page_en_attente.php"><li><?php echo $_SESSION['user']; ?></li></a>
            <a href="page_en_attente.php"><li>Paramètres du compte</li></a>
            <a href="page_en_attente.php"><li>Mes badges</li></a>
            <a href="page_en_attente.php"><li>Invitez vos ami(e)s</li></a>
            <a href="page_en_attente.php"><li>Contactez-nous</li></a>
            <a href="deconnexion.php"><li>Se déconnecter</li></a>
          </ul>
        </li>
        <?php }else{ ?>
        <li><a href="page_connexion.php">
          SE CONNECTER</a>
        </li>
        <?php } ?>
      </ul>
    </nav>


  </body>
</html>





