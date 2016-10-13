


<?php include('includes/header.php'); ?>
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
		$display_mdp = sha1($_POST['mdp']);
		/*$nom = sha1($_POST['nom']);*/
		if(!empty($_POST['nom']) AND !empty($_POST['prenom']) AND !empty($_POST['email']) AND !empty($_POST['telephone']) AND !empty($_POST['mdp'])AND !empty($_POST['mdp2'])AND !empty($_POST['email2']))
		{
			
			
				if($email == $email2)
				{
					
					if($mdp == $mdp2)
					{				        

						$inserclient = $bdd->prepare("INSERT INTO  client(nom, email, mdp)VALUES(?,?,?)");
						$inserclient->bindValue(':nom', $nom, PDO::PARAM_STR);
						$inserclient->bindValue(':email', $email, PDO::PARAM_STR);
						$inserclient->bindValue(':mdp', $mdp, PDO::PARAM_STR);
				    $inserclient->execute(array($nom, $email , $mdp));
						$erreur ='<div class="form-group">votre compte a bien cree! <a href="connexion.php"><button>Me connecter</button></a></div>';
						
						
					
					}
					else
					{
						$erreur =' <div class="form-group"> vos mot de passe ne correspondent pas!</div>';
					}
					
			    }

				else
				{
					$erreur ='<div class="form-group"> "Vos adresses mail ne correspondent pas !</div>';
				}
			
			
	
			
		
	}	
	else
	{
		$erreur ='<div class="form-group"> Tous les champs doivent etre remplis !</div>';
	
	}
	
}

?>
	
<body>
     
	<div class="container" >
           <div class="inscription-header">
          
            <h1> <i class="fa fa-car fa-lg" aria-hidden="true"></i> Inscription</h1>
            <br/><br/><br/>
            </div>
            <div class="inscription" >
                <?php
   
   if(isset($erreur))
   {
    
     
     echo '<font color="red">'.$erreur."</font>";
   }
   
   ?>
                <form method="POST" action="">
     <?php if (isset($display_mdp))
    echo "Inscription réussi, votre mot de passe est ".$display_mdp."";
    ?>
    <?php
if (isset($_POST['nom']))
{
    $_POST['nom'] = htmlspecialchars($_POST['nom']); // On rend inoffensives les balises HTML que le visiteur a pu rentrer

    if (preg_match('#^([a-zA-ZÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ](([\ \-\']{1})?[a-zA-ZÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ])+){1,30}$#i',$_POST['nom']))
    {
        echo 'Le nom ' . $_POST['nom'] . ' est <strong>valide</strong> !';
    }
    else
    {
      echo ' Le nom' . $_POST['nom'] . ' n\'est pas valide, recommencez !';
    }
}
?>
                    <label for="nom"> Nom :</label>
                    <br>
                    <input type="text" placeholder="Votre nom" id="nom" value="<?php if(isset($nom)){ echo $nom; } ?>" name="nom"/>
<?php
if (isset($_POST['prenom']))
{
    $_POST['prenom'] = htmlspecialchars($_POST['prenom']); // On rend inoffensives les balises HTML que le visiteur a pu rentrer

    if (preg_match("#^[a-z]+[ \-']?[[a-z]+[ \-']?]*[a-z]+$#",$_POST['prenom']))
    {
        echo 'Le prenom "' . $_POST['prenom'] . '" est <strong>valide</strong> !';
    }
    else
    {
      $erreur = ' Le prenom"' . $_POST['prenom'] . '" n\'est pas valide, recommencez !';
    }
}
?>

                    <label for="prenom"> Prenom :</label>
                    <br>
                    <input type="text" placeholder="Votre prenom" id="prenom" value="<?php if(isset($prenom)){ echo $prenom; } ?>" name="prenom"/>
                    <br>
<?php
if (isset($_POST['telephone']))
{
    $_POST['telephone'] = htmlspecialchars($_POST['telephone']); // On rend inoffensives les balises HTML que le visiteur a pu entrer

    if (preg_match("#^0[1-68]([-. ]?[0-9]{2}){4}$#", $_POST['telephone']))
    {
        echo 'Le ' . $_POST['telephone'] . ' est un numéro <strong>valide</strong> !';
    }
    else
    {
        $erreur = 'Le ' . $_POST['telephone'] . ' n\'est pas valide, recommencez !';
    }
}
?>
      
                    <label for="telephone"> telephone :</label>
                    <br>
                    <input type="text" placeholder="Votre telephone" id="telephone" value="<?php if(isset($telephone)){ echo $telephone; } ?>" name="telephone"/>
                    <br>

                    <?php
if (isset($_POST['email']))
{
    $_POST['email'] = htmlspecialchars($_POST['email']); // On rend inoffensives les balises HTML que le visiteur a pu rentrer

    if (preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $_POST['email']))
    {
        echo 'L\'adresse ' . $_POST['email'] . ' est <strong>valide</strong> !';
    }
    else
    {
      $erreur= 'L\'adresse ' . $_POST['email'] . ' n\'est pas valide, recommencez !';
    }
}
?>

                    <label for="email"> Email </label>
                    <br>
                    <input type="email" placeholder="Votre email" id="email" value="<?php if(isset($email)){ echo $email; } ?>" name="email"/>
                    <br>
<?php
if (isset($_POST['email']))
{
    $_POST['email'] = htmlspecialchars($_POST['email']); // On rend inoffensives les balises HTML que le visiteur a pu rentrer

    if (preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $_POST['email']))
    {
        echo 'L\'adresse ' . $_POST['email'] . ' est <strong>valide</strong> !';
    }
    else
    {
      echo 'L\'adresse ' . $_POST['email'] . ' n\'est pas valide, recommencez !';
    }
}
?>
                    <label for="email">Confirmation de l'email</label>
                    <br>
                    <input type="email2" placeholder="Confirmer votre adresse mail"  id="email" value="<?php if(isset($email2)){ echo $email2; } ?>" name="email2"/>
                    <br>

                    <label for="mdp"> mot de passe : </label>
                    <br>
                    <input type="password" placeholder="Votre mot de passe" id="mdp" name="mdp"/>
                    <br>

                    <label for="mdp2"> Confirmation du mot de passe :</label>
                    <br>
                    <input type="password" placeholder="Confirmer votre mot de passe" id="mdp2" name="mdp2"/>
                    <br/>

                    <br>
                    <button type="submit" name="forminscription" value="je m'inscris" >Valider</button>

  
	 <div class="form-group">
	<a href="connection.php">Si vous avez deja un compte cliquez ici</a>
	</div>
	 </div>
</form>
</div>
</body>


</html>