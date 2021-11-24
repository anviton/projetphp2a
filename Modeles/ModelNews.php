<?php

	namespace modeles;

	class ModeleNews{

		//constructeur
		//vide


		function get_ToutesLesNews() :string
		{
			$connect= new Connection($dbs, $login, $mdp);
			$gNews= new NewsGateway($connect);
			$res=$gNews->listerToutesLesNews();
			return $res;
		}

	//fin modèles
	}