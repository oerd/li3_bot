<?php
/**
 * Lithium: the most rad php framework
 *
 * @copyright     Copyright 2009, Union of Rad, Inc. (http://union-of-rad.org)
 * @license       http://opensource.org/licenses/bsd-license.php The BSD License
 */

use \lithium\core\Environment;

$locale = Environment::get('locale');

?>
<?php if (empty($logs)): ?>
<?php $this->title('Channels'); ?>
<ul class="channels">
	<?php foreach ((array)$channels as $channel): ?>
		  <li><?=$this->html->link('#' . $channel, array(
				'plugin' => 'li3_bot',
				'controller' => 'logs', 'action' => 'index',
				'locale' => $locale,
				'args' => array($channel)
				)); ?></li>
	<?php endforeach;?>
</ul>
<?php else: ?>
<?php $this->title("Logs for {$channel}"); ?>
<ul>
  <?php foreach ((array)$logs as $date): ?>
    <li>
		<?php echo $this->html->link($date, array(
			'plugin' => 'li3_bot',
			'controller' => 'logs', 'action' => 'view',
			'locale' => $locale,
			'args' => array($channel, $date)
		));?>
    </li>
  <?php endforeach;?>
</ul>
<?php endif; ?>