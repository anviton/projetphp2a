<?php  
/**
 * Charger les fichiers, définit le controlleur ainsi que la configuration
 * @author Antoine Viton , COUDOUR Adrien
 */
	require_once(__DIR__.'/Config/config.php');
	require_once(__DIR__.'/Config/Autoload.php');
	Autoload::charger();
	$cont = new FrontControleur();

?>