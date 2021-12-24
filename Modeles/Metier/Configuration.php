<?php
	class Configuration{
		private $idElemConfig;
		private $nomElemConfig;
		private $config;

		public function __construct($idElemConfig, $nomElemConfig, $config){
			$this->idElemConfig = $idElemConfig;
			$this->nomElemConfig = $nomElemConfig;
			$this->config = $config;
		}

		public function __toString(){
			return $this->idElemConfig." ".$this->nomElemConfig." ".$this->config;
		}

		public function __get($name){
			switch ($name) {
				case 'idElemConfig':
					return $this->idElemConfig;
					break;
				case 'nomElemConfig':
					return $this->nomElemConfig;
					break;
				case 'config':
					return $this->config;
					break;
				default:
					return null;
					break;
			}
		}

	}
		
?>