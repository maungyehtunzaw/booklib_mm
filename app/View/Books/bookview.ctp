<h1>Book Infomation(view/only)</h1>
<?php 
$this->Html->addCrumb('Transition', '/Books');
$this->Html->addCrumb('View','/Books') ;
$this->Html->addCrumb($book['Book']['title']);
?>
<table border='0' width='50%'>
	<tr>
		<td>Book Title</td>
		<td><?php echo h($book['Book']['title']); ?></td>
	</tr>
	<tr>
		<td>English Title</td>
		<td><?php echo h($book['Book']['entitle']); ?></td>
	</tr>
	<tr>
		<td>Author's Name</td>
		<td><?=$this->Html->link($book['Author']['name'],array("controller"=>"Authors","action"=>"authorview",$book["Author"]['id'])); ?>
	</tr>

	<tr>
		<td>Publisher's Name</td>
		<td><?=$this->Html->link($book['Publisher']['name'],array("controller"=>"Publishers","action"=>"publisherview",$book['Publisher']['id'])); ?></td>
	</tr>
	<tr>
		<td>ISBN</td>
		<td><?php echo $book['Book']['ISBN']; ?></td>
	</tr>
	<tr>
		<td>Book Quantity</td>
		<td><?php echo $book['Book']['bookqty']; ?>
	</tr>
	<tr>
		<td>Borrow Price</td>
		<td><?php echo $book['Book']['borrow_price']; ?>
	</tr>

	<tr>
		<td>Demage Price</td>
		<td><?php echo $book['Book']['demage_price']; ?>
	</tr>

	<tr>
		<td>Book's Description</td>
		<td><?php echo $book['Book']['description']; ?>
	</tr>

	
	<tr>
		<td>Created Date</td>
		<td><?php echo $book['Book']['created']; ?></td>
	</tr>
	<tr>
		<td colspan='2'>
			<?php echo $this->Html->link('Back To Book List',array('action'=>'index')); ?> | 
			<?php echo $this->Html->link('Edit',array('action'=>'bookedit',$book['Book']['id'])); ?>

</table>
Book Cover
<?php
echo '<img src="data:image/jpeg;base64,'.base64_encode( $book['Book']['book_cover'] ).'"/>';
echo '<br>';
echo $book['Book']['book_cover'];
	?>