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
			echo "connected";
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