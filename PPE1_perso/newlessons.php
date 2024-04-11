<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="shortcut icon" href="logo.png" />
	<link rel="stylesheet" href="CSS.css">
	<title>Nouveau cours</title>
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
		if (isset($_SESSION['num'])&&$_SESSION['role']=='users') {
			try {
				$bdd = new PDO('mysql:host=localhost;dbname=cours_domicile','root','toor');
			} catch (Exception $e) {
				die('Erreur : '.$e->getMessage());
			}
			?>
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-3"></div>
						<div class="col-md-6 panel panel-blue">
							<form action="traiNewL.php" method="post">
								<h1>Nouveau cours</h1>
								<label for="datecours">Entrez la date voulue du cours</label><br>
								<input type="date" name="datecours"><br>
								<label for="startcours">Entrez l'heure voulue du cours</label><br>
								<input type="time" name="startcours"><br>
								<label for="durcours">Entrez la durée voulue du cours</label><br>
								<input type="time" name="durcours"><br>
								<label for="mat">Entrez le sujet du cours</label><br>
								<input type="text" name="mat"><br>
								<label for="prof">Choississez le professeur que vous souhaitez</label><br>
								<select name='prof' required>
									<option value="" selected disabled>----</option>
									<?php
										$profs=$bdd->query("SELECT * FROM profs");
										$prof = $profs->fetch();
										while ($prof) {
											echo "<option value='".$prof['nump']."'>".$prof['nameP']." ".$prof['surname']."</option>";
											$prof = $profs->fetch();
										}
									?>
								</select><br><br>
								<input type="text" name="user" value="<?php echo $_SESSION['num'] ?>" hidden>
								<input type="submit">
							</form>
						</div>
					</div>
				</div>
			</div>
			<?php
		}else {
			echo "<a href='connexion.php'>veuillez vous connecter en tant qu'élève</a>";
		}
	 ?>
</body>
</html>