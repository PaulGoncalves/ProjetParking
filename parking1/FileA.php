<?php session_start();?>
<?php include('includes/header.php'); ?>
<?php include('nav.php'); ?>
<body style="background-image: url('img/background.jpg');">
<?php include('p1/model/historique.php'); ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title> File d'attente</title>
</head>
<body>
<div class="container trans">
<form class="well form-horizontal" role="form"  method="post"  id="contact_form">
<fieldset>

<!-- Form Name -->
<legend>Ma place dans le parking et historique des places attribuées</legend>


	<?php if (isset($_SESSION['id']) AND !isset($_SESSION['connecte'])) {
		echo "veuillez vous connecter";
	}else
{?>
	<ul>



		<?php 
		$client = get_reservations();
		 while($m = $client->fetch()){?>
	


	       <div class="form-group historique">
  				<label for="Place"class="col-md-4 control-label">Place</label> 
			
				

			<?= $m['id_p']?>
			 </div> 
		 <div class="form-group historique">
  				<label for="place"class="col-md-4 control-label">Date debut:</label> 
			
		
			<?= $m['deb_r'] ?>
			</div>
			<div class="form-group historique">
  				<label for="place"class="col-md-4 control-label">Date fin:</label> 
			
		
			<?= $m['fin_r'] ?>
			</div>

	
		<?php }}

		 ?>

		

	</ul>
	</fieldset>
	</form>
	
	</body>
	</html>
		
		