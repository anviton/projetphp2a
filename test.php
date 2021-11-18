<?php

	require('Modeles/Gateway/FluxGateway.php');
	require('Config/Connection.php');
	require('Config/config.php');


	//$user="anviton";
	//$pass="VitonMyAdmin";
	$connect= new Connection($dbs, $login, $mdp);

	$gFlux= new FluxGateway($connect);
	//$gFlux->ajoutrerUnFlux("https://www.linternaute.com/rss/");
	$res=$gFlux->listerTousLesFlux();
	foreach ($res as $value) {
		echo $value."<br/>";
	}
?>