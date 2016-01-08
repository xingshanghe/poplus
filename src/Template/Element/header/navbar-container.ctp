<div class="container">
	<div class="navbar-header">
		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
		<a class="navbar-brand"  href="<?= $this->Url->build('/'); ?>"><?= $this->Html->image('logo.png'); ?></a>
	</div>
	<div class="navbar-collapse collapse">
		<ul class="nav navbar-nav navbar-left">
			<li ><a <?= ($_request_params['controller'] == 'Home')&&($_request_params['action']=='index')?'class="active"':'' ?> href="<?= $this->Url->build('/'); ?>">主页</a></li>
		</ul>
	</div>
</div>