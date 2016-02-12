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

	public function __construct(){
		$this->_imageDirectory = dirname(__DIR__) . DIRECTORY_SEPARATOR . 'images' . DIRECTORY_SEPARATOR;
	}


	public function render($arr){
		// if the path contains three elements and more, then the second one from the end
		// is a tracking code
		if (count($arr) > 2){
			$trackCode = array_splice($arr, -2, 1);
			$visitor = new Visitor();
			$visitor->trackCode = $trackCode[0];
			$visitor->resource = implode('/', $arr);
			$visitor->ip = $_SERVER['REMOTE_ADDR'];
			$visitor->userAgent = $_SERVER['HTTP_USER_AGENT'];
			$visitor->time = date('Y-m-d H:i:s', $_SERVER['REQUEST_TIME']);
			$visitor->redirectTo = '';
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