<h1>Book Borrow List</h1>
<?php $paginator=$this->Paginator; ?>
<div class="container">
<?php 
$this->Html->addCrumb('Transition', '/transitions');
?>
<?php
echo $this->Form->Create('Transition',array('action'=>'transitionsearch',"class"=>"form-inline","role"=>"form"));
echo $this->Form->input('status',
		array('options'=>array(
			'aa'=>'Accepted',
			'bb'=>'NotAccepted',
			'cc'=>'Demage',
			'dd'=>'Expired',
			'ee'=>'Lost'),
			'empty'=>array(
				'all'=>'--(All)--'),
				'label'=>'Define by Status',
				'div'=>'form-group',
				'class'=>'form-control'
				
				)
			);
?>

<?php
echo $this->Form->input('type',array(
			'options'=>array(
				'Mem'=>'MemberNames',
				'Booktitle'=>'BookTitles'),
				'empty'=>array('all'=>'--(All)--'),
				'div'=>'form-group',
				'class'=>'form-control'
				)
			);
?>

<?php 
echo $this->Form->input('keyword',array(
		'label'=>'Search Keyword',
		'div'=>'form-group',
		'class'=>'form-control'

		)
	); 
?>

<?php
echo $this->Form->button('Search',array("class"=>"submit btn btn-default"));
?>

</div>



<table class='table'>
	<tr>
		<td>
			<?php
		echo $this->Html->link(
    $this->Html->tag('i', '', array('class' => 'icon-star')) . "Add Transition",
    array('action' => 'addtransition'),
    array('class' => 'btn btn-default', 'escape' => false)
);
?>	</td>
		
	</tr>
	<tr>
		<th><?php echo $paginator->sort('id','ID'); ?></th>
		<th><?php echo $paginator->sort('member_id','Member Name'); ?></th>
		<th><?php echo $paginator->sort('book_id','Book-Title'); ?></th>
		<th><?php echo $paginator->sort('status','Status'); ?></th>
		<th><?php echo $paginator->sort('borrowtime','Borrow Time'); ?></th>
		<th>Action</th>

	</tr>
	<?php foreach($Transitions as $t) : ?>
	<?php $bid=$t['Transition']['book_id'];
		  $mid=$t['Transition']['member_id']; ?>

	<tr>
		<td><?php echo $this->Html->link($t['Transition']['id'],array('action'=>'viewtransition',$t['Transition']['id'])); ?></td>
		<td><?php echo $this->Html->link($members[$mid], array('controller'=>'Members','action' => 'memberview', $t['Transition']['member_id'])); ?></td>
		<td><?php echo $this->Html->link($books[$bid], array('controller'=>'Books','action' => 'bookview', $t['Transition']['book_id'])); ?></td>
		<td><?php $status=$t['Transition']['status']; 
			if($status=='aa') echo 'Accepted';
			if($status=='bb') echo 'Not Accepted';
			if($status=='cc') echo 'Lost&Demage';
			if($status=='dd') echo 'Expired';
			if($status=='ee') echo 'Delete';
		?>

		</td>
		<td><?php echo $t['Transition']['borrowtime']; ?></td>
		<td>
			<?php echo $this->Html->link('Edit',array('action'=>'edittransition',$t['Transition']['id'])); ?>
			<!--<?php echo $this->Html->link('Accept',array('action'=>'transitionaccept',$t['Transition']['id'])); ?>-->
			 <?php
			 	if(($t['Transition']['status'])=='bb'){
                echo $this->Form->postLink(
                    'Accept',
                    array('action' => 'bookaccept', $t['Transition']['id']),
                    array('confirm' => 'Are you Sure Accepted List This Book..?')
                );
            }
            else if($t['Transition']['status']=='aa')
            {
            	echo $this->Form->postLink(
                    'Not Accept',
                    array('action' => 'notaccept', $t['Transition']['id']),
                    array('confirm' => 'Are you Sure, Add to No Accepted List?')
                );
            }
            ?>
		</td>
	</tr>
	<?php endforeach; ?>
	<?php unset($t); ?>

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
