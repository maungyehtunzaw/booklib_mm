<?php
class Publisher extends AppModel{
    public $validate=array(
		'name' => array(
		'alphaNumeric' => array(
				'rule' => 'alphaNumeric',
				'required' => true,
				'message' => 'Letters and numbers only'
			)
		),
			
		'contactph'=>array(
				'rule'=>'notEmpty'	
			),
		
		'company' => array(
			'rule' => array('maxLength', 150),
			'message' => "Your Company not More than %d characters.",
			'on' => 'update',
				)
         );
		
    public $pname='Publisher';
    public $hasMany=array(
    	'Article'=>array(
    		'className'=>'Book',
    		'foreignKey'=>'publisher_id'
    		),
    	);
}
?>