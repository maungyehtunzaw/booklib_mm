<h1>User List</h1>
<?php 
$this->Html->addCrumb('Users', '/users');
//$this->Html->addCrumb('Add User', array('controller' => 'users', 'action' => 'add'));
?>

<?php echo $this->Html->link('Add New User',array('action'=>'add')); ?>
<?php $p=$this->Paginator; ?>
<table class='table table-striped'>
	<tr>
		<th><?php echo $p->sort('id','ID'); ?></th>
		<th><?php echo $p->sort('username','Username'); ?></th>
		<th><?php echo $p->sort('role','Role'); ?></th>
		<th><?php echo $p->sort('created','Created'); ?></th>
	</tr>
	<?php foreach($Users as $usr) : ?>
	<tr>
		<td><?php echo $usr['User']['id']; ?></td>
		<td><?php echo $usr['User']['username']; ?></td>
		<td><?php echo $usr['User']['role']; ?></td>
		<td><?php echo $usr['User']['created']; ?></td>
	</tr>
	<?php  endforeach; ?>
	<?php unset($usr); ?>
</table>
<div class='pagin'>
	<?php 
	echo $p->first('First:');
	if($p->hasPrev()){
		echo $p->prev('Prev');
	}
	echo $p->numbers(array('modulus'=>2));
	if($p->hasNext()){
		echo $p->next('Next');
	}
	echo $p->last('Last');
	?>
</div>
