<?php

class Logger {
	/**
	 * log file name
	 * @var String
	 */
	private $_fileName;

	public function __construct(){
		$this->_fileName = __DIR__ . DIRECTORY_SEPARATOR . 'advlite.log';
	}

	private function log($level, $origin, $text){
		$content = date('Y-m-d H:i:s ') . $level . ' ' .$origin . ' ' . $text . "\n\n";
		file_put_contents($this->_fileName, $content, FILE_APPEND);
	}

	public function logException($origin, $text){
		$this->log("Exception", $origin, $text);
	}

	public function logInfo($origin, $text){
		$this->log("Info", $origin, $text);
	}
}