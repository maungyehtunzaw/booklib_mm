<?php
App::uses('AuthComponent','Controller/Component');
class Author extends AppModel{
    public $validate=array(
		'name'=>array(
			'rule'=>'notEmpty'                                               
			),
		
                'contactph'=>array(
			'rule'=>'notEmpty'
			)
                
		);
    public $name='Author';
    public $hasMany=array(
    	'Article'=>array(
    		'className'=>'Book',
    		'foreignKey'=>'author_id'
    		),
    	);
}
?>