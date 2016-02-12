<?php
namespace AdvLite;

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

	// private static URL_SEPARATOR = '/';


	public function __construct($mapping) {
		$this->_mapping = $mapping;
   	}


	/**
	 * Decides what action should be performed based on the input argument
	 * @param String $paramStr a string that was provided as a parameter
	 */
	public function dispatchBy($paramStr){
		$className = 'Image';
		if (class_exists($className)){
			echo $paramStr . " class $className exists!";
		} else {
			echo $paramStr . " class $className DOES NOT exist!";
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

}