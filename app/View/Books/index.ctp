<h1>Book List</h1>
<?php $this->Html->addCrumb('Book','/books'); ?>

<?php echo $this->Html->link('Add Book',array('controller' => 'Books', 'action' => 'bookadd')); ?>
<?php $pagin=$this->Paginator; ?>
<table class='table table-striped'>
	<tr>
		<th><?php echo $pagin->sort('id','ID'); ?></th>
		<th><?php echo $pagin->sort('title','Title'); ?></th>
		<th><?php echo $pagin->sort('author_id','Authors Name'); ?></th>
		<th><?php echo $pagin->sort('publisher_id','Publisher\' Name'); ?></th>
		<th><?php echo $pagin->sort('qty','Quantity'); ?></th>
		<th><?php echo $pagin->sort('created','Created'); ?></th>
		<th>Action</th>
	</tr>
	
	<?php foreach ($Books as $book): ?>
	<?php $aid=$book['Book']['author_id'];
		  $pid=$book['Book']['publisher_id']; ?>
	<tr>
		<td><?php echo $this->Html->link($book['Book']['id'],array('action'=>'bookview',$book['Book']['id'])); ?></td>
		<td><?php echo $book['Book']['title'];?></td>
		<td><?php echo $this->Html->link($authors[$aid], array('controller'=>'Authors','action' => 'authorview', $book['Book']['author_id'])); ?></td>
		<td><?php echo $this->Html->link($publishers[$pid],array('controller'=>'Publishers','action'=>'publisherview',$book['Book']['publisher_id'])); ?></td>
		<td><?php echo $book['Book']['bookqty'];?></td>
		<td><?php echo $book['Book']['created'];?></td>
		<td>
		   <?php echo $this->Html->link('Edit', array('action' => 'bookedit', $book['Book']['id'])); ?>	
		   <?php
		   echo $this->Form->postLink(
                    'Delete',
                    array('action' => 'bookdelete', $book['Book']['id']),
                    array('confirm' => 'Are your Sure Want To Delete? '.$book['Book']['title'])
                );
		   ?>
		</td>
	</tr>
	<?php endforeach; ?>
	<?php unset($book); ?>
</table>


<div class='pagin'>
	<?php
	echo $pagin->first('First');
	if($pagin->hasPrev()){
		echo $pagin->prev(' PREV ');
	}
	echo $pagin->numbers(array('modulus'=>2));
	if($pagin->hasNext()){
		echo $pagin->next(' NEXT ');
	}
	echo $pagin->last(' LAST ');
	?>
</div>
