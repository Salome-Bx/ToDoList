<?php

namespace DbConnexion;

class DbConnexion // classe qui permet de se connecter à la BDD
{
	private $host   = "localhost";
	private $login  = "todolist";
	private $pass   = "todolist";
	private $bdd    = "todolist";
	private $pdo;

	function __construct()
	{
        // Php Data Requete sert à la connexion avec mySQL
		try {
			$this->pdo = new \PDO("mysql:host={$this->host};dbname={$this->bdd};charset=utf8", $this->login, $this->pass);
		} catch (\PDOException $e) {
			die("Service indisponible");
		}
	}

	public function getPDO()  
	{
		return $this->pdo;
	}
}
