<?php
/**
 * Lithium: the most rad php framework
 *
 * @copyright     Copyright 2009, Union of Rad, Inc. (http://union-of-rad.org)
 * @license       http://opensource.org/licenses/bsd-license.php The BSD License
 */

use \lithium\core\Environment;
use \lithium\g11n\Locale;

?>
<!doctype html>
<html lang="<?= str_replace('_', '-', Environment::get('locale')); ?>">
<head>
	<?php echo $this->html->charset(); ?>
	<title><?=$t('Lithium Bot', array('scope' => 'li3_bot')) . ' ' . $this->title(); ?></title>
	<?php echo $this->html->style(array('lithium', 'u1m', '/li3_bot/css/li3_bot')); ?>
	<?php echo $this->scripts(); ?>
	<?php echo $this->html->link('Icon', null, array('type' => 'icon')); ?>
</head>
<body class="bot">
<div id="wrapper">
	<?=$this->_view->render(array('element' => 'locale_navigation')); ?>
	<div id="container">
		<div id="header">
			<h1><?= $t('Lithium Bot', array('scope' => 'li3_bot')); ?></h1>
			<ul class="crumbs">
			<?php foreach ($breadcrumbs as $crumb): ?>
				<?php foreach ($breadcrumbs as $crumb): ?>
					  <li><?php echo $crumb['url'] ? $this->html->link($crumb['title'], $crumb['url']) : $crumb['title']; ?></li>
				<?php endforeach; ?>
			<?php endforeach; ?>
			</ul>
		<div id="content">
			<?php echo $this->content; ?>
		</div>
	</div>
	<div id="footer-spacer"></div>
</div>
<div id="footer">
	<p class="copyright">
		<?=$t('Pretty much everything is © {:year} and beyond, the Union of Rad', array(
			'year' => date('Y')
		)); ?>
	</p>
</div>
<?php echo $this->html->script(array(
	'http://code.jquery.com/jquery-1.4.1.min.js',
	'rad.cli',
)); ?>
<script type="text/javascript" charset="utf-8">
	$(document).ready(function () {
		RadCli.setup({
			commandBase: 'http://lithify.me/<?= Locale::language(Environment::get('locale')); ?>/cmd'
		});
	});
</script>
</body>
</html>