<h1>Adding New Publisher</h1>
<?php 
$this->Html->addCrumb('Publishers', array("controller"=>"Publishers","action"=>"publisherhome"));
$this->Html->addCrumb("Add New");
?>
<?php
echo $this->Form->create('Publisher',array(
					'inputDefaults' => array(
					'div' => array(
						'class' => 'form-group'
						),
					'label' => array(
							'class' => 'col-lg-2 control-label'
						),
					'between' => '<div class="col-lg-4">',
					'seperator' => '</div>',
					'after' => '</div>',
					'class' => 'form-control',
					),
					'class' => 'well form-horizontal',
					'role' => 'form',
					)
				);
echo $this->Form->input('name');	
echo $this->Form->input('company');
echo $this->Form->input("contactph");
echo $this->Form->input('address');
echo $this->Form->input('status',array(
		'options'=>
			array(
				'enable'=>'Enable',
				'disable'=>'Disable'
				)
			)
		);
echo $this->Form->end('Save Publisher');
?>