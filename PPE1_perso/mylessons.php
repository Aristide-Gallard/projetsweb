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
		if (isset($_SESSION['num'])) {
			try {
				$bdd = new PDO('mysql:host=localhost;dbname=cours_domicile','root','toor');
			} catch (Exception $e) {
				die('Erreur : '.$e->getMessage());
			}
			echo "<style>
					table {
					  font-family: arial, sans-serif;
					  border-collapse: collapse;
					  width: 100%;
					}

					td, th {
					  border: 1px solid #dddddd;
					  text-align: left;
					  padding: 8px;
					}

					tr:nth-child(even) {
					  background-color: #dddddd;
					}
					</style>";
			$num=$_SESSION['num'];
			if ($_SESSION['role']=="profs") {
				$qcours = "SELECT * FROM lessons WHERE (prof='$num')";
				$rep = $bdd ->query($qcours);
				$cours = $rep->fetch();
				if ($cours) {
					echo "<table>";
					echo "<tr><th>date</th><th>Prof</th><th>Client</th><th>Subject</th><th>Start</th><th>Duration</th><th>Validation</th></tr>";
					while ($cours) {
						echo "<tr><td>".$cours['date']."</td><td>".$cours['prof']."</td><td>".$cours['client']."</td><td>".$cours['subject']."</td><td>".$cours['start']."</td><td>".$cours['duration']."</td><td><a href='traitMyLessons.php?num=".$cours['lessonsid']."' title='valider le cours'>".$cours['validation']."</a></td></tr>";
						$cours = $rep->fetch();
					}
					echo "</table>";
				}
			}
			elseif ($_SESSION['role']=="users") {
				$qcours = "SELECT * FROM lessons WHERE (client='$num')";
				$rep = $bdd ->query($qcours);
				$cours = $rep->fetch();
				if ($cours) {
					echo "<table>";
					echo "<tr><th>date</th><th>Prof</th><th>Client</th><th>Subject</th><th>Start</th><th>Duration</th><th>Validation</th></tr>";
					while ($cours) {
						echo "<tr><td>".$cours['date']."</td><td>".$cours['prof']."</td><td>".$cours['client']."</td><td>".$cours['subject']."</td><td>".$cours['start']."</td><td>".$cours['duration']."</td><td>".$cours['validation']."</td></tr>";
						$cours = $rep->fetch();
					}
					echo "</table>";
				}
			}
		}else{
			echo "<a href='connexion.php'>please connect</a>"	;
		}
	?>
</body>
</html>