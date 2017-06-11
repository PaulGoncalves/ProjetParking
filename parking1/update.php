<?php include('includes/header.php'); ?>
<body style="background-image: url('img/background.jpg');">

<?php
session_start();
$bdd = new PDO('mysql:host=localhost; dbname=parking','root','');

if (isset($_POST['submit'])) {
	$o_password = $_POST['o_password'];
	$n_password = $_POST['n_password'];
	$r_password = $_POST['r_password'];
	$_POST['email']=$_SESSION['email'];
	
	$o_password =sha1($_POST['o_password']);

	$requete = $bdd->query("SELECT * FROM client WHERE email='".$_SESSION['email']."' AND mdp= '$o_password'");
	$reponse = $requete->fetch();

	if (empty($o_password)) {
		echo "Veuillez saisir votre ancien mot de passe";
	}elseif ($n_password != $r_password ) {
		echo "Mots de passe non identiques";
	}else{
		

		$display_mdp = sha1($_POST['mdp']);
		$requete = $bdd->query("UPDATE client SET mdp= '".$n_password."' WHERE email='".$_POST['email']."'");
		header('Location: connection.php');
		
			echo "Votre nouveau mot de passe est '".$n_password."'";
		
		

	}
}

?>	
<body>
     
	 
      
      
	
	   <div class="container trans">

    <form class="well form-horizontal" role="form"  method="post"  id="contact_form">
    <?php if (isset($display_mdp))
   			echo " votre nouveau mot passe est ".$display_mdp."";
    ?>
<fieldset>

<!-- Form Name -->
<legend>Modification du mot de passe</legend>

<!-- Text input-->
 <?php
	 
	 if(isset($erreur))
	 {
		
		 
		 echo '<font color="red">'.$erreur."</font>";
	 }
	 
	 ?>
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

<!-- Text input-->
  <div class="form-group">
  <label for="email" class="col-md-4 control-label">eMail</label>  
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
  <input name="email" placeholder="Adresse email" class="form-control"  type="text">
    </div>
  </div>
</div>

<div class="form-group">
  <label for="mot_de_passe" class="col-md-4 control-label">Votre ancien mot de passe</label>  
  <div class="col-md-4 inputGroupContainer">
  <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
    <input type="password" name="o_password" id="mot_de_passe" placeholder="Ancien mot de passe"  class="form-control">
    </div>
  </div>
</div>

<div class="form-group">
  <label for="newmdp" class="col-md-4 control-label">Votre nouveau mot de passe</label>  
  <div class="col-md-4 inputGroupContainer">
  <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
  <input  type="password"  name="n_password" id="newmdp" class="form-control"  placeholder="Nouveau mot de passe">
    </div>
  </div>
</div>

<div class="form-group">
  <label for="newmdpc" class="col-md-4 control-label">Retapez votre mot de passe</label>  
  <div class="col-md-4 inputGroupContainer">
  <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
  <input  class="form-control"  placeholder="Retaper votre mot de passe"  type="password" name="r_password" id="newmdpc"  >
    </div>
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label"></label>
  <div class="col-md-4">
    <button type="submit" name="submit" value="modifier" class="btn btn-warning" >Envoyer <span class="glyphicon glyphicon-send"></span></button>
  </div>
</div>
		
</div>	
</body>