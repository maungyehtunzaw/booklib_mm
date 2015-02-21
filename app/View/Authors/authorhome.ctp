<h1>Author List</h1>
<?php echo $this->Html->link('Add Author',array('controller' => 'Authors', 'action' => 'authoradd')); ?>

<div class="container">
		<?php echo $this->Form->create('Author',
				array(
					'action'=>'authorsearch',
					'role'=>'form',
					"class"=>"form-inline")
				);
				?>
			<?php echo $this->Form->input('gender',
				array(
					'options'=>array(
						'm'=>'Male','f'=>'female'),
					'empty'=>'-(All)-',
					'div'=>'form-group',
					'class'=>'form-control'
				)
			); ?>
				
			<?php echo $this->Form->input('name1',
				array(
					'type'=>'search',
					'div'=>'form-group',
					'class'=>'form-control'
				)
			);
			?>
			
			<?php echo $this->Form->button('Search',array("class"=>"submit btn btn-default"));?>
	
	</div>



<?php $paginator=$this->Paginator; ?>		
	<table class='table table-striped'>
	<tr>
		<th><?php echo $paginator->sort('id','ID'); ?></th>
		<th><?php echo $paginator->sort('name','Name');?></th>
		<th><?php echo $paginator->sort('dob','DateOfBirth'); ?></th>
        <th><?php echo $paginator->sort('created','Created');?></th>
		<th>Action</th>
	</tr>
	
	<?php foreach($Authors as $a): ?>
	<tr>
		<td>
		<?php echo $this->Html->Link($a['Author']['id'],array('action'=>'authorview',$a['Author']['id'])); ?>
		</td>
		<td><?php echo $a['Author']['name'];?></td>
		<td><?php echo $a['Author']['dob'];?></td>
                <td><?php echo $a['Author']['created'];?></td>
		<td>
		   <?php echo $this->Html->link('Edit', array('action' => 'authoreidt', $a['Author']['id'])); ?>
		   
		    <?php
                echo $this->Form->postLink(
                    'Delete',
                    array('action' => 'authordelete', $a['Author']['id']),
                    array('confirm' => 'Are you sure Want To Delete?')
                );
            ?>

		</td>
	</tr>
	<?php endforeach; ?>
	<?php unset($a); ?>
</table>
<div class='pagin'>
	<?php echo $paginator->first(" FIRST ");
	if($paginator->hasPrev()){
		echo $paginator->prev(" PREV ");
	}
	echo $paginator->numbers(array('modulus'=>2));
	if($paginator->hasNext()){
		echo $paginator->next(" NEXT ");
	}
	echo $paginator->last(' LAST ');
	?>
</div>

