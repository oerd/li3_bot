<?php
/**
 * Lithium: the most rad php framework
 *
 * @copyright     Copyright 2009, Union of RAD (http://union-of-rad.org)
 * @license       http://opensource.org/licenses/bsd-license.php The BSD License
 */

namespace li3_bot\tests\mocks\extensions\command\bot;

class MockIrc extends \li3_bot\extensions\command\bot\Irc {

	public function process($line) {
		return $this->_process($line);
	}

	public function parse($regex, $string, $offset = -1) {
		return $this->_parse($regex, $string, $offset);
	}
}

?>