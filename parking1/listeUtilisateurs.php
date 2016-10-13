<?php include ("includes/header.php");?>
<?php include ("header.php");?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script>
   $(window).ready(function(){
    $(".lienAfficher").hide();
});
   $(document).ready(function(){
    $(".btn").click(function(){
        $(".lienAfficher").animate({
            height: 'toggle'
        });
    });
});
</script> 
<?php session_start(); ?>

<?php

	

 include('p1/model/historique.php'); 
    $reponse = client();
    ?><div class="container">
      <div class="login-box ">
      <?php echo "<button class='btn' style='color:white;'>Voici la liste des utilisateurs</button>";
        /* Affichage des message */
        while($donnee = $reponse->fetch ())
        {
        	echo "<p class='lienAfficher'>".$donnee['nom']."</p>"; //contenu
			echo "<p class='lienAfficher'>".$donnee['prenom']."</p>"; //contenu
			echo "<p class='lienAfficher'>".$donnee['email']."</p>"; //contenu
        	echo "<a href='edit-user.php?edit=".$donnee['id_c']."'><button class='lienAfficher'>EDITER</button></a> ";
		}



        ?>
            </div>

        </div>

  <?php
include ("footer.php");
?>