<?php
	try{
		$bdd = new PDO('mysql:host=localhost;dbname=mon_projet;charset=utf8', 'root', 'mysql');
	}catch(PDOException $e){
		die('Erreur : ' .$e->getMessage());
	}

?>