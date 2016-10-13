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
		$requete = $bdd->query("SELECT * FROM reservation, client WHERE id_p=".$_GET['edit']."");
		$donnee = $requete->fetch();
	}
	
	if(isset($_POST['submit']))
	{
		if($_POST['id_p'] == 0)
		{
			$requete = $bdd->query("INSERT INTO reservation VALUES('','".$_POST['deb_r']."','".$_POST['fin_r']."')");
		}
		else
		{
			$requete = $bdd->query('UPDATE reservation SET deb_r="'.$_POST['deb_r'].'",fin_r="'.$_POST['fin_r'].'" WHERE id_p = '.$_POST['id_p']);
		}
		header("Location:admin.php");
	}

	
?>
<form method="post" action="#">
	Début de la réservation<input type="date" name="deb_r" value="<?php if(isset($donnee['deb_r'])){echo $donnee['deb_r'];} ?>"/></br>
	Fin de la réservation<input type="date" name="fin_r" value="<?php if(isset($donnee['fin_r'])){echo $donnee['fin_r'];} ?>"/></br>
	<input type="hidden" name="id_p" value="<?php if(isset($_GET['edit'])) {echo $_GET ['edit'];} else{echo "0";} ?>"/>
	<input type="submit" name="submit"/>
</form>