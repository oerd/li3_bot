<?php

use lithium\net\http\Router;
use app\extensions\route\Locale;
use lithium\action\Response;

Router::connect(new Locale(array(
	'template' => '/bot',
	'params' => array(
		'library' => 'li3_bot', 'controller' => 'pages', 'action' => 'home'
))));
Router::connect(new Locale(array(
	'template' => '/bot/logs',
	'params' => array(
		'library' => 'li3_bot', 'controller' => 'logs', 'action' => 'index'
))));
Router::connect(new Locale(array(
	'template' => '/bot/logs/search/{:channel}',
	'params' => array(
		'library' => 'li3_bot', 'controller' => 'logs', 'action' => 'search'
))));
Router::connect(new Locale(array(
	'template' => '/bot/logs/{:channel}',
	'params' => array(
		'library' => 'li3_bot', 'controller' => 'logs', 'action' => 'index'
))));
Router::connect(new Locale(array(
	'template' => '/bot/logs/{:channel}/{:date:[0-9]{4}-[0-9]{2}-[0-9]{2}}',
	'params' => array(
		'library' => 'li3_bot', 'controller' => 'logs', 'action' => 'view'
))));
Router::connect(new Locale(array(
	'template' => '/bot/tells',
	'params' => array(
		'library' => 'li3_bot', 'controller' => 'tells', 'action' => 'index'
))));

/* BC, redirect old to new routes. */

Router::connect(new Locale(array(
	'template' => '/bot/view/{:args}',
	'handler' => function($request) {
		$location = array('library' => 'li3_bot', 'controller' => 'logs');

		if (count($request->args) == 2) {
			$location['action'] = 'view';
			list($location['channel'], $location['date']) = $request->args;
		} elseif (count($request->args == 1)) {
			$location['action'] = 'index';
			$location['channel'] = $request->args[0];
		} else {
			return false;
		}
		return new Response(compact('location'));
	}
)));

?>