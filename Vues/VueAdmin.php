<!DOCTYPE html>
<html lang="fr">
	<?php include("Header.php")?>
	<head>
		<met charset="UTF-8"/>
		<title>Accueil</title>
		<link rel="stylesheet" type="text/css" href="<?='Vues/style.css'?>" media="screen"/>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
	</head>
	<section class="p-3 mb-2 bg-dark text-white">
		<div class="BoxTable">
			<table class="table table-light table-hover">
					<h1>Flux :</h1>
					<thead>
						<tr>
							<th scope="col">Flux</th>
							<th scope="col">Date de dernière mise à jour</th>
							<th scope="col">Supprimer</th>
						</tr>
					</thead>
					<tbody>
						<?php 
							if(isset($rep)){
								foreach ($rep as $value) { ?>
						<tr>
							<th scope="row"><?php echo $value->titre; ?></th>
							<td><?php echo $value->dateDerMaj; ?></td>
							<td>
								<a href="<?= 'index.php?action=supprimer&flux=' .$value->titre?>"> supp </a>
							</td>
							
						</tr>
					<?php 
							}} ?>
					</tbody>
				</table>
				<form method="post" action="<?= 'index.php?action=ajouter'?>">
					<p>
						<label for="pseudo">Nom du flux à ajouter :</label>
						<input class="form-control" type="texte" name="flux" id="flux" size="100" maxlength="100" required /><br/></br>
						<input type="submit" value="Ajouter" name="valid" />
					</p>
				</form>
				<form method="post" action="<?= 'index.php?action=modifNbNews'?>">
					<p>
						<label for="pseudo">Nombre de News par page :</label>
						<input class="form-control" type="texte" name="nbNews" id="nbNews" size="150" maxlength="150" required /><br/></br>
						<input type="submit" value="Valider" name="valid" />
					</p>
				</form>
			</div>
		</section>
	</body>
	<footer>
		<p>Viton Antoine, Coudour Adrien, Dut informatique Groupe 7</p>
	</footer>
</html>