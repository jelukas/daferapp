<div class="tareasAlbaranesclientesreparacionesPartes form">
<?php echo $this->Form->create('TareasAlbaranesclientesreparacionesParte');?>
	<fieldset>
 		<legend><?php __('Edit Tareas Albaranesclientesreparaciones Parte'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('numero');
		echo $this->Form->input('tareas_albaranesclientesreparacione_id');
		echo $this->Form->input('mecanico_id');
		echo $this->Form->input('fecha');
		echo $this->Form->input('horainicio');
		echo $this->Form->input('horafinal');
		echo $this->Form->input('horasimputables');
		echo $this->Form->input('horasreales');
		echo $this->Form->input('horasdesplazamientoinicio_ida');
		echo $this->Form->input('horasdesplazamientofin_ida');
		echo $this->Form->input('horasdesplazamientoreales_ida');
		echo $this->Form->input('horasdesplazamientoimputables_ida');
		echo $this->Form->input('kilometrajereal_ida');
		echo $this->Form->input('kilometrajeimputable_ida');
		echo $this->Form->input('horasdesplazamientoinicio_vuelta');
		echo $this->Form->input('horasdesplazamientofin_vuelta');
		echo $this->Form->input('horasdesplazamientoreales_vuelta');
		echo $this->Form->input('horasdesplazamientoimputables_vuelta');
		echo $this->Form->input('kilometrajereal_vuelta');
		echo $this->Form->input('kilometrajeimputable_vuelta');
		echo $this->Form->input('preciodesplazamiento');
		echo $this->Form->input('dietasreales');
		echo $this->Form->input('dietasimputables');
		echo $this->Form->input('otrosservicios_real');
		echo $this->Form->input('otrosservicios_imputable');
		echo $this->Form->input('operacion');
		echo $this->Form->input('parteescaneado');
		echo $this->Form->input('parte_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('TareasAlbaranesclientesreparacionesParte.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('TareasAlbaranesclientesreparacionesParte.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Tareas Albaranesclientesreparaciones Partes', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Tareas Albaranesclientesreparaciones', true), array('controller' => 'tareas_albaranesclientesreparaciones', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tareas Albaranesclientesreparacione', true), array('controller' => 'tareas_albaranesclientesreparaciones', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Partes', true), array('controller' => 'partes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Parte', true), array('controller' => 'partes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Mecanicos', true), array('controller' => 'mecanicos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Mecanico', true), array('controller' => 'mecanicos', 'action' => 'add')); ?> </li>
	</ul>
</div>