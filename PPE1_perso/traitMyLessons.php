<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="shortcut icon" href="logo.png" />
	<link rel="stylesheet" href="CSS.css">
	<title>page my lessons</title>
</head>
<body>
	<?php 
		try {
			$bdd = new PDO('mysql:host=localhost;dbname=cours_domicile','root','toor');
		} catch (Exception $e) {
			die('Erreur : '.$e->getMessage());
		}
		$codeL = $_REQUEST['num'];
		$myreq = "UPDATE 'lessons' SET 'validation' = '1' WHERE 'lessons'.'lessonsid' = ".$codeL;
		$bdd->query($myreq);
		echo "fait";
		header('Location: mylessons.php');
	?>
</body>
</html>