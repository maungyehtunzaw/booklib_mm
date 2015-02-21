<h1>Update Book Info</h1>
<?php 
$this->Html->addCrumb('Transition', '/Books');
$this->Html->addCrumb('View','/Books') ;
$this->Html->addCrumb($booktit['Book']['title']);
?>
<?php
echo $this->Form->create('Book',array(
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
					'class' => 'form-horizontal',
					'role' => 'form',
					)
				);
echo $this->Form->input('title');
echo $this->Form->input('entitle');
echo $this->Form->input('ISBN');
echo $this->Form->input('borrow_price');
echo $this->Form->input('demage_price');
echo $this->Form->input('book_price');
echo $this->Form->input('bookqty');
echo $this->Form->input('description');
echo $this->Form->input('author_id');
echo $this->Form->input('publisher_id');
echo $this->Form->end('Update Book');
?>