<?php

include 'Dispatcher.php';
include 'View.php';
include 'Redirect.php';
include 'Visitor.php';

$keyName = 'param';

$mapping = array('images' => 'View', 'news' => 'Redirect');

$dispatcher = new Dispatcher($mapping);
if (array_key_exists($keyName, $_GET)){
	$dispatcher->dispatchBy($_GET[$keyName]);
} else {
	$dispatcher->render404($_GET);
}

