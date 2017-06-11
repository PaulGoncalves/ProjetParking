<?php
session_start();
$bdd = new PDO('mysql:host=localhost; dbname=parking','root','');
if(isset($_session['id']))
{
 if(isset($_post['newmdp1'])and !empty($_post['newmdp1'])and !empty($_post['newmdp2'])and !empty($_post['newmdp2']));
 {
	 $mdp1 = sha1($_post['mdp1']);
	 $mdp2 = sha1($_post['mdp2']);
	 if($mdp1 == $mdp2)
	 {
		 $insertmdp = $bdd->prepare("update client mdp = ? where id = ?");
		 $insertmdp->execute(array($mdp1, $_session['id']));
		 header("Location: profil.php");
	 }
	 else 
	 {
		 $msg ="Vos deux mots de passe ne correspondent pas";
	 }
 }
 

?>		
<html>
	<head>
			<title>changer mdp</title>
	
	</head>
	
<body>
     <div align="center">
	 <h2>Changer le mot de passe</h2>
	 <form method ="post" action="">
	
	
    	<input type="text" name="mdp1"  placeholder="mdp1"/><br/> <br/>
		<input type="text" name="mdp2"  placeholder="mdp2"/><br/> <br/>
	</form>
	   
</div>	
</body>
</html>		
<?php
}
else
{
	

}
?>
	