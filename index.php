<?php
$keyName = 'param';
if (array_key_exists($keyName, $_GET)){
	$param = $_GET[$keyName];
	echo $param;
} else {
	echo 'page not found.';
}

