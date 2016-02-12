<?php
namespace AdvLite;

include 'src/Dispatcher.php';

$keyName = 'param';

$dispatcher = new Dispatcher();
if (array_key_exists($keyName, $_GET)){
	$dispatcher->dispatchBy($_GET[$keyName]);
} else {
	$dispatcher->render404($_GET);
}

