<!doctype html>
<html>
<head>
	<?php echo $this->html->charset(); ?>
	<title>Lithium Bot <?php echo $this->title(); ?></title>
	<?php echo $this->html->style(array('lithium', 'u1m', '/li3_bot/css/li3_bot')); ?>
	<?php echo $this->scripts(); ?>
	<?php echo $this->html->link('Icon', null, array('type' => 'icon')); ?>
</head>
<body class="bot">
<div id="wrapper">
	<div id="container">
		<div id="header">
			<h1>Lithium Bot</h1>
			<ul class="crumbs">
			<?php foreach ($breadcrumbs as $link => $title): ?>
				  <li><?php echo ($link != '#') ? $this->html->link($title, $link) : $title; ?></li>
			<?php endforeach; ?>
			</ul>
		</div>
		<div id="content">
			<?php echo $this->content; ?>
		</div>
	</div>
	<div id="footer-spacer"></div>
</div>
<div id="footer">
	<p class="copyright">Pretty much everything is &copy; 2009 and beyond, the Union of Rad</p>
</div>
<?php echo $this->html->script(array(
	'http://code.jquery.com/jquery-1.4.1.min.js',
	'rad.cli',
)); ?>
<script type="text/javascript" charset="utf-8">
	$(document).ready(function () {
		RadCli.setup();
	});
</script>
</body>
</html>