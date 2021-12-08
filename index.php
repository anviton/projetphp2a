<?php  
	//chdir(__DIR__.'/Controleurs');
	require_once(__DIR__.'/Config/config.php');
	//require_once(__DIR__.'/Config/Autoload.php');
	//Autoload::charger();
	//require_once(__DIR__.'/Controleurs/Controleur.php');
	//$cont = new \Controleurs\Controleur();


	require_once(__DIR__.'/Controleurs/FrontControleur.php');
	//$cont = new Controleur();
	$cont = new FrontControleur();

?>