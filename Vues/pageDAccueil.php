<!DOCTYPE html>
<html lang="fr">
		<?php include("Header.php")?>
		<met charset="UTF-8"/>
		<title>Accueil</title>
		<link rel="stylesheet" type="text/css" href="<?= $base_url . 'Vues/style.css'?>" media="screen"/>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
	</head>
		<section class="p-3 mb-2 bg-dark text-white">
			<div class="BoxTable">
				<table class="table table-light table-hover">
					<h1>News :</h1>
					<thead>
						<tr>
							<th scope="col">Date et Heure</th>
							<th scope="col">Site</th>
							<th scope="col">Titre</th>
							<th scope="col">Description</th>
						</tr>
					</thead>
					<tbody>
						<?php 
							if(isset($rep)){
								foreach ($rep as $value) { ?>
						<tr>
							<th scope="row"><?php echo $value->heure; ?></th>
							<td><?php echo $value->site; ?></td>
							<td><?php echo $value->titre; ?></td>
							<td><?php echo $value->description; ?></td>
						</tr>
					<?php 
							}} ?>
					</tbody>
				</table>
			</div>
		</section>
	</body>
	<footer>
				<p>Viton Antoine, Coudour Adrien, Dut informatique groupe7</p>
	</footer>
</html>