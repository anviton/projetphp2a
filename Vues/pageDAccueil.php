<!DOCTYPE html>
<html lang="fr">
		<?php include("Header.php")?>
		<met charset="UTF-8"/>
		<title>Accueil</title>
		<link rel="stylesheet" type="text/css" href="style.css" media="screen"/>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
	</head>
		<table class="table table-dark table-hover">
			News :
			<thead>
				<tr>
					<th scope="col">Date et Heure</th>
					<th scope="col">Site</th>
					<th scope="col">Titre</th>
					<th scope="col">Description</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($rep as $value) { ?>
				<tr>
					<th scope="row"><?php echo $value->heure; ?></th>
					<td><?php echo $value->site; ?></td>
					<td><?php echo $value->titre; ?></td>
					<td><?php echo $value->description; ?></td>
				</tr>
			<?php } ?>
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
	</body>
	<footer>
				<p>Viton Antoine Dut informatique groupe7</p>
	</footer>
</html>