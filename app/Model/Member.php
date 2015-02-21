<?php
class Member extends AppModel{
	//public $member=''
	public $validate=array(
		'name'=>array(
			'rule'=>'notEmpty'
			),
		'email'=>array(
			'rule'=>'notEmpty'
			),
		'contactph'=>array(
			'rule'=>'notEmpty'
			)

		);

    }
?>