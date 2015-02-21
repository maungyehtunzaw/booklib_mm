<h1>Publisher's Infomation</h1>
<?php 
$this->Html->addCrumb('Publishers', array("controller"=>"Publishers","action"=>"publisherhome"));
?>
<table class='table'>
	<tr>
		<td>Name</td>
		<td><?=$pub['Publisher']['name']; ?></td>
	</tr>
	<tr>
		<td>Company</td>
		<td><?=$pub['Publisher']['company']; ?></td>
	</tr>
	<tr>
		<td>Contact Phone</td>
		<td><?=$pub['Publisher']['contactph']; ?></td>
	</tr>
	<tr>
		<td>Status</td>
		<td><?=$pub['Publisher']['status'];?></td>
	</tr>
	<tr>
		<td>Address</td>
		<td><?=$pub['Publisher']['address']; ?></td>
	</tr>
	<tr>
		<td>Created Date</td>
		<td><?=$pub['Publisher']['created']; ?></td>
	</tr>
	<tr>
		<td>Modified Date</td>
		<td><?=$pub['Publisher']['modified']; ?></td>
	</tr>
	<tr>
		<td><?php echo $this->Html->link('Back To Publisher List',array('action'=>'publisherhome')); ?></td>
		<td><?php echo $this->Html->link('Edit Publisher',array('action'=>'publisheredit',$pub['Publisher']['id'])); ?></td>
	</tr>
</table>
