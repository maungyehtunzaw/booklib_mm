<h1>Member List</h1>
<?php echo $this->Html->link('RegisterMember',array('controller'=>'Members','action'=>'memberreg')); ?>
<?php $pgin=$this->Paginator; ?>
        
<table class='table  table-hover'>
        <tr>
            <th><?php echo $pgin->sort('id','ID');?></th>
            <th><?php echo $pgin->sort('name','Name');?></th>
            <th><?php echo $pgin->sort('email','Email'); ?></th>
            <th>Contact-Ph</th>
            <th><?php echo $pgin->sort('type','Member Type'); ?></th>
            <th><?php echo $pgin->sort('dob','DateofBirth');?></th>
            <th><?php echo $pgin->sort('created','Created');?></th>
            <th>Action</th>
        </tr>
        <tbody>
        <tr>
            <?php foreach($Members as $mem):?>
            <td><?php echo $this->Html->link($mem['Member']['id'],array('action'=>'memberview',$mem['Member']['id']));?></td>
            <td><?php echo $mem['Member']['name'];?></td>
            <td><?php echo $mem['Member']['email'];?></td>
            <td><?php echo $mem['Member']['contactph'];?></td>
            <td><?php echo $mem['Member']['type'];?></td>
            <td><?php echo $mem['Member']['dob'];?></td>
            <td><?php echo $mem['Member']['created'];?></td>
            <td>
		<?php echo $this->Html->link('Edit', array('action' => 'memberedit', $mem['Member']['id'])); ?>
		<?php echo $this->Html->link('Delete',array('action' => 'memberdelete',$mem['Member']['id'])); ?>
	    </td>
	</tr>
    </tbody>
	<?php endforeach; ?>
	<?php unset($mem); ?>
</table>
<div class='pagin'>
    <?php
		echo $pgin->first(" FIRST ");
		if($pgin->hasPrev()){
		echo $pgin->prev(' PREV ');
		}
		echo $pgin->numbers(array('modulus'=>2));
		if($pgin->hasNext()){
		echo $pgin->next(" NEXT ");
		}
		echo $pgin->last(' LAST ');
	?>
	</div>
