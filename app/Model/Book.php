<?php
App::uses('AuthComponent', 'Controller/Component');
class Book extends AppModel{

	public function isOwnedBy($book, $user) {
    	return $this->field('id', array('id' => $book, 'user_id' => $user)) !== false;
	}
	
	public $validate=array(
		'title'=>array(
			'rule'=>'notEmpty'
			),
			'author_id'=>array(
			'rule'=>'notEmpty'
			)
		);
	public $name='Book';
	public $belongsTo=array(
		'Author'=>array(
			'className'=>'Author',
			'foreignKey'=>'author_id'
			),
		'Publisher'=>array(
			'className'=>'Publisher',
			'foreignKey'=>'publisher_id'
		)
		);
}
?>