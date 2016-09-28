<?php
session_start();
$bdd = new PDO('mysql:host=localhost; dbname=parking','root','');

$client= $bdd->query('SELECT * FROM reservation ');


	
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title> File d'attente</title>
</head>
<body>
				 <div align="center">
				<h2>Ma place dans le parking</h2>
				<h5> Historique des places attribueés</h5>

	
	<table>
	<ul>	<?php while($m = $client->fetch()){?>
	       
			<tr>
			<td><label for="place"> Rang dans le file d'attente :</label></td>
			 <td align="right">
		

			<?= $m['id_r']?>  
			</td>
			</tr>
			<tr>
			<td><label for="place">Date debut:</label></td>
			<td align="right">
			<?= $m['deb_r'] ?>
			</td>
			</tr>


			<td><label for="place">Date fin:</label></td>
			<td align="right">
			<?= $m['fin_r'] ?></li>
			
				
			</td>
			</tr>
	
		<?php } ?>
		
	
	</table>	
	</ul>
	
	</body>
	</html>
		
		