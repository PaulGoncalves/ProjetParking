<?php

$bdd = new PDO('mysql:host=127.0.0.1;dbname=espace_membre', 'root','');

if(isset($_POST['forminscription']))
{
    //htmlspecialchars pour empecher les injections de code
    $pseudo = htmlspecialchars($_POST['pseudo']);
    $mail =  htmlspecialchars($_POST['mail']);
    $mail2 =  htmlspecialchars($_POST['mail2']);
    //hachage du mdp
    $mdp = sha1($_POST['mdp']);
    $mdp2 = sha1($_POST['mdp2']);

    if(!empty($_POST['pseudo']) AND !empty($_POST['mail']) AND !empty($_POST['mail2']) AND !empty($_POST['mdp']) AND !empty($_POST['mdp2']))
    {


        $pseudolength = strlen($pseudo);
        if($pseudolength <= 255)
        {
            if($mail == $mail2)
            {
                if(filter_var($mail, FILTER_VALIDATE_EMAIL))
                {
                    //voir si le mail existe deja
                    $reqmail = $bdd->prepare("SELECT * FROM membres WHERE mail = ?");
                    $reqmail->execute(array($mail));
                    //Compter le nombre de colonnes qui existe pour ce qu'on a entré avant
                    $mailexist = $reqmail->rowCount();
                    if($mailexist == 0)
                    {

                        if($mdp == $mdp2)
                        {
                            $insertmbr = $bdd->prepare("INSERT INTO membres(pseudo, mail, motdepasse) VALUES(?,?,?)");
                            $insertmbr->execute(array($pseudo, $mail, $mdp));
                            $erreur = "Votre compte a bien été créé ! <a href=\"connexion.php\">Me connecter</a>";
                        }
                        else
                        {
                            $erreur = "Vos mdp ne correspondent pas !";
                        }
                    }
                    else
                    {
                        $erreur = "Adresse mail déjà utilisée !";
                    }
                }
                else
                {
                    $erreur = "votre adresse mail n'est pas valide!";
                }
            }
            else
            {
                $erreur = "Vos adresses mail ne correspondent pas !";
            }
        }
        else
        {
            $erreur = "Votre pseudo ne doit pas depasser 255 caracteres ! ";;
        }
    }
    else
    {
        $erreur = "Tous les champs doivent etre complété !";
    }
}

?>

<!DOCTYPE html>
<html class="background-image" lang="en">
    <head >
        <meta charset="UTF-8">
        <title>Document</title>
        <link rel="stylesheet" href="css/style2.css">
        <link rel="stylesheet" href="https://opensource.keycdn.com/fontawesome/4.6.3/font-awesome.min.css" integrity="sha384-Wrgq82RsEean5tP3NK3zWAemiNEXofJsTwTyHmNb/iL3dP/sZJ4+7sOld1uqYJtE" crossorigin="anonymous">
    </head>
    <body>
        <div class="container" >
           <div class="inscription-header">
          
            <h1> <i class="fa fa-car fa-lg" aria-hidden="true"></i> Inscription</h1>
            <br/><br/><br/>
            </div>
            <div class="inscription" >
               
                <form method="POST" action="">
                    <label for="pseudo"> Pseudo :</label>
                    <br>
                    <input type="text" placeholder="Votre pseudo" id="pseudo" value="<?php if(isset($pseudo)){ echo $pseudo; } ?>" name="pseudo"/>

                    <br>
                    <label for="mail"> Mail : </label>
                    <br>
                    <!-- le value php sert à retenir les pseudo entrés par l'utilisateur -->
                    <input type="email" placeholder="Votre mail" id="mail" value="<?php if(isset($mail)){ echo $mail; } ?>" name="mail"/>
                    <br>
                    <label for="mail2"> confirmation du Mail : </label>
                    <br>

                    <input type="email" placeholder="Confirmer votre adresse mail" id=mail2 value="<?php if(isset($mail2)){ echo $mail2; } ?>" name="mail2"/>
                    <br>
                    <label for="mdp"> mot de passe : </label>
                    <br>
                    <input type="password" placeholder="Votre mot de passe" id=mdp name="mdp"/>
                    <br>
                    <label for="mdp2"> Confirmation du mot de passe : </label>
                    <br>
                    <input type="password" placeholder="Confirmer votre mot de passe" id=mdp2 name="mdp2"/>
                    <br/><br>
                    <button type="submit" name="forminscription" value="je m'inscris">Valider</button>
                </form>
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