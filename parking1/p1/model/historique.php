<?php
 function get_reservations()
{
	$bdd = new PDO('mysql:host=localhost; dbname=parking','root','');

$client= $bdd->query('SELECT  nom,email,id_r,id_p,deb_r, fin_r FROM reservation r, client c ');
return($client);
}

function client(){
	$bdd = new PDO('mysql:host=localhost; dbname=parking','root','');
	$reponse = $bdd->query('SELECT * FROM client');
return($reponse);
}
	function liste_attente(){
		$bdd = new PDO('mysql:host=localhost; dbname=parking','root','');
		$reponse = $bdd->query('SELECT  nom, prenom, liste_a FROM client');
return($reponse);
	}



?>