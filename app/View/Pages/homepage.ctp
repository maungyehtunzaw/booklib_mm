<h1>Book Library</h1>
<?php if (AuthComponent::user('id')): ?>
<div class='row'>
	<div class='col-md-4'>
		Welcome .
	<?php
	echo  $this->Session->read('Auth.User.username');
	?>
	</div>
	<div class='col-md-4'>
	 <?php echo $this->Html->link('Update Profile',array('controller'=>'users','action'=>'updateprofile')); ?>
	</div>
	<div class='col-md-4'>
	 <?php echo $this->Html->link('Logout',array('controller'=>'users','action'=>'logout')); ?>
	</div>
</div>

<?php endif; ?>
<div class='row'>
	<div class='col-md-4'>
		Total User=Books<br>
		New Book=20
	</div>

	<div class='col-md-4'>
		Totom Member=2230
		New Member=23;
	</div>

	<div class='col-md-4'>
		Total Author=202
		Author
	</div>

</div>