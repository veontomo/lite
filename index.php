<?php
include 'src/Dispatcher.php';
include 'src/View.php';
include 'src/Redirect.php';
include 'src/Visitor.php';

$keyName = 'param';

$mapping = array('images' => 'View', 'articles' => 'Redirect');

$dispatcher = new Dispatcher($mapping);

if (array_key_exists($keyName, $_GET)){
	$dispatcher->dispatchBy($_GET[$keyName]);
} else {
	$dispatcher->render404($_GET);
}

