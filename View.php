<?php
/**
 * A class that processes a view.
 * (Returns the image that is requested, logs accesses)
 */
class View {

	/**
	 * Full path to the folder that contains images
	 * @var string
	 */
	private $_imageDirectory;

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
		$this->_imageDirectory = 'images' . DIRECTORY_SEPARATOR;
	}

	/**
	 * Calculates the tracking code, the requested resource and the redirect url
	 * @param  Array $arr [description]
	 */
	private function dispatch($arr){
		// if the path contains three elements and more, then the second one from the end
		// is a tracking code
		$separator = DIRECTORY_SEPARATOR;
		$size = count($arr);
		if ($size > 2){
			$this->_trackCode = $arr[$size - 2];
			// do not take into consideration the second element from the end
			$this->_resource = implode($separator, array_slice($arr, 0, -2)) . $separator . $arr[$size - 1];
		} else {
			$this->_resource = implode($separator, $arr);
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
			$visitor->redirectTo = null;
			$visitor->store();
		}
		$this->renderJPG(implode(DIRECTORY_SEPARATOR, $arr));
	}

	public function renderJPG($fileName){
		$path = $this->_imageDirectory . $fileName;
		if (file_exists($path)){
			header('Content-type: image/jpeg');
			readfile($path);
			exit();
		}
		echo "no file $path";
	}
}