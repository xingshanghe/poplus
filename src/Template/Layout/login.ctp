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
        'responsive.css',
        'signin.css'
    ]); ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
	<div id="container">
		<header class="clearfix"><?= $this->element('header'); ?></header>
		<div id="content" class="clearfix"><?= $this->fetch('content'); ?></div>
		<footer><?= $this->element('footer'); ?></footer>
	</div>
	
	<?= $this->Html->script([
	    'jquery-1.11.3.min.js',
	    'jquery.migrate.js',
	    'jquery.cookie.js',
	    'bootstrap.js',
	    'retina-1.1.0.min.js',
	    'plugins-scroll.js',
	    'script.js',
	    'layer/layer.js',
	    'poplus.js',
	    'http://int.dpool.sina.com.cn/iplookup/iplookup.php?format=js'
	]); ?>
	
	<!--[if lt IE 9]>
		<?= $this->Html->script('html5.js'); ?>
	<![endif]-->
	
	<?= $this->fetch('script_final') ?>
	
	<?php 
	   $_auth_msg = $this->Flash->render('auth');
	   if ($_auth_msg){
	       $_auth_msg_arr = json_decode($_auth_msg,true);
	       //$_auth_msg_arr  msg,type,code
	       if (json_last_error() == JSON_ERROR_NONE){
	?>
	<script type="text/javascript">
		layer.msg("<?= $_auth_msg_arr['msg'] ?>", function(){
		//关闭后的操作
		});
	</script>	
	<?php        
	       }
	   }
	?>
	<script type="text/javascript">
		$('#current_city').html(remote_ip_info['city']);
	</script>
	
</body>
</html>