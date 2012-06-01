<div class="provincias form">
<?php echo $this->Form->create('Provincia');?>
	<fieldset>
 		<legend><?php __('Edit Provincia'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('provincia');
		echo $this->Form->input('provinciaseo');
		echo $this->Form->input('provincia3');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('Provincia.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('Provincia.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Provincias', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Poblaciones', true), array('controller' => 'poblaciones', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Poblacione', true), array('controller' => 'poblaciones', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Proveedores', true), array('controller' => 'proveedores', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Proveedore', true), array('controller' => 'proveedores', 'action' => 'add')); ?> </li>
	</ul>
</div>