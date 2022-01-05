<?php
/**
 * Classe du model de la configuration
 * @package  Modeles
 * @author Antoine Viton, Adrien Coudour
 */
class Connection extends PDO { 

private $stmt;
private $connection;
/**
 * Constructeur de la classe connection
 * @param string $dsn Lien en direction de la base de donnée
 * @param string $username Pseudonyme de la base de donnée
 * @param string $password Mot de passe de la base de donnée
 */
private function __construct(string $dsn, string $username, string $password) { 

    parent::__construct($dsn,$username,$password); 
    $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} 
/**
 * Getter de l'instance de connexion
 * @return Connection $connection retourne une instance de connexion
 */
public static function getInstance(){
    if ($connection ?? null == null) {
        global $login, $dbs, $mdp;
        $connection = new Connection($dbs, $login, $mdp);
    }
    return $connection;
}

/** 
 * Méthode d'execution de l'ordre
* @param string $query 
* @param array $parameters paramètre de l'ordre
* @return bool Returns `true` en cas de succès, `false` sinon 
*/ 

public function executeQuery(string $query, array $parameters = []) : bool{ 
	$this->stmt = parent::prepare($query); 
	foreach ($parameters as $name => $value) { 
	 $this->stmt->bindValue($name, $value[0], $value[1]); 
	} 

	return $this->stmt->execute(); 
}
/**
 * Méthode de récupération de la connection
 * @return array Liste de la connection
 */
public function getResults() : array {
	return $this->stmt->fetchall(PDO::FETCH_ASSOC);

}
}

?>
