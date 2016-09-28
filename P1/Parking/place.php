<?php
session_start();
$bdd = new PDO('mysql:host=localhost; dbname=parking','root','');

if(isset($_GET['id'])AND $_GET['id']>0)
{
	$getid = intval($_GET['id']);
	$requser = $bdd->prepare('SELECT * from reservation WHERE id=?');
	$requser->execute(array($getid));
    $userinfo = $requser->fetch();

	
	
	
	
	


?>



<html>
	<head>
		<title> Place</title>
		<meta charset="utf-8">
   </head>

<body>
		<div align="center">
		<h2> Ma palce dans le parking <?php echo $userinfo['id_c']; ?></h2>
		<br/><br/>
		Place =<?php echo $userinfo['deb_r']; ?>
		<br/>
		attribution = <?php echo $userinfo['fin_r']; ?>
		<br/>
		<?php 
		if(isset($_SESSION['id']) AND $userinfo['id']==$_SESSION['id'])
		{
		?>
		<a href="editionproil.php"> Editer nom profil</a>
		<a href="deconnection.php">se deconnecter </a>
		<?php
		}
		?>
	
		
	
		</div>	



</body>
</html>	
<?php
}
?>

	