<?php

use \lithium\net\http\Router;
use \li3_bot\extensions\route\Locale;

Router::connect(new Locale(array(
	'template' => '/bot/view/{:args}',
	'params' => array(
		'plugin' => 'li3_bot', 'controller' => 'logs', 'action' => 'view'
	)
)));

Router::connect(new Locale(array(
	'template' => '/bot/{:args}',
	'params' => array(
		'plugin' => 'li3_bot', 'controller' => 'logs'
	)
)));

?>