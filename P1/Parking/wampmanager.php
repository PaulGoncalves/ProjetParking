<?php
$bdd = new PDO('mysql:host=localhost; dbname=parking','root','');
if(isset($_POST['forminscriptiion']))
{
	    $mdp = htmlspecialchars($_POST['mdp']);
		$mdp2 = htmlspecialchars($_POST['mdp2']);
		$email = htmlspecialchars($_POST['email']);
		$email2 = htmlspecialchars($_POST['email2']);
		$nom = htmlspecialchars($_POST['nom']);
		
		$mdp = sha1($_POST['mdp']);
		$mdp2 = sha1($_POST['mdp2']);
		$email = ($_POST['email']);
		$email2 = ($_POST['email2']);
		/*$nom = sha1($_POST['nom']);*/
		if(!empty($_POST['nom']) AND !empty($_POST['prenom']) AND !empty($_POST['email']) AND !empty($_POST['telephone']) AND !empty($_POST['mdp'])AND !empty($_POST['mdp2'])AND !empty($_POST['email2']))
		{
			
			
				if($email == $email2)
				{
					
					if($mdp == $mdp2)
					{
						$inserclient = $bdd->prepare("INSERT INTO  client(nom, email, mdp)VALUES(?,?,?)");
				        $inserclient->execute(array($nom, $email , $mdp));
						$erreur =" votre compte a bien cree! <a href=\"connection.php\">Me connecter</a>";
						
					
					}
					else
					{
						$erreur =" vos mot de passe ne correspondent pas!";
					}
					
			    }

				else
				{
					$erreur = "Vos adresses mail ne correspondent pas !";
				}
			
			
	
			
		
	}	
	else
	{
		$erreur ="Tous les champs doivent etre remplis !";
	
	}
	
}

?>




<html>
	<head>
			<title>TUO php</title>
	
	</head>
	
<body>
     <div align="center">
	 <h2>Inscription</h2>
	 <br/> <br/>
	 
	 <form method="POST" action="">
	 <table>
			<tr>
			<td align="right">
			 <label for="nom"> Nom:</label></td>
			 <td align="right">
				<input type="text" placeholder="Votre nom" id="nom" name="nom" value="<?php if(isset($nom)) {echo $nom;} ?>" />
			 </td>
	  
		</tr>
		
		<tr>
			<td align="right">
			 <label for="prenom"> Prenom:</label></td>
			 <td align="right">
				<input type="text" placeholder="Votre prenom" id="prenom" name="prenom" value="<?php if(isset($prenom)) {echo $prenom;} ?>"/>
			 </td>
	 
		</tr>
		<tr>
			<td align="right">
			 <label for="email"> Email:</label></td>
			 <td align="right">
				<input type="email" placeholder="Votre e-mail" id="email" name="email" value="<?php if(isset($email)) {echo $email;} ?>"/>
			 </td>
	 
		</tr>
		<tr>
			<td align="right">
			 <label for="email2">Confirmation de votre email:</label></td>
			 <td align="right">
				<input type="email2" placeholder="Votre e-mail" id="email" name="email2" value="<?php if(isset($email2)) {echo $email2;} ?>"/>
			 </td>
	 
		</tr>
		<tr>
			<td align="right">
			 <label for="telephone"> Telephone:</label></td>
			 <td align="right">
				<input type="telephone" placeholder="Votre tele" id="telephone" name="telephone" value="<?php if(isset($telephone)) {echo $telephone;} ?>"/>
			 </td>
	 
		</tr>
		<tr>
			<td align="right">
			 <label for="mdp"> Mot de passe :</label></td>
			 <td align="right">
				<input type="text" placeholder="Votre mot de passe " id="mdp" name="mdp"/>
			 </td>
			 
	 
		</tr>
		<tr>
			<td align="right">
			 <label for="mdp2"> Confirmation de mot passe  :</label></td>
			 <td align="right">
				<input type="text" placeholder="Confirmation de mot passe " id="mdp2" name="mdp2"/>
			 </td>
			 
	 
		</tr>
		
		
		<tr>
		<td></td>
			<td>
				<input type="submit" name="forminscriptiion" value="Inscription"/>
			</td>
		 </tr>
	  </table>
	      
	</form>
	 <?php
	 
	 if(isset($erreur))
	 {
		
		 
		 echo '<font color="red">'.$erreur."</font>";
	 }
	 
	 ?>
	 </div>
	 

</body>


</html>