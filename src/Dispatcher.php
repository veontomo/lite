<?php
namespace AdvLite;

class Dispatcher{
	/**
	 * Reference to a class that process the redirects
	 * @var IRedirect
	 */
	private $_redirectProcessor;

	/**
	 * Reference to a class that process the views
	 * @var IView
	 */

	private $_viewProcessor;

	private static URL_SEPARATOR = '/';

	/**
	 * Decides what action should be performed based on the input argument
	 * @param String $paramStr a string that was provided as a parameter
	 */
	public function dispatchBy($paramStr){
		echo $paramStr;
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