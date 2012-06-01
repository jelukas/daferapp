<div class="mecanicosPartes form">
<?php echo $this->Form->create('MecanicosParte');?>
	<fieldset>
 		<legend><?php __('Add Mecanicos Parte'); ?></legend>
	<?php
		echo $this->Form->input('mecanico_id');
		echo $this->Form->input('parte_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Mecanicos Partes', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Mecanicos', true), array('controller' => 'mecanicos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Mecanico', true), array('controller' => 'mecanicos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Partes', true), array('controller' => 'partes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Parte', true), array('controller' => 'partes', 'action' => 'add')); ?> </li>
	</ul>
</div>