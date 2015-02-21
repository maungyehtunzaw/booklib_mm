<h1>Menu</h1>
<!--
<?php echo $this->Html->link('Transition',array('controller' => 'Transitions', 'action' => 'index')); ?><br>
<?php echo $this->Html->link('Manage Book',array('controller' => 'Books', 'action' => 'index')); ?><br>
<?php echo $this->Html->link('Manage Publisher',array('controller' => 'Publishers', 'action' => 'publisherhome')); ?><br>
<?php echo $this->Html->link('Manage Author',array('controller' => 'Authors', 'action' => 'authorhome')); ?><br>
<?php echo $this->Html->link('Manage Member',array('controller' => 'Members', 'action' => 'memberhome')); ?><br>
<?php echo $this->Html->link('Manage Users',array('controller'=>'Users','action'=>'index')); ?>
-->


<div id='cssmenu'>
<ul>
	<li class='active'><span><?php echo $this->Html->link('Home',array('controller' => 'pages', 'action' => 'homepage')); ?></li>

   <li class='active'><span><?php echo $this->Html->link('Manage Transition',array('controller' => 'Transitions', 'action' => 'index')); ?></li>
  
   <li><?php echo $this->Html->link('Manage Book',array('controller' => 'Books', 'action' => 'index')); ?></li>

   <li><?php echo $this->Html->link('Manage Publisher',array('controller' => 'Publishers', 'action' => 'publisherhome')); ?></li>

   <li><?php echo $this->Html->link('Manage Author',array('controller' => 'Authors', 'action' => 'authorhome')); ?></li>

   <li><?php echo $this->Html->link('Manage Member',array('controller' => 'Members', 'action' => 'memberhome')); ?></li>

   <li class='last'><?php echo $this->Html->link('Manage Users',array('controller'=>'Users','action'=>'index')); ?></li>
</ul>
</div>