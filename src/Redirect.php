<?php
class Redirect {
	/**
	 * A hash map of mappings
	 * @var associative array
	 */
	private $_mappings;

	public function __construct(){
		$this->_mappings = require('mappings.php');
	}

	public function render($arr){

		var_dump($arr);
		$str = implode('/', $arr);
		if (array_key_exists($str, $this->_mappings)){
			echo "redirect to " . $this->_mappings[$str];
		} else {
			echo "no key $str in the mappings";
		}

	}

}