<h1>Publihser List</h1>
<?php 
$this->Html->addCrumb('Publishers', array("controller"=>"Publishers","action"=>"publisherhome"));

?>
<?php echo $this->Html->link('Add Publisher',array('controller'=>'Publishers','action'=>'publisheradd')); ?>
<?php $paginator=$this->Paginator; ?>
<table class='table table-striped'>
    <tr>
        <th><?php echo $paginator->sort('id','ID'); ?></th>
        <th><?php echo $paginator->sort('name','Name'); ?></th>
        <th><?php echo $paginator->sort('company','Company');?></th>
        <th>Contact-Ph</th>
        <th><?php echo $paginator->sort('created','Created');?></th>
        <th>Action</th>
    </tr>
    <?php foreach($Publishers as $pub) : ?>
    <tr>
        <td><?php echo $this->Html->link($pub['Publisher']['id'],array('action'=>'publisherview',$pub['Publisher']['id']));?></td>
        <td><?php echo $pub['Publisher']['name'];?></td>
        <td><?php echo $pub['Publisher']['company'];?></td>
        <td><?php echo $pub['Publisher']['contactph'];?></td>
        <td><?php echo $pub['Publisher']['created'];?></td>
        <td>
            <?php echo $this->Html->link('Edit',array('action'=>'publisheredit',$pub['Publisher']['id'])); ?>
            <?php
                echo $this->Form->postLink(
                    'Delete',
                    array('action' => 'authordelete', $pub['Publisher']['id']),
                    array('confirm' => 'Are you sure Want To Delete?')
                );
            ?>

        </td>
    </tr>
        <?php endforeach; ?>
        <?php unset($pub); ?>
    
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
