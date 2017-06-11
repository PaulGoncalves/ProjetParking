<?php 
	session_start(); 
	try //connexion bdd
	{
		$bdd = new PDO("mysql:host=localhost;dbname=parking","root","");
	}
	catch(exception $e) // cacher les ereurs de connection
	{
		die("erreur de connexion");
	}

	$email = $_POST['email'];
	$mdp = sha1($_POST['mdp']);
	$requete = $bdd->query("SELECT * FROM utilisateur WHERE email = '".$email."' AND mdp = '".$mdp."'");
	if($donnee = $requete->fetch()){
		$_SESSION['connecte'] = true;
		$_SESSION['user'] = $donnee['id_u'];
		$_SESSION['prenom'] = $donnee['prenom'];
		$_SESSION['nom'] = $donnee['nom'];
		$_SESSION['rank'] = $donnee['rank'];
		header("location:../index1.php");
	}

	else{
		header("location:../register.php?error=1");
	}