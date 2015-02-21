<h1>Author's Infomation</h1>
<table class='table' width='500px;'>
	<tr>
		<td>Author Name</td>
		<td><?php echo $author['Author']['name']; ?></td>
	</tr>
	<tr>
		<td>Date Of Birth</td>
		<td><?php echo $author['Author']['dob']; ?></td>
	<tr>
		<td>Gender</td>
		<td><?php echo $author['Author']['gender']; ?></td>
	<tr>
		<td>Address</td>
		<td><?php echo $author['Author']['address'];?></td>
	</tr>
		<td>Status</td>
		<td><?php echo $author['Author']['status']; ?></td>
	</tr>
	<tr>
		<td>Biography</td>
		<td><?php echo $author['Author']['biography']; ?></td>
	</tr>
	<tr>
		<td>Created Date</td>
		<td><?php echo $author['Author']['created'];?></td>
	</tr>
	<tr>
		<td>Modified Date</td>
		<td><?php echo $author['Author']['modified']; ?></td>
	</tr>
</table>


 <?php
echo $this->Html->link('Back To Author List',array('action'=>'authorhome'));
echo ' | ';
echo $this->Html->link('Edit Author Info',array('action'=>'authoredit')); 
?>
