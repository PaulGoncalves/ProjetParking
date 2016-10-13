<?php include("includes/header.php"); ?>
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
  </head>
  <body>
    <?php session_start(); ?>
<?php
try
            {
                $bdd = new PDO("mysql:host=localhost;dbname=parking;charset=utf8","root","");
            }
            catch(Exception  $e)
            {
                die ('Erreur : ' . $e);
            }
            ?>




<?php
       
        include('header.php');
        include('p1/model/historique.php'); 
       $client = get_reservations();
      ?> <div class="container">
      <div class="login-box ">
        <?php echo "<button class='btn' style='color:white;'>Voici les dernieres reservations</button>";
       $client->fetch();

        /* Affichage des message */
        while($donnee = $client->fetch ())

        {
          echo "<ul>";
            echo "<p class='lienAfficher'>".$donnee['email']."</p>"; //contenu
            echo "<p class='lienAfficher'>".$donnee['deb_r']."</p>"; //titre
            echo "<p class='lienAfficher'>".$donnee['fin_r']."</p>"; //contenu
            echo "<a href='edit-reservation.php?var=".$donnee['id_r']."'><button class='lienAfficher'>EDITER LA RESERVATION</button></a>";
          echo "</ul>";
        }
  
  if(isset($_GET['edit']))
  {
    $requete = $bdd->query("SELECT * FROM reservation WHERE id_p=".$_GET['edit']."");
    $donnee = $requete->fetch();//recuperer tous les commentaires//
  }
  
  if(isset($_POST['submit']))
  {
    if($_POST['id_p'] == 0)
    {
      $requete = $bdd->query("INSERT INTO reservation VALUES('','".$_POST['deb_r']."','".$_POST['fin_r']."','".$_POST['id_p']."'')");
    }
    else
    {
      $requete = $bdd->query('UPDATE reservation SET deb_r="'.$_POST['deb_r'].'",fin_r="'.$_POST['fin_r'].'" WHERE id_p = '.$_POST['id_p']);
    }
    header("Location:admin.php");
  }

  
?>
