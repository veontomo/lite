<?php

class Logger {
	/**
	 * log file name
	 * @var String
	 */
	private $_fileName;

	public function __construct(){
		$this->_fileName = dirname(__DIR__) . DIRECTORY_SEPARATOR . 'advlite.log';
	}

	private function log($level, $origin, $text){
		file_put_contents($this->_fileName, date('Y-m-d H:i:s ') . $level . ' ' .$origin . ' ' . $text);
	}

	public function logException($origin, $text){
		log("Exception", $origin, $text);
	}

	public function logInfo($origin, $text){
		log("Info", $origin, $text);
	}
}