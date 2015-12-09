<?= $this->element('seo',['_request_params'=>$_request_params,'_sys_info'=>$_sys_info]); ?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $this->fetch('title'); ?>
    </title>
    <?= $this->Html->meta('icon'); ?>
    
    <?= $this->Html->css([
        'fonts.css?family=Open+Sans:300italic,400italic,600italic,700italic,400,700,600,300',
        'bootstrap.css',
        'font-awesome.css',
        'style.css',
        'responsive.css'
    ]); ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
	<div id="container">
		<?= $this->Flash->render(); ?>
		<header class="clearfix"><?= $this->element('header'); ?></header>
		<div id="content"><?= $this->fetch('content'); ?></div>
		<footer><?= $this->element('footer'); ?></footer>
	</div>
	<?= $this->fetch('script_final') ?>
	
	<?= $this->Html->script([
	    'jquery-1.11.3.min.js',
	    'jquery.migrate.js',
	    'bootstrap.js',
	    'retina-1.1.0.min.js',
	    'plugins-scroll.js',
	    'script.js'
	]); ?>
	
	<!--[if lt IE 9]>
		<?= $this->Html->script('html5.js'); ?>
	<![endif]-->
	
</body>
</html>