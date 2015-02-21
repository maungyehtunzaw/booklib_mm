<?php
App::uses('AuthComponent', 'Controller/Component');
class Transition extends AppModel{

	public function isOwnedBy($book, $user) {
    	return $this->field('id', array('id' => $book, 'user_id' => $user)) !== false;
	}
	
	public $validate=array(
		
		'author_id'=>array(
			'rule'=>'notEmpty'
			),
		'member_id'=>array(
			'rule'=>'notEmpty'
			),
		'remarks' => array(
            'alphaNumeric' => array(
                'rule' => 'alphaNumeric',
                'required' => true,
                'message' => 'Letters and numbers only'
            ),
            'between' => array(
                'rule'    => array('lengthBetween', 15, 15),
                'message' => 'Between 5 to 15 characters'
            )
        ),

		'username' => array(
        'rule' => 'alphaNumeric',
        'required' => true
    )
		);

	public $name='Transition';
	public $belongsTo=array(
		'Member'=>array(
			'className'=>'Member',
			'foreignKey'=>'member_id'
			),
		'Book'=>array(
			'className'=>'Book',
			'foreignKey'=>'book_id'
			)
		);
}
?>