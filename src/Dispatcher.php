<?php

class Dispatcher{
	/**
	 * Reference to a class that process the redirects
	 * @var IRedirect
	 */
	private $_classMapping;

	/**
	 * Reference to a class that process the views
	 * @var IView
	 */

	private $_viewProcessor;

	/**
	 * A hash map of redirections
	 * @var associative array
	 */
	private $_mappings;

	private static $URL_SEPARATOR = '/';


	public function __construct($mapping) {
		$this->_mapping = $mapping;
   	}


	/**
	 * Decides what action should be performed based on the input argument
	 * @param String $paramStr a string that was provided as a parameter
	 */
	public function dispatchBy($paramStr){
		$params = $this->split($paramStr, self::$URL_SEPARATOR);
		if (count($params) == 0){
			$this->renderDefault();
		} else {
			$firstParam = array_shift($params);
			if (array_key_exists($firstParam, $this->_mapping)){
				$className = $this->_mapping[$firstParam];
				if (class_exists($className)){
					$instance = new $className;
					$instance->render($params);
				} else {
					echo $paramStr . " class $className DOES NOT exist!";
				}
			} else {
				echo "value for the key $firstParam does not exist";
			}
		}

	}


	/**
	 * Renders a "file not found" page.
	 * @param Array $params list of parameters with which the resoure is requested
	 */
	public function render404($params){
		echo "page not found";
		echo var_dump($params);
	}

	/**
	 * Splits the string by delimiter.
	 * @param  String $str       string to split
	 * @param  String $delimiter string by which to split $str
	 * @return array
	 */
	private function split($str, $delimiter){
		return is_string($str) ? explode($delimiter, $str) : [];
	}

}