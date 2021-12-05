<!DOCTYPE html>
<html lang="fr">
	<?php include("Header.php")?>
	<head>
		<met charset="UTF-8"/>
		<title>Accueil</title>
		<link rel="stylesheet" type="text/css" href="<?= $base_url . 'Vues/style.css'?>" media="screen"/>
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
						</tr>
					</thead>
					<tbody>
						<?php 
							if(isset($rep)){
								foreach ($rep as $value) { ?>
						<tr>
							<th scope="row"><?php echo $value->titre; ?></th>
							<td><?php echo $value->dateDerMaj; ?></td>
							
						</tr>
					<?php 
							}} ?>
						<!--<tr>
							<th scope="row">2</th>
							<td>Jacob</td>
							<td>Thornton</td>
							<td>@fat</td>
						</tr>
						<tr>
							<th scope="row">3</th>
							<td colspan="2">Larry the Bird</td>
							<td>@twitter</td>
						</tr>-->
					</tbody>
				</table>
			</div>
		</section>
	</body>
	<footer>
				<p>Viton Antoine Dut informatique groupe7</p>
	</footer>
</html>