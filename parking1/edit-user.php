<?php
	try //tentative de connexion a la bdd
	{
		$bdd = new PDO("mysql:host=localhost;dbname=parking","root",""); //connexion a la bdd
	}
	catch(Exception $e) // en cas d'erreur de connection 
	{
		die("erreur de connection");
	}
	
	if(isset($_GET['edit']))
	{
		$requete = $bdd->query("SELECT * FROM client WHERE id_c=".$_GET['edit']);
		$donnee = $requete->fetch();
	}
	
	if(isset($_POST['submit']))
	{
		if($_POST['id_c'] == 0)
		{
			$requete = $bdd->query("INSERT INTO client VALUES('','".$_POST['nom']."','".$_POST['email']."')");
		}
		else
		{
			$requete = $bdd->query('UPDATE client SET nom="'.$_POST['nom'].'",email="'.$_POST['email'].'" WHERE id_c = '.$_POST['id_c']);
		}
		header("Location:listeUtilisateurs.php");
	}

	
?>
<form method="post" action="#">
	nom<input type="text" name="nom" value="<?php if(isset($donnee['nom'])){echo $donnee['nom'];} ?>"/></br>
	email<textarea name="email"><?php if(isset($donnee['email'])){echo $donnee['email']; } ?></textarea><br />
	<input type="hidden" name="id_c" value="<?php if(isset($_GET['edit'])) {echo $_GET ['edit'];} else{echo "0";} ?>"/>
	<input type="submit" name="submit"/>
</form>