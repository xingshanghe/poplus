<?= $this->element('seo',['_request_params'=>$_request_params,'_sys_info'=>$_sys_info]); ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="zh-CN" lang="zh-CN" >
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
<body lang="zh-CN">
	<div id="container">
		<?= $this->Flash->render(); ?>
		<header class="clearfix"><?= $this->element('header'); ?></header>
		<div id="content" class="clearfix" ><?= $this->fetch('content'); ?></div>
		<footer><?= $this->element('footer'); ?></footer>
	</div>
	<?= $this->fetch('script_final') ?>
	
	<?= $this->Html->script([
	    'jquery-1.11.3.min.js',
	    'jquery.migrate.js',
	    'jquery.cookie.js',
	    'bootstrap.js',
	    'retina-1.1.0.min.js',
	    'plugins-scroll.js',
	    'script.js',
	    'http://int.dpool.sina.com.cn/iplookup/iplookup.php?format=js',
	]); ?>
	
	<!--[if lt IE 9]>
		<?= $this->Html->script('html5.js'); ?>
	<![endif]-->
	<script type="text/javascript">
		$('#current_city').html(remote_ip_info['city']);
		$.cookie('current_city',remote_ip_info['city']);
		
	</script>
</body>
</html>