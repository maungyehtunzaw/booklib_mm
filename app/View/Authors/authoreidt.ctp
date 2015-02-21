<h1>Editing Author Info</h1>
<?php
echo $this->Form->create('Author',array(
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
echo $this->Form->input('dob',array('label'=>'Date of Birth','minYear'=>'1500','maxYear'=>'2000'));
echo $this->Form->input('gender',array('options'=>array('f'=>'Female','m'=>'Male'),'empty'=>'(Choose One)'));
echo $this->Form->input('address');
echo $this->Form->input('status',array('options'=>array('enable'=>'Enable','disable'=>'Disable'),'empty'=>'(Choose One)'));
echo $this->Form->input('biography');
echo $this->Form->end('Update Author\' Info');
?>
<div class="input-group" data-datepicker="true">
    <input name="date" type="text" class="form-control" />
    <span class="input-group-addon"><i class="icon-calendar"></i></span>
</div>