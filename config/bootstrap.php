<?php

/**
 * Register g11n resource.
 */
use \lithium\g11n\Catalog;

Catalog::config(array(
	'li3_bot' => array(
		'adapter' => 'Gettext',
		'path' => dirname(__DIR__) . '/resources/g11n'
)) + Catalog::config());

?>