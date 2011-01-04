<?php
/**
 * Lithium: the most rad php framework
 *
 * @copyright     Copyright 2009, Union of RAD (http://union-of-rad.org)
 * @license       http://opensource.org/licenses/bsd-license.php The BSD License
 */

namespace li3_bot\controllers;

use li3_bot\models\Log;
use \lithium\g11n\Message;

class LogsController extends \lithium\action\Controller {

	public function index() {
		extract(Message::aliases());

		$channels = Log::find('all');
		$logs = null;

		$breadcrumbs[] = array(
			'title' => $t('Channels'),
			'url' => array('library' => 'li3_bot', 'controller' => 'logs', 'action' => 'index')
		);

		if ($channel = $this->request->channel) { /* Here for BC */
			$breadcrumbs[] = array(
				'title' => "#{$channel}",
				'url' => null
			);
			$logs = Log::find('all', compact('channel'));

			natsort($logs);
			$logs = array_reverse($logs);
		}
		return compact('channels', 'channel', 'logs', 'breadcrumbs');
	}

	public function view() {
		extract(Message::aliases());

		$date = $this->request->date;
		$channel = $this->request->channel;

		$baseUrl = array('library' => 'li3_bot', 'controller' => 'logs');

		$breadcrumbs[] = array(
			'title' => $t('Channels'),
			'url' => $baseUrl + array('action' => 'index')
		);
		$breadcrumbs[] = array(
			'title' => "#{$channel}",
			'url' => $baseUrl + array('action' => 'index') + compact('channel')
		);
		$breadcrumbs[] = array(
			'title' => $date,
			'url' => null
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

	public function search() {
		$channel = $this->request->channel;
		$query = $this->request->data['query'];

		$log = Log::search($query, array(
			'channel' => $this->request->channel
		));
		return compact('log', 'channel', 'query');
	}
}

?>