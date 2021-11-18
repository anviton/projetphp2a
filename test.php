<?php

	require('Modeles/Gateway/FluxGateway.php');
	require('Config/Connection.php');

	$user="anviton";
	$pass="VitonMyAdmin";
	$connect= new Connection("mysql:host=localhost;dbname=dbanviton", $user, $pass);

	$gFlux= new FluxGateway($connect);
	//$gFlux->ajoutrerUnFlux("https://www.linternaute.com/rss/");
	$res=$gFlux->listerTousLesFlux();
	foreach ($res as $value) {
		echo $value."<br/>";
	}
?>