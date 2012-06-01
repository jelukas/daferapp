<div class="tareaspresupuestoclientes form">
<?php echo $this->Form->create('Tareaspresupuestocliente');?>
	<fieldset>
 		<legend><?php __('Edit Tareaspresupuestocliente'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('asunto');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('Tareaspresupuestocliente.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('Tareaspresupuestocliente.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Tareaspresupuestoclientes', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Presupuestosclientes', true), array('controller' => 'presupuestosclientes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Presupuestoscliente', true), array('controller' => 'presupuestosclientes', 'action' => 'add')); ?> </li>
	</ul>
</div>