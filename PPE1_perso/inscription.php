<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="shortcut icon" href="logo.png" />
	<link rel="stylesheet" href="CSS.css">
	<title>page d'inscription</title>
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
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-3"></div>
			<div class="col-md-6 panel panel-blue">
				<form action="traitIns.php" method="post">
					<label for="email">your mail</label> 
					<input type="email" name="email" required><br>
					<label for="nname">your name</label> 
					<input type="text" name="nname" required><br>
					<label for="surname">your surname</label> 
					<input type="text" name="surname" required><br>
					<label for="address">your address</label> 
					<input type="text" name="address" required><br>
					<label for="mdp">your password</label> 
					<input type="password" name="mdp" required><br>
					<select name="role" required>
						<option value="" selected disabled>--Please choose an option--</option>
						<option value="profs">prof</option>
						<option value="users">student</option>
					</select><br>
					<input type="number" name="op" value="0" hidden>
					<input type="submit">
				</form>
			</div>
			<div class="col-md-3"></div>
		</div>
	</div>
</body>
</html>