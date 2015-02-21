<h1>Transition Information</h1>
<?php 
$this->Html->addCrumb('Transition', '/transitions');
$this->Html->addCrumb('View','/transitions') ;
$this->Html->addCrumb($Transition['Transition']['id']);
?>

<table class="table-hover">
	<tr>
		<th width="200px">Item</th>
		<th width="500px">Description</th>
	</tr>
	<tr>
		<td>Member Name</td>
		<td><?=$this->Html->link($Transition['Member']['name'],array("controller"=>"Member","action"=>"memberview",$Transition['Member']['id'])); ?></td>
	</tr>
	<tr>
		<td>Book Name</td>
		<td><?=$this->Html->link($Transition['Book']['title'],array("controller"=>"Books","action"=>"bookview",$Transition['Book']['id'])); ?></td>
	<tr>
	<tr>
		<td>Book Status</td>
		<td>
			<?php
			switch($Transition['Transition']['status']){
			case 'aa':echo "accepted";break;
			case 'bb':echo "Not Accepted";break;
			case 'cc':echo "Demage&Lost";break;
			case 'dd':echo "Expired";break;
			case 'ee':echo "Delete";break;
			default: echo "Somethings Wrong";break;
			}
			?>
		</td>
	</tr>
	<tr>
		<td>Remark</td>
		<td><?=$Transition['Transition']['remarks'];?></td>
	</tr>
		<td>Borrow Date</td>
		<td><?=$this->Time->timeAgoInWords($Transition['Transition']['created']); ?></td>
	</tr>
</table>
<?php debug($Transition); ?>