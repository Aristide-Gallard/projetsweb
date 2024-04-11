<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="shortcut icon" href="logo.png" />
	<link rel="stylesheet" href="CSS.css">
	<title>page d'Acceuil</title>
</head>
<body>
	<?php 
		session_start();
	?>
	<header>
		<a href="index.php">HOME</a>
		<a href="inscription.php">inscrition</a>
		<a href="mylessons.php">lessons</a>
		<a href="newlessons.php">New Lessons</a>
		<a href="connexion.php">Connexion</a>
		<a href="deco.php">Déconnexion</a>
		<a href="contact.php">Contact</a>
	</header>
	<h1>Welcome on a website to book online courses</h1>
	<?php 
		try {
			$bdd = new PDO('mysql:host=localhost;dbname=cours_domicile','root','toor');
		} catch (Exception $e) {
			die('Erreur : '.$e->getMessage());
		}
		if (isset($_SESSION['num'])) {
			$num=$_SESSION['num'];
			$mrole=$_SESSION['role'];
			if ($_SESSION['role']=="profs") {
				$myreq="SELECT * FROM profs WHERE (numP='$num')";
				$result=$bdd->query($myreq);
				$data=$result->fetch();
				echo "hello ";
				echo($data["nameP"]);
			}
			else if($mrole=="users") {
				$myreq="SELECT * FROM users WHERE (num='$num')";
				$result=$bdd->query($myreq);
				$data=$result->fetch();
				echo "hello ";
				echo($data["nameU"]);
			}
		}
	 ?>
</body>
</html>