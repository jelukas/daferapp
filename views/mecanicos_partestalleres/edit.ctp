<div class="mecanicosPartestalleres form">
<?php echo $this->Form->create('MecanicosPartestallere');?>
	<fieldset>
 		<legend><?php __('Edit Mecanicos Partestallere'); ?></legend>
	<?php
		echo $this->Form->input('mecanico_id');
		echo $this->Form->input('partestallere_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('MecanicosPartestallere.partestallere_id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('MecanicosPartestallere.partestallere_id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Mecanicos Partestalleres', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Mecanicos', true), array('controller' => 'mecanicos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Mecanico', true), array('controller' => 'mecanicos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Partestalleres', true), array('controller' => 'partestalleres', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Partestallere', true), array('controller' => 'partestalleres', 'action' => 'add')); ?> </li>
	</ul>
</div>