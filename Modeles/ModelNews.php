<?php

	/**
	 * Classe du model de la configuration
	 * @package  Modeles
	 * @author Antoine Viton, Adrien Coudour
	 */
	class ModelNews{


		/**
		 * Méthode permettant de récupérer toutes les news
		 * Connection à la base de donnée
		 * Récupération de toutes les news
		 * @return array liste de toutes les news
		 */
		public function get_ToutesLesNews():array{
			$connect = Connection::getInstance();
			$gNews = new NewsGateway($connect);
			$res = $gNews->listerToutesLesNews();
			return $res;
		}
		/**
		 * Méthode permettant de récupérer les news d'une page
		 * Connection à la base de donnée
		 * @param int $numPageNews Page où ce trouve l'utilisateur
		 * @return array liste des news de la page
		 */
		public function getNewsPage($numPageNews) : array {
			$connect = Connection::getInstance();
			$gNews = new NewsGateway($connect);
			$res = $gNews->listerLesNewsDeLaPage($numPageNews);
			return $res;
		}
		/**
		 * Méthode permettant de connaître le nombre de News
		 * Connection à la base de donnée
		 * @return int Nombre de news 
		 */
		public function nombreDeNews(): int{
			$connect = Connection::getInstance();
			$gNews = new NewsGateway($connect);
			$res = $gNews->compterLesNews();
			return $res;
		}
		/**
		 * Méthode permettant de supprimer une news
		 * Connection à la base de donnée
		 * Suppression de la news concernée
		 * @param $int id de la news à supprimer
		 */
		public function supprimerNews($id){
			$connect = Connection::getInstance();
			$gNews = new NewsGateway($connect);
			$gNews->supprimerLesNewsDUnFlux($id);
		}

	//fin modèles
	}