<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="shortcut icon" href="logo.png" />
	<link rel="stylesheet" href="CSS.css">
	<title>new lesson</title>
</head>
<body>
	<header>
		<a href="index.php">HOME</a>
		<a href="inscription.php">inscrition</a>
		<a href="mylessons.php">lessons</a>
		<a href="newlessons.php">New Lessons</a>
		<a href="connexion.php">Connexion</a>
		<a href="deco.php">Déconnexion</a>
		<a href="contact.php">Contact</a>
	</header>
	<?php 
		session_start();
		try {
			$bdd = new PDO('mysql:host=localhost;dbname=cours_domicile','root','toor');
		} catch (Exception $e) {
			die('Erreur : '.$e->getMessage());
		}
		$datecours = $_POST['datecours'];
		$startcours = $_POST['startcours'];
		$durcours = $_POST['durcours'];
		$mat = $_POST['mat'];
		$prof = $_POST['prof'];
		$user = $_POST['user'];
		$res=$bdd->prepare('INSERT INTO lessons (dateL,prof, client,subject, start, duration, validation) VALUES(:VdateL,:Vprof,:Vclient,:Vsubject, :Vstart, :Vduration, :Vvalidation)');
		$res->bindValue(':VdateL',$datecours );
		$res->bindValue(':Vprof', $prof);
		$res->bindValue(':Vclient', $user);
		$res->bindValue(':Vsubject', $mat);
		$res->bindValue(':Vstart', $startcours);
		$res->bindValue(':Vduration', $durcours);
		$res->bindValue(':Vvalidation', '0');
		$res->execute();
		header('Location: index.php');
	?>
</body>
</html>