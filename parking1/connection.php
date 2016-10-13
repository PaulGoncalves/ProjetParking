<?php include('includes/header.php'); ?>
<?php
session_start();
$bdd = new PDO('mysql:host=localhost; dbname=parking','root','');
if(isset($_POST['verification']))
{
	$email = htmlspecialchars($_POST['email']);
	$mdp = htmlspecialchars($_POST['mdp']);
	if(!empty($email) AND !empty($mdp))
	{
		$requser =$bdd->prepare("select * from client where email=? and mdp =?");
		$requser->execute(array($email, $mdp));
		$userexist = $requser->rowCount();
		if($userexist == 1)
		{
			$userinfo = $requser->fetch();
			$_SESSION['id']= $userinfo['id_c'];
			$_SESSION['id_p']= $userinfo['id_p'];
			$_SESSION['email']= $userinfo['email'];
			$_SESSION['connecte'] = true;
			$_SESSION['admin'] = $userinfo['email'];	
			header('Location: accueil.php?id "'.$userinfo['id_c']. '"');
        
        		
	    }
		else
		{
			$erreur ='<div class="form-group"> identifiant ou mot de passe incorrect</div>';
			
		}
	}
	else
	{
		$erreur ='<div class="form-group"> Tous les champs doivent etre remplis !</div>';
	}
	if($userinfo['id_c'] == 2)
	            {
	            	header('Location: admin.php?id "'.$userinfo['id_c']. '"');
	                echo '<a href="admin.php?id "'.$userinfo['id_c'].'""><li class="bcRed">Admin</li></a>';
	        }else{
	            	echo "Vous ne pouvez pas y acceder";
	        }
	
}


		?>

<body class="body">
<div class="container">
<div class="login-box ">
                <div class="box-header">*
                <h2 class='titre'>Connexion</h2>
                </div>

    <form method="POST" action="">
     <label>email</label>
       <br/><i class="fa fa-envelope fa-lg" aria-hidden="true"></i>
          <input type="text" name="email" placeholder="Votre email" required/>
            <br/>
                    
     <label>Mot de passe</label>
       <br/><i class="fa fa-key fa-lg" aria-hidden="true"></i>
           <input type="password" name="mdp" id="mdp" placeholder="Votre mot de passe" required/>
            <br/>
                    <button type="submit" name="verification" value="Se connecter">Se connecter</button>
                </form>
                <p class="small">Pas de compte ? <a href="index.php">s'inscrire</a></p>
   
      <?php
    if(isset($erreur))
  {
	  echo'<font color="red">'.$erreur."</font>";
  }
  
  ?>
  </div>
</div>

</fieldset>
</form>
 
</div>
</body>
</html>
