<html lang="fr">
		<?php include("Header.php")?>
		<met charset="UTF-8"/>
		<title>Accueil</title>
		<link rel="stylesheet" type="text/css" href="style.css" media="screen"/>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
	</head>
			<main>
				<h1>Connexion en tant qu'admin : </h1>
				<form method="post" action="verif.php">
					<p>
						<label for="pseudo">Pseudo</label>
						<input type="texte" name="name" id="name" size="30" maxlength="25" required /><br/></br>
						<label for="mdp">Mot de passe :</label>
						<input type="password" name="mdp" id="mdp" size="30" maxlength="25" required /><br/></br>
						<input type="submit" value="Connexion" name="valid" />
					</p>
				</form>
			</main>
			<footer>
				<p>Viton Antoine Dut informatique groupe7</p>
			</footer>	
		</div>	
	</body>
</html>