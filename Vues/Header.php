<head>
		<meta charset="UTF-8"/>
		<title>Accueil</title>
		<link rel="stylesheet" type="text/css" href="<?= __DIR__ ."/style.css"?>" media="screen"/>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
	</head>
	<body>
		<?php 
		$cache = 'hidden';
		if (isset($_SESSION['role'])) {
			$cache = null;
		}
		?>
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
		  <div class="container-fluid">
		  	 <a class="navbar-brand" href="#">
      			<img src="<?= 'Vues/news.png'?>" alt="" width="90" height="72" class="d-inline-block align-text-top">
    		</a>
		    <a class="navbar-brand" href="#">Menu :</a>
		    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
		      <span class="navbar-toggler-icon"></span>
		    </button>
		    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
		      <div class="navbar-nav">
		        <a class="nav-link active" aria-current="page" href="<?= 'index.php'?>">Accueil</a>
		        <a class="nav-link" href="<?= 'index.php?action=connexion'?>">Admin</a>
		        <a class="nav-link" <?= $cache ?> href="<?= 'index.php?action=deconnexion'?>">Deconnexion</a>
		        <a class="nav-link disabled"></a>
		      </div>
		    </div>
		  </div>
		</nav>