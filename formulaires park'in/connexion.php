<?php
session_start();

$bdd = new PDO('mysql:host=127.0.0.1;dbname=espace_membre', 'root','');

if(isset($_POST['formconnexion']))
{
    $mailconnect = htmlspecialchars($_POST['mailconnect']);
    $mdpconnect = sha1($_POST['mdpconnect']);
    if(!empty($mailconnect) AND !empty($mdpconnect))
    {
        //on voit si l'utilisateur existe bien donc on fait une requete sur l'utilisateur
        $requser = $bdd->prepare("SELECT * FROM membres WHERE mail = ? AND motdepasse = ?");
        $requser->execute(array($mailconnect, $mdpconnect));
        //compter le nombre de ranger qui existe avec les info qu'a rentré les utilisateurs
        $userexist = $requser->rowCount();
        if($userexist == 1)
        {
            $userinfo = $requser->fetch();
            $_SESSION['id'] = $userinfo['id'];
            $_SESSION['pseudo'] = $userinfo['pseudo'];
            $_SESSION['mail'] = $userinfo['mail'];
            //rediriger vers le profil de la personne
            header("Location: profil.php?id=".$_SESSION['id']);
        }
        else
        {
            $erreur = "Mauvais mail ou mot de passe !";
        }
    }
    else
    {
        $erreur = "Tous les champs doivent etre complétés !";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Document</title>
        <link rel="stylesheet" href="css/style.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
        <link rel="stylesheet" href="https://opensource.keycdn.com/fontawesome/4.6.3/font-awesome.min.css" integrity="sha384-Wrgq82RsEean5tP3NK3zWAemiNEXofJsTwTyHmNb/iL3dP/sZJ4+7sOld1uqYJtE" crossorigin="anonymous">
    </head>
    <body>
        <div class="container">

            <div class="login-box ">
                <div class="box-header">
                    <h2>Connexion</h2>
                </div>
                <form method="POST" action="">
                    <label for="username">Utilisateur</label>
                    <br/><i class="fa fa-envelope fa-lg" aria-hidden="true"></i>
                    <input type="email" name="mailconnect" placeholder="Mail"/>
                    <br/>
                    <label for="password">Mot de passe</label>
                    <br/>
                    <i class="fa fa-key fa-lg" aria-hidden="true"></i>
                    <input type="password" name="mdpconnect"  placeholder="Mot de passe"/>
                    <br/>
                    <button type="submit" name="formconnexion" value="Se connecter">Valider</button>
                </form>
                <p class="small">Pas de compte ? <a href="inscription.php">s'enregistrer</a></p>
                

                <?php
                if(isset($erreur))
                {
                    echo '<font color="red">'.$erreur."</font>";
                }
                ?>
            </div>
        </div>
    </body>
</html>