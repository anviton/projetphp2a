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
	$gflux = new FluxGateway($connect);
	$lesFlux = $gflux->listerTousLesFlux();
	//var_dump($lesFlux);
	foreach($lesFlux as $flux){
		$tuple = $pars->parser($flux->titre, $flux->idFlux);
		//$date = date_create($tuple[0]);
		var_dump($tuple[0]);
		$newDate = DateTime::createFromFormat('D, d M Y H:i:s P', $tuple[0]);
		$newDate = $newDate->format('Y-m-d H:i:s');
		//var_dump($newDate);
		//var_dump($newDate);
			//echo "Coucou";
			$gflux->mettreAjourUnflux($flux->titre, $newDate);
			$listeNews = array_reverse($tuple[1]);
			foreach ($listeNews as $value) {
				$nDate = DateTime::createFromFormat('D, d M Y H:i:s P', $value->heure);
				$nDate = $nDate->format('Y-m-d H:i:s');
				if ($flux->dateDerMaj < $nDate) {
					$gNews->ajouterUneNews($nDate, $value->titre, $value->site, $value->description, $value->fkIdFlux);
				}
			}
	}
?>