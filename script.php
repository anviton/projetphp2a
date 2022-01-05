<?php

	$connect= Connection::getInstance();

	$pars = new Parseur();
	$gNews= new NewsGateway($connect);
	$gflux = new FluxGateway($connect);
	$lesFlux = $gflux->listerTousLesFlux();
	foreach($lesFlux as $flux){
		$tuple = $pars->parser($flux->titre, $flux->idFlux);
		$newDate = DateTime::createFromFormat('D, d M Y H:i:s P', $tuple[0]);
		$newDate = $newDate->format('Y-m-d H:i:s');
		$gflux->mettreAjourUnflux($flux->titre, $newDate);
		$listeNews = array_reverse($tuple[1]);
		foreach ($listeNews as $value) {
			$nDate = DateTime::createFromFormat('D, d M Y H:i:s P', $value->heure);
			$nDate = $nDate->format('Y-m-d H:i:s');
			if ($flux->dateDerMaj < $nDate) {
				if (strlen($value->description) > 1000) {
					$rest = substr($value->description, 0, 1000);
					$gNews->ajouterUneNews($nDate, $value->titre, $value->site, $rest, $value->fkIdFlux);
				}
				else{
					$gNews->ajouterUneNews($nDate, $value->titre, $value->site, $value->description, $value->fkIdFlux);
				}
			}
		}
	}
?>