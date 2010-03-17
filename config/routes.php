<?php

use \lithium\net\http\Router;

Router::connect('/{:locale:[a-z]+[a-z]+}/bot/view/{:args}', array(
	'plugin' => 'li3_bot', 'controller' => 'logs', 'action' => 'view', 'locale' => null
));
Router::connect('/{:locale:[a-z]+[a-z]+}/bot/{:args}', array(
	'plugin' => 'li3_bot', 'controller' => 'logs', 'locale' => null
));


?>