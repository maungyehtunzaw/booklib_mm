<!-- app/View/Users/add.ctp -->
<h1>Adding New User</h1>
<?php 
$this->Html->addCrumb('Users', '/users');
$this->Html->addCrumb('Add User', array('controller' => 'users', 'action' => 'add'));
?>

<div class="container">
	<div class="row">
		<?php echo $this->Form->create('User',array(
							'inputDefaults' => array(
							'div' => array(
								'class' => 'form-group'
								),
							'label' => array(
									'class' => 'col-sm-2 control-label'
								),
							'between' => '<div class="col-sm-4">',
							'seperator' => '</div>',
							'after' => '</div>',
							'class' => 'form-control',
							'error'=>array('attributes'=>array('wrap'=>'div','class'=>'alert alert error'))
							),
							'class' => 'form-horizontal',
							'role' => 'form',
							)
						); ?>

				<?php 
				echo $this->Form->input('email'); 
				echo $this->Form->input('username');
				echo $this->Form->input('password');
				echo $this->Form->input('role', array(
					'options' => array('admin' => 'Admin', 'author' => 'Author')
				));
			?>

				<?php echo $this->Form->end(__('Submit')); ?>
		</div>
	</div>