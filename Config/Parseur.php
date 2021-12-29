<?php
	
	/**
	 * 
	 */

	require_once(__DIR__.'/../Modeles/Metier/News.php');
	class Parseur{
		

		function parser($lien, $idFlux) : array{
			//var_dump($lien);
			$xml = simplexml_load_file($lien);
			//var_dump($xml->channel->item);
			$tuple = array();
			$dateMajFlux = $xml->channel->pubDate;
			//$dateMajFlux = '12-12-2021';
			$listeNews = array();
			foreach($xml->channel->item as $key){
				$newsTitre = $key->title;
				$newsSite = $key->link;
				$newsDescription = $key->description;
				$newsDatePub = $key->pubDate;
				$newsFkidNews = $idFlux;
				$news = new News($newsDatePub, $newsTitre, $newsSite, $newsDescription, $newsFkidNews);
				$listeNews[] = $news;
			}
			$tuple[] = $dateMajFlux;
			$tuple[] = $listeNews;
			return $tuple;
		}

	}