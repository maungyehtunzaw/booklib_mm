<?php 
$this->Html->addCrumb('Transition', '/transitions');
$this->Html->addCrumb('Edit', array('controller' => 'transitions', 'action' => 'edit'));
?>


<h1>Editing Transition</h1>


<?php
echo $this->Form->create('Transition',array(
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
echo $this->Form->input('member_id');
echo $this->Form->input('book_id');
echo $this->Form->input('status',array('options'=>array('aa'=>'accepted','bb'=>'Not Accepted','cc'=>'Demage&Lost','dd'=>'Expired','ee'=>'Delete')));
echo $this->Form->input('remarks');
echo $this->Form->end('Update Transition Info');
?>
