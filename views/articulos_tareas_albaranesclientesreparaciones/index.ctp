<div class="articulosTareasAlbaranesclientesreparaciones index">
	<h2><?php __('Articulos Tareas Albaranesclientesreparaciones');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('articulo_id');?></th>
			<th><?php echo $this->Paginator->sort('tareas_albaranesclientesreparacione_id');?></th>
			<th><?php echo $this->Paginator->sort('cantidadreal');?></th>
			<th><?php echo $this->Paginator->sort('cantidad');?></th>
			<th><?php echo $this->Paginator->sort('descuento');?></th>
			<th><?php echo $this->Paginator->sort('articulos_tarea_id');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($articulosTareasAlbaranesclientesreparaciones as $articulosTareasAlbaranesclientesreparacione):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $articulosTareasAlbaranesclientesreparacione['ArticulosTareasAlbaranesclientesreparacione']['id']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($articulosTareasAlbaranesclientesreparacione['Articulo']['nombre'], array('controller' => 'articulos', 'action' => 'view', $articulosTareasAlbaranesclientesreparacione['Articulo']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($articulosTareasAlbaranesclientesreparacione['TareasAlbaranesclientesreparacione']['id'], array('controller' => 'tareas_albaranesclientesreparaciones', 'action' => 'view', $articulosTareasAlbaranesclientesreparacione['TareasAlbaranesclientesreparacione']['id'])); ?>
		</td>
		<td><?php echo $articulosTareasAlbaranesclientesreparacione['ArticulosTareasAlbaranesclientesreparacione']['cantidadreal']; ?>&nbsp;</td>
		<td><?php echo $articulosTareasAlbaranesclientesreparacione['ArticulosTareasAlbaranesclientesreparacione']['cantidad']; ?>&nbsp;</td>
		<td><?php echo $articulosTareasAlbaranesclientesreparacione['ArticulosTareasAlbaranesclientesreparacione']['descuento']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($articulosTareasAlbaranesclientesreparacione['ArticulosTarea']['id'], array('controller' => 'articulos_tareas', 'action' => 'view', $articulosTareasAlbaranesclientesreparacione['ArticulosTarea']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $articulosTareasAlbaranesclientesreparacione['ArticulosTareasAlbaranesclientesreparacione']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $articulosTareasAlbaranesclientesreparacione['ArticulosTareasAlbaranesclientesreparacione']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $articulosTareasAlbaranesclientesreparacione['ArticulosTareasAlbaranesclientesreparacione']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $articulosTareasAlbaranesclientesreparacione['ArticulosTareasAlbaranesclientesreparacione']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
	));
	?>	</p>

	<div class="paging">
		<?php echo $this->Paginator->prev('<< ' . __('previous', true), array(), null, array('class'=>'disabled'));?>
	 | 	<?php echo $this->Paginator->numbers();?>
 |
		<?php echo $this->Paginator->next(__('next', true) . ' >>', array(), null, array('class' => 'disabled'));?>
	</div>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Articulos Tareas Albaranesclientesreparacione', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Articulos', true), array('controller' => 'articulos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Articulo', true), array('controller' => 'articulos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Articulos Tareas', true), array('controller' => 'articulos_tareas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Articulos Tarea', true), array('controller' => 'articulos_tareas', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Tareas Albaranesclientesreparaciones', true), array('controller' => 'tareas_albaranesclientesreparaciones', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tareas Albaranesclientesreparacione', true), array('controller' => 'tareas_albaranesclientesreparaciones', 'action' => 'add')); ?> </li>
	</ul>
</div>