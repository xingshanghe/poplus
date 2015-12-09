<!-- static navbar -->
<div class="navbar navbar-default navbar-fixed-top">
	<?= $this->element('header/top-line'); ?>
	
	<?php 
	   if (($_request_params['controller'] == 'Accounts')&&($_request_params['action']=='login')){
	       echo $this->element('header/login-container');
	   }else{
	       echo $this->element('header/navbar-container');
	   }
	?>
</div>