
<?php

$bdd = new PDO('mysql:host=localhost; dbname=projetparking','root','');

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>Liste des utilisateurs</title>
        <!-- Lien vers css -->
        <link rel="stylesheet" type="text/css" href="css/style.css" />
        <!-- Lien Bootstrap -->
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
        <!-- Lien FontAwesom -->
        <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">

    </head>

    <body>
        <!-- Début de la barre de navigation -->
        <nav class="navbar navbar-inverse navbar">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#tmNavbar" aria-expanded="false">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" id="couleur_brand" href="#">Administration</a>
                </div>

                <div class="collapse navbar-collapse" id="tmNavbar">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="#">Liste des places</a></li>
                        <li class="active"><a href="listeUtilisateurs.html">Liste des utilisateurs</a></li>
                        <li><a href="#">Déconnexion  <i class="fa fa-sign-out" aria-hidden="true"></i></a></li>
                    </ul>
                </div>
            </div> <!--Container -->
        </nav>

        <?php
        
        ?>

        <div class="container-fluid">
            <div class="row">

                <div class="col-md-offset-0 col-md-6 col-xs-offset-1 col-xs-10">

                    <p>Ajouter un utilisateur : <a href="#"><i class="fa fa-plus" aria-hidden="true"></i></a></p>

                    <table class="table table-striped">
                        <tr>
                            <th class="col-md-4">Nom</th>
                            <th class="col-md-4">Prenom</th>
                            <th class="col-md-4">Réinitialiser mot de passe</th>
                        </tr>
                        <tr>
                            <td>machin</td>
                            <td>machin</td>
                            <td><input class="btn btn-primary" type="button" value="Réinitialiser MDP"/></td>
                        </tr>
                        <tr>
                            <td>machin</td>
                            <td>machin</td>
                            <td><input class="btn btn-primary" type="button" value="Réinitialiser MDP"/></td>

                        </tr>
                    </table>
                </div>
                <div class=" col-md-offset-0 col-md-6 col-xs-offset-1 col-xs-10">

                    <p class="col-md-6">Liste d'attente :</p><input class="col-md-offset-1 col-md-3 btn btn-primary boutonDroit" type="button" value="Editer la file d'attente"/>

                    <table class="table table-striped">
                        <tr>
                            <th class="col-md-4">Nom</th>
                            <th class="col-md-4">Prenom</th>
                            <th class="col-md-4">Numéro dans liste d'attente</th>
                        </tr>
                        <tr>
                            <td>machin</td>
                            <td>machin</td>
                            <td>1</td>
                        </tr>
                        <tr>
                            <td>machin</td>
                            <td>machin</td>
                            <td>2</td>

                        </tr>
                    </table>
                </div>
            </div>

        </div>

        <!-- fin de la barre de navigation -->

        <script src="js/bootstrap.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    </body>

</html>