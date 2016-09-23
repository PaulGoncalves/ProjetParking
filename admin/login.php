<?php require 'databases.php'; ?>
<?php session_start(); ?>

	<body>
	<h3>Se connecter</h3>
		<?php
		if (isset($_POST) && !empty($_POST)) 
		{
			if (!empty(htmlspecialchars(($_POST['email'])))  AND !empty(htmlspecialchars(($_POST['mdp']))))
			{
				$requete = $bdd->prepare('SELECT * FROM client WHERE email = :email AND mdp = :mdp');
				$requete->execute([

					'email' => $_POST['email'],
					'mdp' => $_POST['mdp']		

				]);

				$user = $requete->fetchObject();
				if ($user) 
				{
					$_SESSION['admin'] = $_POST['email'];
					header('Location: index1.php');
				}
				else{
					$error ='Identifiants incorrectes';
				}
			}
			else{
				$error ='Veuillez remplir tous les champs!';
			}
		
			if (isset($error)) {
				echo '<div class="error>'.$error.'</div>"';
			}
		}

		?>
		<?php
			if (!$_SESSION['admin']) {
				$error="Identifiants incorrectes";
				header('Location: login.php');
			}
			?>
		<form action="login.php" method="POST">
			<input type="text" name="email" placeholder="votre email"/>
			<input type="password" name="mdp" placeholder="votre mot de passe"/>
			<button>se connecter</button>			
		</form>
	</body>
</html>