<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>nouvelle incritpion</title>
</head>
<body>
	<?php 
		try {
			$bdd = new PDO('mysql:host=localhost;dbname=cours_domicile','root','toor');
		} catch (Exception $e) {
			die('Erreur : '.$e->getMessage());
		}
		session_start();
		$email=$_POST['email'];
		$mdp=$_POST['mdp'];
		$role=$_POST['role'];
		if ($role=="profs") {
			$mailbdd="SELECT * FROM profs WHERE (email='$email' AND mdp='$mdp')";
			$resultmail=$bdd->query($mailbdd);
			if($data = $resultmail->fetch()) {
				$_SESSION['role']="profs";
				$_SESSION['num']=$data['nump'];
				$_SESSION['op']=0;
				header('Location: index.php');
				exit();
			}
			else
				echo "wrong mail address or password";
		}
		else if ($role=="users") {
			$mailbdd="SELECT * FROM users WHERE (email='$email' AND mdp='$mdp')";
			$resultmail=$bdd->query($mailbdd);
			if($data = $resultmail->fetch()) {
				$_SESSION['role']="users";
				$_SESSION['num']=$data['num'];
				$_SESSION['op']=$data['permission'];
				header('Location: index.php');
				exit();
			}
			else
				echo "wrong mail address or password";
		}
	?>
</body>