<?php include('includes/header.php'); ?>

<?php include('nav.php'); ?>
<?php
$bdd = new PDO('mysql:host=localhost; dbname=parking','root','');
if(isset($_POST['forminscriptiion']))
{
	    $deb_r = htmlspecialchars($_POST['deb_r']);
		$fin_r = htmlspecialchars($_POST['fin_r']);
		
		
		
		
		if(!empty($_POST['deb_r']) AND !empty($_POST['fin_r']) )
		{
			
			
			
				if($deb_r == $deb_r)
				{
					
					if($fin_r == $fin_r)
					{
						$inserclient = $bdd->prepare("INSERT INTO  reservation (deb_r, fin_r)VALUES(?,?)");
				        $inserclient->execute(array($deb_r, $fin_r));
				        $erreur= "Votre réservation à bien été ajouté";
						
					}
					else
					{
						$erreur =" Veillez patientez !";
					}
					
			    }			
		
	}	
	else
	{
		$erreur ="Tous les champs doivent etre remplis !";
	
	}
	
}

?>




<body>
	 <?php
	 
	 if(isset($erreur))
	 {
		
		 
		 echo '<font color="red">'.$erreur."</font>";
	 }
	 
	 ?>
	 </div>
	 

</body>


</html>

	
<body>
     
	<div class="container trans">

	 
	 <form class="well form-horizontal reservation" role="form"  method="post"  id="contact_form">
<fieldset>

<!-- Form Name -->
<legend>Demande de reservation</legend>



<div class="form-group">
	  <label for="deb_r" class="col-md-4 control-label">Date debut</label>  
	  <div class="col-md-4 inputGroupContainer">
	  	<div class="input-group">
	  		<span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
	  			<input  name="deb_r" class="form-control"  placeholder="debut reservation" id="deb_r"  type="date"  value="<?php if(isset($deb_r)) {echo $deb_r;} ?>"/>
    	</div>
  	  </div>
</div>
	<div class="form-group">
	  <label for="fin_r" class="col-md-4 control-label">Date fin</label>  
	  <div class="col-md-4 inputGroupContainer">
	  	<div class="input-group">
	  		<span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
	  			<input name="fin_r" class="form-control" placeholder="fin reservation" id="fin_r"  type="date"  value="<?php if(isset($fin_r)) {echo $fin_r;} ?>"/>
    	</div>
  	  </div>
</div>
		<div class="form-group">
  			<label class="col-md-4 control-label"></label>
  				<div class="col-md-4">
    				<button type="submit"  name="forminscriptiion"  class="btn btn-warning" value="Demande de reservation" >Envoyer <span class="glyphicon glyphicon-send"></span></button>
  				</div>
		</div>
		 <?php
	 
	 if(isset($erreur))
	 {
		
		 
		 echo '<font color="red">'.$erreur."</font>";
	 }
	 
	 ?>
		</fieldset>
</form>
</div>		 
	 

</body>
</html>