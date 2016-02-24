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
	 * Array of parameters to pass to the url to which it should be redirected
	 * @var Array
	 */
	private $_params;

	/**
	 * visitor's tracking code
	 * @var string
	 */
	private $_trackCode;

	private $_logger;

	public function __construct(){
		$this->_mappings = require('mappings.php');
		$this->_logger = new Logger();
	}


	private function calculateRedirect($arr){
		$str = implode('/', $arr);

	}

	/**
	 * Calculates the tracking code, the requested resource and the redirect url (along with eventual parameters)
	 * @param  Array $arr [description]
	 */
	private function dispatch($arr){
		// Format: campaign-name/target
		//         campaign-name/target/trackCode
		//         campaign-name/target/trackCode/param1
		//         campaign-name/target/trackCode/param1/param2/
		$separator = '/';
		$size = count($arr);
		if ($size > 1){
			$this->_resource = implode($separator, array_slice($arr, 0, 2));
		}
		if ($size > 2){
			$this->_trackCode = $arr[2];

		}
		if ($size > 3) {
			$this->_params = array();
			for ($i = 3; $i < $size; $i++){
				$this->_params['$' . ($i - 2)] = $arr[$i];
			}
		}

		if (array_key_exists($this->_resource, $this->_mappings)){
			$rawUrl = $this->_mappings[$this->_resource];
			if ($this->_params){
				$rawUrl = str_replace(array_keys($this->_params), array_values($this->_params), $rawUrl);
			}
			$this->_redirectTo = $rawUrl;
		}
	}


	/**
	 * Renders a page based on input array.
	 *
	 * Stores all the requests.
	 * @param  Array $arr array of strings corresponding to requested resourses
	 */
	public function render($arr){
		$this->dispatch($arr);
		$visitor = new Visitor();
		$visitor->trackCode = isset($this->_trackCode) ? $this->_trackCode : null;
		$visitor->resource = $this->_resource;
		$visitor->ip = $_SERVER['REMOTE_ADDR'];
		$visitor->userAgent = $_SERVER['HTTP_USER_AGENT'];
		$visitor->time = date('Y-m-d H:i:s', $_SERVER['REQUEST_TIME']);
		$visitor->redirectTo = $this->_redirectTo;
		$visitor->store();

		if (isset($this->_redirectTo)){
			header('location: ' . $this->_redirectTo);
		} else {
			$this->_logger->logInfo(__METHOD__, "there is no mapping for {$this->_resource}.");
		}

	}


}