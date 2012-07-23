<div class="tareasAlbaranesclientesreparacionesPartestalleres form">
<?php echo $this->Form->create('TareasAlbaranesclientesreparacionesPartestallere');?>
	<fieldset>
 		<legend><?php __('Edit Tareas Albaranesclientesreparaciones Partestallere'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('tareas_albaranesclientesreparacione_id');
		echo $this->Form->input('mecanico_id');
		echo $this->Form->input('numero');
		echo $this->Form->input('fecha');
		echo $this->Form->input('horainicio');
		echo $this->Form->input('horafinal');
		echo $this->Form->input('horasimputables');
		echo $this->Form->input('horasreales');
		echo $this->Form->input('operacion');
		echo $this->Form->input('parteescaneado');
		echo $this->Form->input('partestallere_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('TareasAlbaranesclientesreparacionesPartestallere.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('TareasAlbaranesclientesreparacionesPartestallere.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Tareas Albaranesclientesreparaciones Partestalleres', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Tareas Albaranesclientesreparaciones', true), array('controller' => 'tareas_albaranesclientesreparaciones', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tareas Albaranesclientesreparacione', true), array('controller' => 'tareas_albaranesclientesreparaciones', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Partestalleres', true), array('controller' => 'partestalleres', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Partestallere', true), array('controller' => 'partestalleres', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Mecanicos', true), array('controller' => 'mecanicos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Mecanico', true), array('controller' => 'mecanicos', 'action' => 'add')); ?> </li>
	</ul>
</div>