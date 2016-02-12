<?php
class Redirect {
	/**
	 * A hash map of mappings
	 * @var associative array
	 */
	private $_mappings;

	/**
	 * an url to which th evisitro should be redirected
	 * @var String
	 */
	private $_redirectTo;

	/**
	 * the resource requested by the visitor
	 * @var string
	 */
	private $_resource;

	/**
	 * visitor's tracking code
	 * @var string
	 */
	private $_trackCode;

	public function __construct(){
		$this->_mappings = require('mappings.php');
	}


	private function calculateRedirect($arr){
		$str = implode('/', $arr);

	}

	/**
	 * Calculates the tracking code, the requested resource and the redirect url
	 * @param  Array $arr [description]
	 */
	private function dispatch($arr){
		// if the path contains three elements and more, then the second one from the end
		// is a tracking code
		$separator = '/';
		$size = count($arr);
		if ($size > 2){
			$this->_trackCode = $arr[$size - 1];
			$this->_resource = implode($separator, array_slice($arr, 0, -1));
		} else {
			$this->_resource = implode($separator, array_slice($arr, 0));
		}
		if (array_key_exists($this->_resource, $this->_mappings)){
			$this->_redirectTo = $this->_mappings[$this->_resource];
		} else {
			echo "no key {$this->_resource} in the mappings";
		}

	}


	public function render($arr){
		$this->dispatch($arr);
		// if the path contains three elements and more, then the second one from the end
		// is a tracking code
		if (isset($this->_trackCode)){
			$visitor = new Visitor();
			$visitor->trackCode = $this->_trackCode;
			$visitor->resource = $this->_resource;
			$visitor->ip = $_SERVER['REMOTE_ADDR'];
			$visitor->userAgent = $_SERVER['HTTP_USER_AGENT'];
			$visitor->time = date('Y-m-d H:i:s', $_SERVER['REQUEST_TIME']);
			$visitor->redirectTo = $this->_redirectTo;
			$visitor->store();
		}
		if (isset($this->_redirectTo)){
			header('location: ' . $this->_redirectTo);
			// echo('location: ' . $this->_redirectTo);
		} else {
			echo "file not found";
		}

	}


}