<?php
/**
 * Lithium: the most rad php framework
 *
 * @copyright     Copyright 2009, Union of RAD (http://union-of-rad.org)
 * @license       http://opensource.org/licenses/bsd-license.php The BSD License
 */

namespace li3_bot\controllers;

use \li3_bot\models\Log;
use \lithium\g11n\Message;

class LogsController extends \lithium\action\Controller {

	public function index($channel = null) {
		extract(Message::aliases());

		$channels = Log::find('all');
		$breadcrumbs[] = array(
			'url' => array('plugin' => 'li3_bot', 'controller' => 'logs', 'action' => 'index'),
			'title' => $t('Channels', array('scope' => 'li3_bot'))
		);
		$logs = null;

		if ($channel) {
			$breadcrumbs[] = array(
				'url' => null,
				'title' => "#{$channel}"
			);
			$logs = Log::find('all', compact('channel'));

			natsort($logs);
			$logs = array_reverse($logs);
		}

		return compact('channels', 'channel', 'logs', 'breadcrumbs');
	}

	public function view($channel, $date = null) {
		extract(Message::aliases());

		if (is_null($date)) {
			return $this->index($channel);
		}

		$breadcrumbs[] = array(
			'url' => array('plugin' => 'li3_bot', 'controller' => 'logs', 'action' => 'index'),
			'title' => $t('Channels', array('scope' => 'li3_bot'))
		);
		$breadcrumbs[] = array(
			'url' => array('plugin' => 'li3_bot', 'controller' => 'logs', 'action' => 'view', $channel),
			'title' => "#{$channel}"
		);
		$breadcrumbs[] = array(
			'url' => null,
			'title' => $date
		);
		$channels = Log::find('all');
		$log = Log::read($channel, $date);
		$previous = date('Y-m-d', strtotime($date) - (60 * 60 * 24));
		$next = date('Y-m-d', strtotime($date) + (60 * 60 * 24));

		if (!Log::exists($channel, $previous)) {
			$previous = null;
		}
		if (!Log::exists($channel, $next)) {
			$next = null;
		}

		return compact('channels', 'channel', 'log', 'date', 'breadcrumbs', 'previous', 'next');
	}
}

?>