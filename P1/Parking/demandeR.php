<?php
$bdd = new PDO('mysql:host=localhost; dbname=parking','root','');
if(isset($_POST['reserver']))
{
		$deb_r =($_POST['deb_r']);
		$fin_r =($_POST['fin_r']);
		
		

		if(!empty($_POST['deb_r']) AND !empty($_POST['fin_r']) AND  !empty($_POST['id_c']) AND !empty($_POST['id_r']))
		{	
				$h=1;
			
				if($id_r== $h)
				{	
						$requete = $bdd->prepare('INSERT INTO  reservation = CURDATE(deb_r,fin_r,id_c,id_r) VALUES(?,?,?,?)');
				        $requete->execute(array($deb_r, $fin_r,$id_c,$id_r));
						
				}
			
		}
}
					
?>									
<html>
	<head>
			<title>demandeR</title>
	
	</head>
	
<body>
     <div align="center">
	 <h2>Demande de reservation</h2>
	 <br/> <br/>
	 
	 <form method="POST" action="">
	 <table>
			<tr>
				<td align="right">
				<label for="deb_r"> Date debut:</label></td>
				<td align="right">
				<input type="date" placeholder="deb_r" id="deb_r" name="deb_r" value="<?php if(isset($deb_r)) {echo $deb_r;} ?>" />
			 </td>
	  
		</tr>
		<tr>
			<td align="right">
				<label for="fin_r"> Date fin:</label></td>
				<td align="right">
				<input type="date" placeholder="fin_r" id="fin_r" name="fin_r" value="<?php if(isset($fin_r)) {echo $fin_r;} ?>"/>
			</td>
	 
		</tr>
		
		
		<tr>
		<td></td>
			<td>
				<input type="submit" name="reserver" value="Demande de reservation"/>
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