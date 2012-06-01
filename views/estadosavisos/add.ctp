<div class="estadosavisos form">
<?php echo $this->Form->create('Estadosaviso');?>
	<fieldset>
 		<legend><?php __('Add Estadosaviso'); ?></legend>
	<?php
		echo $this->Form->input('estado');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Estadosavisos', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Avisosrepuestos', true), array('controller' => 'avisosrepuestos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Avisosrepuesto', true), array('controller' => 'avisosrepuestos', 'action' => 'add')); ?> </li>
	</ul>
</div>