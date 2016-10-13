<?php include('includes/header.php'); ?>
<?php

        
        $requete = $bdd->prepare("SELECT * FROM reservation, client");
        $requete->execute(array());


?>
<div class="container">
    <div class="row">

        </br>
    <h1>Liste des places de parking</h1>
    </br> </br> </br> </br>

<div class="col-md-10 col-md-offset-1">

    <div class="container">
        <div class="row">
<form method="POST">
            <a id="add_row" class="btn btn-default pull-right glyphicon glyphicon-plus ">Add Row</a>
        </div>
        <div class="row clearfix">
            <div class="col-md-12 table-responsive">
                <table class="table table-bordered table-hover table-sortable" id="tab_logic">
                    <thead>
                        <tr >

                            <th class="text-center">

                                numero de place
                            </th>
                            <th class="text-center">
                                Nom
                            </th>
                            <th class="text-center">
                                Prenom
                            </th>

                            <th class="text-center" style="border-top: 1px solid #ffffff; border-right: 1px solid #ffffff;">
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr id='addr0' data-id="" class="hidden">

                            <td data-name="place">
                                <input type="text" name='name0'  placeholder='place' class="form-control"/>
                            </td>
                            <td data-name="nom">
                                <input type="text" name='mail0' placeholder='Nom' class="form-control"/>
                            </td>
                            <td data-name="prenom">
                                <input type="text" name='mail0' placeholder='Prenom' class="form-control"/>
                            </td>

                            <td data-name="del">
                                <button nam"del0" type="supprimer" class='btn btn-danger glyphicon glyphicon-remove row-remove'></button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
            <div class="panel-footer">
            <div class="form-group"> 
                Début<input type="date" name="" />
                </div>
                 <div class="form-group"> 
                  Fin<input type="date" name="" />
                  </div>
            
            </div>
        </div>
        <div class="row">
        <button type="enregistre" class="btn btn-success pull-right"> Enregistrer</button>
            
            <?php   
            try
            {
                $bdd = new PDO("mysql:host=localhost;dbname=parking;charset=utf8","root","");
            }
            catch(Exception  $e)
            {
                die ('Erreur : ' . $e);
            }

    if (isset($_POST['update'])) {
        
    $mdp = sha1($_POST['mdp']);

    $req = $bdd->query("UPDATE client SET mdp='".$mdp."' WHERE id_c='$id_c'");
    

    if($id_c == $_SESSION['id'])
    {
        return(0);
    }
    else
    {
        return('The password to the user with ID ' . $id_c . ' is now "' . $mdp . '". The user can now log in and change the password');
    }


    if($id_c == $_SESSION['id'])
    {
        return('<span class="error_span">Désolé vous ne pouvez pas les supprimer</span>');
    }
    else
    {
        $req= $bdd("UPDATE client SET admin = 1 - admin WHERE id_c='$id_c'");

        return(1);
}
}
if (isset($_POST['submit'])) {
    


$data = $_GET['donnee'];
$id_c = $_SESSION['id'];

    if($id_c == $_SESSION['id'] && $data != 'reservations')
    {
        return('<span class="error_span">Désolé, votre reservation n\a pas été accépté</span>');
    }
    else
    {
        if($data == 'reservations')
        {
            $req= $bdd->query("DELETE FROM reservation WHERE id_r='$id_c'");
        }
        elseif($data == 'user')
        {
            $req= $bdd->query("DELETE FROM client WHERE id_c='$id_c'");
            $req= $bdd->query("DELETE FROM reservation WHERE id_r='$id_c'");
        }

        return(1);
    }
}
//tout supprmer
    if (isset($_POST['supprimer'])) {
   
    $id_c = $_SESSION['id'];

    if($data == 'reservations')
    {
        $req= $bdd->query("DELETE FROM reservation WHERE id_r!='$id_c'");
    }
    elseif($data == 'users')
    {
        $req= $bdd->query("DELETE FROM client WHERE id_c!='$id_c'");
        $req= $bdd->query("DELETE FROM reservation WHERE id_r!='$id_c'");
    }
    elseif($data == 'everything')
    {
        $req= $bdd->query("DELETE FROM client");
        $req= $bdd->query("DELETE FROM reservation");
    }

    return(1);
 }

            ?>
            <a href="#" type="annuler" class="btn btn-primary">Annuler</a>
</form>
        </div>
    </div>

</div>
</div>
</div>


<?php
include ("footer.php");
?>