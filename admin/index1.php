<?php include('database.php') ?>
<html>
<head>
	

</head>
	<body>
		 <!-- Slide à faire -->
	<nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container-fluid">
            <a class="header-distributed" href="index.php" style="text-decoration:none"><h3><span>Park'In</span></h3></a>
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>                        
                </button>

            </div>
            <div class="collapse navbar-collapse" id="myNavbar">

                <ul class="nav navbar-nav">
                    <li><a href="#">Accueil</a></li>
                    <li><a href="reservation.php">Réservation</a></li>
                    <li><a href="historique.php">Ajouter/Supprimer/Modifier une place</a></li>
                    <li><a href="contact.php">Contact</a></li>

                </ul>

                <ul class="nav navbar-nav navbar-right">
                		<p>bienvenue <?= $_SESSION['admin'] ?></p>
                    <li><a href="Login.php"><span class="glyphicon glyphicon-log-in" ></span> Connexion</a></li>
                    </li>

                </ul>
            </div>
        </div>
    </nav>
		<?php
			if (!$_SESSION['admin']) {
				header('Location:login.php');
			}
			?>
</div>


    </body>
</html>