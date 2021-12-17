<?php

	//require('Modeles/Gateway/FluxGateway.php');
	//require('Modeles/Gateway/NewsGateway.php');
	//require('Modeles/Metier/News.php');
	require_once('Modeles/Metier/Admin.php');
	require_once('Modeles/Gateway/AdminGateway.php');
	require_once('Modeles/Gateway/NewsGateway.php');
	require('Modeles/Connection.php');
	require('Config/config.php');
	require('Config/Parseur.php');


	//$user="anviton";
	//$pass="VitonMyAdmin";
	$connect= new Connection($dbs, $login, $mdp);

	/*$gFlux= new FluxGateway($connect);
	//$gFlux->ajoutrerUnFlux("https://www.linternaute.com/rss/");
	$res=$gFlux->listerTousLesFlux();
	foreach ($res as $value) {
		echo $value."<br/>";
		echo $value->titre."<br/>";
	}

	$gNews= new NewsGateway($connect);
	//$news= new News("2021-11-24", "tets", "internaute", "Nouveau test de News", "2");
	//$gNews->ajouterUneNews("2021-11-24", "tets", "internaute", "Nouveau test de News", "2");
	$res=$gNews->listerToutesLesNews();
	foreach ($res as $value) {
		echo $value."<br/>";
		echo $value->idNews;
	}*/

	//$gAdmin= new AdminGateway($connect);
	//$res=$gAdmin->selectionnerUnAdmin('anviton', "antoine1$$");
	//echo $res;

	//$toto = password_hash("antoine1$$", PASSWORD_BCRYPT);
	//var_dump($toto);

	$pars = new Parseur();
	$gNews= new NewsGateway($connect);
	$listeNews = $pars->parser("https://www.lequipe.fr/rss/actu_rss_Football.xml", "2");
	foreach ($listeNews as $value) {
		$gNews->ajouterUneNews($value->heure, $value->titre, $value->site, $value->description, $value->fkIdFlux);
	}


?>