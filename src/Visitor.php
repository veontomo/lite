<?php

class Visitor {

	/**
	 * visitor track code
	 * @var string
	 */
	public $trackCode;

	/**
	 * resource that the visitor has asked
	 * @var string
	 */
	public $resource;

	/**
	 * visitor's ip
	 * @var string
	 */
	public $ip;

	/**
	 * Visitor's browser
	 * @var String
	 */
	public $userAgent;

	/**
	 * Time when the visitor has requested the resource
	 * @var String
	 */
	public $time;

	/**
	 * url to which user should be redirected
	 * @var string
	 */
	public $redirectTo;

	private $connection;


	public function store(){
		$dbConfig = require('dbconfig.php');
		if ($this->connectToDb($dbConfig)){
			$query = "INSERT INTO visitor (ip, user_agent, resource, param, redirect, time, trackCode) VALUES (:ip, :user_agent, :resource, :param, :redirect, :time, :trackCode)";
			$sth = $this->connection->prepare($query);
			$sth->bindValue(':ip', $this->ip, PDO::PARAM_STR);
			$sth->bindValue(':user_agent', $this->userAgent, PDO::PARAM_STR);
			$sth->bindValue(':resource', $this->resource, PDO::PARAM_STR);
			$sth->bindValue(':param', isset($this->param) ? $this->param : NULL, PDO::PARAM_STR);
			$sth->bindValue(':redirect', $this->redirectTo, PDO::PARAM_STR);
			$sth->bindValue(':time', $this->time, PDO::PARAM_STR);
			$sth->bindValue(':trackCode', $this->trackCode, PDO::PARAM_STR);
			if ($sth->execute()){
				echo "inserted";
			} else {
				echo "not inserted";
			}



		} else {
			echo "failed to connect";
		}




	}


	/**
	 * Connects to a db
	 * @param  Array $config parameters of the connection to the database
	 * @return Boolean         true if the connection is successful, false otherwise
	 */
	private function connectToDb($config){
		try {
			$this->connection = new PDO($config['dsn'], $config['userName'], $config['pswd']);
			if (mysqli_connect_errno()){
				echo 'Failed to connect to the database: ' . mysqli_connect_error() . "\n";
				$this->connection = null;
			}
		} catch (PDOException $e){
			echo $e->getMessage() . "\n";
		}

		return !($this->connection == null);


	}



}