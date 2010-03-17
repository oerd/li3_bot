<?php

use \lithium\net\http\Router;
use \app\extensions\net\http\LocaleRoute;

Router::connect(new LocaleRoute(array(
	'template' => '/bot/view/{:args}',
	'params' => array(
		'plugin' => 'li3_bot',
		'controller' => 'logs', 'action' => 'view'
))));

Router::connect(new LocaleRoute(array(
	'template' => '/bot/{:args}',
	'params' => array(
		'plugin' => 'li3_bot',
		'controller' => 'logs'
))));

?>