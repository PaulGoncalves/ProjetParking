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
<html>
<head>
	<title>Park'in</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="icon" type="image/png" href="img/favicon.png" />
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src='https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js'></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="js/jquery.js"></script>
	<script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
</head>
<body>
	
</body>
</html>