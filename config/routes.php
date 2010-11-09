<?php

use \lithium\net\http\Router;
use \app\extensions\route\Locale;

Router::connect(new Locale(array(
	'template' => '/bot/view/{:args}',
	'params' => array(
		'library' => 'li3_bot', 'controller' => 'logs', 'action' => 'view'
	)
)));

Router::connect(new Locale(array(
	'template' => '/bot/{:args}',
	'params' => array(
		'library' => 'li3_bot', 'controller' => 'logs'
	)
)));

?>