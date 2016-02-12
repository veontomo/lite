<?php
namespace AdvLite;

include 'src/Dispatcher.php';

$keyName = 'param';

$mapping = array('images' => 'View', 'articles' => 'Redirect');

$dispatcher = new Dispatcher($mapping);

if (array_key_exists($keyName, $_GET)){
	$dispatcher->dispatchBy($_GET[$keyName]);
} else {
	$dispatcher->render404($_GET);
}

