<?php

	//require('Modeles/Gateway/FluxGateway.php');
	//require('Modeles/Gateway/NewsGateway.php');
	//require('Modeles/Metier/News.php');
	require_once('Modeles/Metier/Admin.php');
	require_once('Modeles/Gateway/AdminGateway.php');
	require('Modeles/Connection.php');
	require('Config/config.php');


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

	$gAdmin= new AdminGateway($connect);
	$res=$gAdmin->selectionnerUnAdmin('anviton', "antoine1$$");
	echo $res;

?>