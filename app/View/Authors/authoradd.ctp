<h1>ADDING NEW AUTHOR</h1>
<?php
/*
array(
	'inputDefaults' => array(
		'div' => 'form-group',
		'label' => array(
			'class' => 'col col-md-3 control-label'
		),
		'wrapInput' => 'col col-md-9',
		'class' => 'form-control'
	),
	'class' => 'well form-horizontal'
));
*/

	echo $this->Form->create('Author',array(
					'inputDefaults' => array(
					'div' => array(
						'class' => 'form-group'
						),
					'label' => array(
							'class' => 'col-lg-2 control-label'
						),
					'between' => '<div class="col-lg-10">',
					'seperator' => '</div>',
					'after' => '</div>',
					'class' => 'form-control',
					),
					'class' => 'form-horizontal',
					'role' => 'form',
					)
				);

	
echo $this->Form->input('name');
echo $this->Form->input('dob',array('label'=>'Date of Birth','minYear'=>'1500','maxYear'=>'2000'));
echo $this->Form->input('gender',array('options'=>array('f'=>'Female','m'=>'Male'),'empty'=>'(Choose One)'));
echo $this->Form->input('address');
echo $this->Form->input('status',array('options'=>array('enable'=>'Enable','disable'=>'Disable'),'empty'=>'(Choose One)'));
echo $this->Form->input('biography');
echo $this->Form->end('Save Author');
?>