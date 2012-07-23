<div class="tareasAlbaranesclientesreparacionesPartestalleres index">
	<h2><?php __('Tareas Albaranesclientesreparaciones Partestalleres');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('tareas_albaranesclientesreparacione_id');?></th>
			<th><?php echo $this->Paginator->sort('mecanico_id');?></th>
			<th><?php echo $this->Paginator->sort('numero');?></th>
			<th><?php echo $this->Paginator->sort('fecha');?></th>
			<th><?php echo $this->Paginator->sort('horainicio');?></th>
			<th><?php echo $this->Paginator->sort('horafinal');?></th>
			<th><?php echo $this->Paginator->sort('horasimputables');?></th>
			<th><?php echo $this->Paginator->sort('horasreales');?></th>
			<th><?php echo $this->Paginator->sort('operacion');?></th>
			<th><?php echo $this->Paginator->sort('parteescaneado');?></th>
			<th><?php echo $this->Paginator->sort('partestallere_id');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($tareasAlbaranesclientesreparacionesPartestalleres as $tareasAlbaranesclientesreparacionesPartestallere):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $tareasAlbaranesclientesreparacionesPartestallere['TareasAlbaranesclientesreparacionesPartestallere']['id']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($tareasAlbaranesclientesreparacionesPartestallere['TareasAlbaranesclientesreparacione']['id'], array('controller' => 'tareas_albaranesclientesreparaciones', 'action' => 'view', $tareasAlbaranesclientesreparacionesPartestallere['TareasAlbaranesclientesreparacione']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($tareasAlbaranesclientesreparacionesPartestallere['Mecanico']['nombre'], array('controller' => 'mecanicos', 'action' => 'view', $tareasAlbaranesclientesreparacionesPartestallere['Mecanico']['id'])); ?>
		</td>
		<td><?php echo $tareasAlbaranesclientesreparacionesPartestallere['TareasAlbaranesclientesreparacionesPartestallere']['numero']; ?>&nbsp;</td>
		<td><?php echo $tareasAlbaranesclientesreparacionesPartestallere['TareasAlbaranesclientesreparacionesPartestallere']['fecha']; ?>&nbsp;</td>
		<td><?php echo $tareasAlbaranesclientesreparacionesPartestallere['TareasAlbaranesclientesreparacionesPartestallere']['horainicio']; ?>&nbsp;</td>
		<td><?php echo $tareasAlbaranesclientesreparacionesPartestallere['TareasAlbaranesclientesreparacionesPartestallere']['horafinal']; ?>&nbsp;</td>
		<td><?php echo $tareasAlbaranesclientesreparacionesPartestallere['TareasAlbaranesclientesreparacionesPartestallere']['horasimputables']; ?>&nbsp;</td>
		<td><?php echo $tareasAlbaranesclientesreparacionesPartestallere['TareasAlbaranesclientesreparacionesPartestallere']['horasreales']; ?>&nbsp;</td>
		<td><?php echo $tareasAlbaranesclientesreparacionesPartestallere['TareasAlbaranesclientesreparacionesPartestallere']['operacion']; ?>&nbsp;</td>
		<td><?php echo $tareasAlbaranesclientesreparacionesPartestallere['TareasAlbaranesclientesreparacionesPartestallere']['parteescaneado']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($tareasAlbaranesclientesreparacionesPartestallere['Partestallere']['id'], array('controller' => 'partestalleres', 'action' => 'view', $tareasAlbaranesclientesreparacionesPartestallere['Partestallere']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $tareasAlbaranesclientesreparacionesPartestallere['TareasAlbaranesclientesreparacionesPartestallere']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $tareasAlbaranesclientesreparacionesPartestallere['TareasAlbaranesclientesreparacionesPartestallere']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $tareasAlbaranesclientesreparacionesPartestallere['TareasAlbaranesclientesreparacionesPartestallere']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $tareasAlbaranesclientesreparacionesPartestallere['TareasAlbaranesclientesreparacionesPartestallere']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Tareas Albaranesclientesreparaciones Partestallere', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Tareas Albaranesclientesreparaciones', true), array('controller' => 'tareas_albaranesclientesreparaciones', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tareas Albaranesclientesreparacione', true), array('controller' => 'tareas_albaranesclientesreparaciones', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Partestalleres', true), array('controller' => 'partestalleres', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Partestallere', true), array('controller' => 'partestalleres', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Mecanicos', true), array('controller' => 'mecanicos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Mecanico', true), array('controller' => 'mecanicos', 'action' => 'add')); ?> </li>
	</ul>
</div>