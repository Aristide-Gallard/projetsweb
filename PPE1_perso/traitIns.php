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
		$nname=$_POST['nname'];
		$surname=$_POST['surname'];
		$address=$_POST['address'];
		$password=$_POST['mdp'];
		$role=$_POST['role'];
		$op=$_POST['op'];
		

		if ($role=="profs") {
			$mailbdd="SELECT email FROM profs WHERE (email='$email')";
			$resultmail=$bdd->query($mailbdd);
			if($data = $resultmail->fetch()) {
				echo "vous avez déjà un compte";
			}
			else {
				$res=$bdd->prepare('INSERT INTO profs (email,nameP,surname,address,mdp) VALUES(:Vemail,:VnameP,:Vsurname,:Vaddress,:Vmdp)');
				$res->bindValue('Vemail', $email);
				$res->bindValue('VnameP', $nname);
				$res->bindValue('Vsurname', $surname);
				$res->bindValue('Vaddress', $address);
				$res->bindValue('Vmdp', $password);
				$res->execute();
				header('Location: index.php');
			}
		}
		if ($role=="users") {
			$mailbdd="SELECT email FROM profs WHERE (email='$email')";
			$resultmail=$bdd->query($mailbdd);
			if($data = $resultmail->fetch()) {
				echo "vous avez déjà un compte";
			}
			else {
				$res=$bdd->prepare('INSERT INTO users (email,nameU,surname,address,mdp,permission) VALUES(:Vemail,:VnameP,:Vsurname,:Vaddress,:Vmdp,:Vpermission)');
				$res->bindValue('Vemail', $email);
				$res->bindValue('VnameP', $nname);
				$res->bindValue('Vsurname', $surname);
				$res->bindValue('Vaddress', $address);
				$res->bindValue('Vmdp', $password);
				$res->bindValue('Vpermission', $op);
				$res->execute();
				header('Location: index.php');
			}
		}
	 ?>
</body>
</html>