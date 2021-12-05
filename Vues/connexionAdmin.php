<html lang="fr">
		<?php include("Header.php")?>
		<met charset="UTF-8"/>
		<title>Accueil</title>
		<link rel="stylesheet" type="text/css" href="<?= $base_url . 'Vues/style.css'?>" media="screen"/>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
	</head>
		<main>
			<div class="Box">
			<section class="p-3 mb-2 bg-dark text-white">
				<h1>Connexion en tant qu'admin : </h1>
				<div class="form-group">
					<?php if (isset($dVueEreur)) {
					foreach ($dVueEreur as $value) { ?>
					<p><?= $value ?></p>
					<?php }} ?>
					<form method="post" action="<?= $base_url . 'Controleurs/ControleurUser.php?action=tentativeConnexion'?>">
						<p>
							<label for="pseudo">Pseudo</label>
							<input class="form-control" type="texte" name="pseudo" id="pseudo" size="30" maxlength="25" required /><br/></br>
							<label for="motDePasse">Mot de passe :</label>
							<input class="form-control" type="password" name="motDePasse" id="motDePasse" size="30" maxlength="25" required /><br/></br>
							<input type="submit" value="Connexion" name="valid" />
						</p>
					</form>
				</div>
			</section>
		</div>
		</main>
			<footer>
				<p>Viton Antoine Dut informatique groupe7</p>
			</footer>	
		</div>	
	</body>
</html>