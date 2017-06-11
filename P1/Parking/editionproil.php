<?php
session_start();
$bdd = new PDO('mysql:host=localhost; dbname=parking','root','');

if(isset($_SESSION['id']))
{
	

	
	
	
	
	


?>



<html>
	<head>
		<title> Place</title>
		<meta charset="utf-8">
   </head>

<body>
		<div align="center">
		<h2>Edition de mon</h2>
		<form method="post action="">
		<input type="text" name="newnom" placeholder="nom"/><br/><br/>
		<input type="text" name="mdp" placeholder="mdp"/><br/><br/>
		<input type="text" name="prenom" placeholder="prenom"/><br/><br/>
		<input type="text" name="telephone" placeholder="telephone"/><br/><br/>
		<input type="submit" value="mettre a jour mon profil!"/>
		</form>
		
		
	
		</div>	



</body>
</html>	
<?php
}
else
{
	header("Location: connexion.php");
	
}
?>

	