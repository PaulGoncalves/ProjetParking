<?php
session_start();
$bdd = new PDO('mysql:host=localhost; dbname=parking','root','');
if(isset($_POST['verification']))
{
	$nom = htmlspecialchars($_POST['nom']);
	$mdp = htmlspecialchars($_POST['mdp']);
	if(!empty($nom) AND !empty($mdp))
	{
		$requser =$bdd->prepare("select * from client where nom=? and mdp =?");
		$requser->execute(array($nom, $mdp));
		$userexist = $requser->rowCount();
		if($userexist ==1)
		{
			$userinfo = $requser->fetch();
			$_SESSION['id']= $userinfo['id'];
			$_SESSION['nom']= $userinfo['nom'];
			$_SESSION['nom']= $userinfo['nom'];
			header("Location: profil.php?id=".$_SESSION['id']);
			
		}
		else
		{
			$erreur =" identifiant ou mot de passe incorrect";
		}
	}
	else
	{
		$erreur ="tous les champs doivent etre remplis";
	}
}

 ?>  

<html>
	<head>
		<title> Verification</title>
		<meta charset="utf-8">
	</head>
<body>
	<div align="center">
		<h2>Connexion</h2>
			<br/><br /><br/>
	<form method="post" action="">
	<table >
	<tr>
		<td align="right">
			<label for="nom">Login:</label>
		</td>
		<td>
			<input type="text" placeholder="votre nom" id="pseudo" name="nom"/>
		</td>
	</tr>
	<tr>
		<td align="right">
			<label for="nom">Mot de passe:</label>
		</td>
		<td align="right">
			<input type="text" placeholder="votre mot de passe " id="mdp" name="mdp"/>
		</td>
	</tr>
	<tr>
	<td></td>
	<td align="center">
		 <input type="submit" name="verification" value="connexion"/>
	</td>
	</tr>
	</table>
	<br/>
	
  </form>
  <?php
  if(isset($erreur))
  {
	  echo'<font color="red">'.$erreur."</font>";
  }
  
  ?>
</div>
</body>
</html>	
	