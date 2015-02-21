
<nav class="navbar navbar-default navbar-fixed-top" role="navigation">

   <div class='row'>
   	<div class='col-md-1'></div>
		<div class='col-md-10 col-xs-10 center'>

		<h1><?php echo $this->Html->link('Book Library System','http://localhost/cakephp/'); ?></h1>
			
			<?php if (!AuthComponent::user('id')): ?>
				<?php echo $this->Html->link('Sign In',array('action'=>'login','controller'=>'users')); ?>
			<?php else : ?>
				<?php echo 'Welcome '.$this->Session->read('Auth.User.username');
					?>
				<?php endif; ?>
	
	</div>
  </div>
</nav>
