<h1>UPDATE MEMBER INFO</h1>
<?php
echo $this->Form->create('Member');
echo $this->Form->input('name');
echo $this->Form->input('email');
echo $this->Form->input('type');
echo $this->Form->input('contactph');
echo $this->Form->input('nrcno');
echo $this->Form->input('dob',array('label'=>'Date Of Birth','dateFormat'=>'DMY','minYear'=>'1970','maxYear'=>'2014'));
echo $this->Form->input('gender',array('options'=>array('m'=>'Male','f'=>'Female','u'=>'Unspecified'),'empty'=>'(Choose One)'));
echo $this->Form->input('address');
echo $this->Form->end('Update Info');
?>