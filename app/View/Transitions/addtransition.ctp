<div class="container">
<?php 
$this->Html->addCrumb('Transition', '/transitions');
$this->Html->addCrumb('Add New', array('controller' => 'transitions', 'action' => 'add'));
?>

<h1>Adding Book Borrow/Lend</h1>
<?php
	echo $this->Form->create('Transition',array("class"=>"form-horizontal","role"=>"form"));

	echo $this->Form->input('member_id',array(
		'empty'=>'--(Choose One)--',
        'label' => array('text' => 'Member Name', 'class' => 'strong'), 'placeholder' => "Type a note!", 'class' => 'form-control', 
        'div' => array('class' => "form-group ".($this->Form->isFieldError('remarks') ? 'has-error' : '') ),
        'error' => array('attributes' => array('wrap' => 'p', 'class' => 'help-block has-error'))
        )
	);

	echo $this->Form->input('book_id',array(
		'empty'=>'--(Choose One)--',
        'label' => array('text' => 'Remark', 'class' => 'strong'), 'placeholder' => "Type a note!", 'class' => 'form-control', 
        'div' => array('class' => "form-group ".($this->Form->isFieldError('remarks') ? 'has-error' : '') ),
        'error' => array('attributes' => array('wrap' => 'p', 'class' => 'help-block has-error'))
        )
	);

	echo $this->Form->input('remarks',array(
        'label' => array('text' => 'Remark', 'class' => 'strong'), 'placeholder' => "Type a note", 'class' => 'form-control', 
        'div' => array('class' => "form-group ".($this->Form->isFieldError('remarks') ? 'has-error' : '') ),
        'error' => array('attributes' => array('wrap' => 'p', 'class' => 'help-block has-error'))
        )
	);

	echo $this->Form->input(
    'username',
    array(
        'label' => array('text' => 'Username', 'class' => 'strong'), 'placeholder' => "Your Username", 'class' => 'form-control', 
        'div' => array('class' => "form-group ".($this->Form->isFieldError('username') ? 'has-error' : '') ),
        'error' => array('attributes' => array('wrap' => 'p', 'class' => 'help-block has-error'))
        )
);
				
   		echo $this->Form->submit('Add New',array(
                              'class' => 'btn btn-lg btn-primary',
                              'div' => false));
?>
	
	</div>
	