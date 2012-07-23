<div class="articulosTareasAlbaranesclientesreparaciones form">
<?php echo $this->Form->create('ArticulosTareasAlbaranesclientesreparacione');?>
	<fieldset>
 		<legend><?php __('Add Articulos Tareas Albaranesclientesreparacione'); ?></legend>
	<?php
		echo $this->Form->input('articulo_id');
		echo $this->Form->input('tareas_albaranesclientesreparacione_id');
		echo $this->Form->input('cantidadreal');
		echo $this->Form->input('cantidad');
		echo $this->Form->input('descuento');
		echo $this->Form->input('articulos_tarea_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Articulos Tareas Albaranesclientesreparaciones', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Articulos', true), array('controller' => 'articulos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Articulo', true), array('controller' => 'articulos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Articulos Tareas', true), array('controller' => 'articulos_tareas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Articulos Tarea', true), array('controller' => 'articulos_tareas', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Tareas Albaranesclientesreparaciones', true), array('controller' => 'tareas_albaranesclientesreparaciones', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tareas Albaranesclientesreparacione', true), array('controller' => 'tareas_albaranesclientesreparaciones', 'action' => 'add')); ?> </li>
	</ul>
</div>