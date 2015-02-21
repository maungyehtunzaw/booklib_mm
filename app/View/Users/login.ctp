<h1>Sign in To System</h1>
<?php 
$this->Html->addCrumb('Users', '/users');
$this->Html->addCrumb('Login');
?>

<?php echo $this->Session->flash('auth'); ?>
    <?php echo __('Please enter your username and password'); ?>
	<?php echo $this->Form->create('User',array("class"=>"form-horizontal","role"=>"form")); ?>
	
		<?php 
		echo $this->Form->input('username',
			array(
				"div"=>"form-group",
				"class"=>"form-control",
				"between"=>"<div class='col-sm-4'>",
				"after"=>"</div>",
				"label"=>
					array(
						"class"=>"control-label col-sm-2")
						)
					);
		
        echo $this->Form->input('password',
			array(
				"div"=>"form-group",
				"class"=>"form-control",
				"between"=>"<div class='col-sm-4'>",
				"after"=>"</div>",
				'label'=>
					array("class"=>"control-label col-sm-2")
					)
				);
    ?>

<?php echo $this->Form->end(__('Login')); ?>
