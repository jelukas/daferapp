<div class="tareasAlbaranesclientesreparacionesPartes index">
	<h2><?php __('Tareas Albaranesclientesreparaciones Partes');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('numero');?></th>
			<th><?php echo $this->Paginator->sort('tareas_albaranesclientesreparacione_id');?></th>
			<th><?php echo $this->Paginator->sort('mecanico_id');?></th>
			<th><?php echo $this->Paginator->sort('fecha');?></th>
			<th><?php echo $this->Paginator->sort('horainicio');?></th>
			<th><?php echo $this->Paginator->sort('horafinal');?></th>
			<th><?php echo $this->Paginator->sort('horasimputables');?></th>
			<th><?php echo $this->Paginator->sort('horasreales');?></th>
			<th><?php echo $this->Paginator->sort('horasdesplazamientoinicio_ida');?></th>
			<th><?php echo $this->Paginator->sort('horasdesplazamientofin_ida');?></th>
			<th><?php echo $this->Paginator->sort('horasdesplazamientoreales_ida');?></th>
			<th><?php echo $this->Paginator->sort('horasdesplazamientoimputables_ida');?></th>
			<th><?php echo $this->Paginator->sort('kilometrajereal_ida');?></th>
			<th><?php echo $this->Paginator->sort('kilometrajeimputable_ida');?></th>
			<th><?php echo $this->Paginator->sort('horasdesplazamientoinicio_vuelta');?></th>
			<th><?php echo $this->Paginator->sort('horasdesplazamientofin_vuelta');?></th>
			<th><?php echo $this->Paginator->sort('horasdesplazamientoreales_vuelta');?></th>
			<th><?php echo $this->Paginator->sort('horasdesplazamientoimputables_vuelta');?></th>
			<th><?php echo $this->Paginator->sort('kilometrajereal_vuelta');?></th>
			<th><?php echo $this->Paginator->sort('kilometrajeimputable_vuelta');?></th>
			<th><?php echo $this->Paginator->sort('preciodesplazamiento');?></th>
			<th><?php echo $this->Paginator->sort('dietasreales');?></th>
			<th><?php echo $this->Paginator->sort('dietasimputables');?></th>
			<th><?php echo $this->Paginator->sort('otrosservicios_real');?></th>
			<th><?php echo $this->Paginator->sort('otrosservicios_imputable');?></th>
			<th><?php echo $this->Paginator->sort('operacion');?></th>
			<th><?php echo $this->Paginator->sort('parteescaneado');?></th>
			<th><?php echo $this->Paginator->sort('parte_id');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($tareasAlbaranesclientesreparacionesPartes as $tareasAlbaranesclientesreparacionesParte):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $tareasAlbaranesclientesreparacionesParte['TareasAlbaranesclientesreparacionesParte']['id']; ?>&nbsp;</td>
		<td><?php echo $tareasAlbaranesclientesreparacionesParte['TareasAlbaranesclientesreparacionesParte']['numero']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($tareasAlbaranesclientesreparacionesParte['TareasAlbaranesclientesreparacione']['id'], array('controller' => 'tareas_albaranesclientesreparaciones', 'action' => 'view', $tareasAlbaranesclientesreparacionesParte['TareasAlbaranesclientesreparacione']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($tareasAlbaranesclientesreparacionesParte['Mecanico']['nombre'], array('controller' => 'mecanicos', 'action' => 'view', $tareasAlbaranesclientesreparacionesParte['Mecanico']['id'])); ?>
		</td>
		<td><?php echo $tareasAlbaranesclientesreparacionesParte['TareasAlbaranesclientesreparacionesParte']['fecha']; ?>&nbsp;</td>
		<td><?php echo $tareasAlbaranesclientesreparacionesParte['TareasAlbaranesclientesreparacionesParte']['horainicio']; ?>&nbsp;</td>
		<td><?php echo $tareasAlbaranesclientesreparacionesParte['TareasAlbaranesclientesreparacionesParte']['horafinal']; ?>&nbsp;</td>
		<td><?php echo $tareasAlbaranesclientesreparacionesParte['TareasAlbaranesclientesreparacionesParte']['horasimputables']; ?>&nbsp;</td>
		<td><?php echo $tareasAlbaranesclientesreparacionesParte['TareasAlbaranesclientesreparacionesParte']['horasreales']; ?>&nbsp;</td>
		<td><?php echo $tareasAlbaranesclientesreparacionesParte['TareasAlbaranesclientesreparacionesParte']['horasdesplazamientoinicio_ida']; ?>&nbsp;</td>
		<td><?php echo $tareasAlbaranesclientesreparacionesParte['TareasAlbaranesclientesreparacionesParte']['horasdesplazamientofin_ida']; ?>&nbsp;</td>
		<td><?php echo $tareasAlbaranesclientesreparacionesParte['TareasAlbaranesclientesreparacionesParte']['horasdesplazamientoreales_ida']; ?>&nbsp;</td>
		<td><?php echo $tareasAlbaranesclientesreparacionesParte['TareasAlbaranesclientesreparacionesParte']['horasdesplazamientoimputables_ida']; ?>&nbsp;</td>
		<td><?php echo $tareasAlbaranesclientesreparacionesParte['TareasAlbaranesclientesreparacionesParte']['kilometrajereal_ida']; ?>&nbsp;</td>
		<td><?php echo $tareasAlbaranesclientesreparacionesParte['TareasAlbaranesclientesreparacionesParte']['kilometrajeimputable_ida']; ?>&nbsp;</td>
		<td><?php echo $tareasAlbaranesclientesreparacionesParte['TareasAlbaranesclientesreparacionesParte']['horasdesplazamientoinicio_vuelta']; ?>&nbsp;</td>
		<td><?php echo $tareasAlbaranesclientesreparacionesParte['TareasAlbaranesclientesreparacionesParte']['horasdesplazamientofin_vuelta']; ?>&nbsp;</td>
		<td><?php echo $tareasAlbaranesclientesreparacionesParte['TareasAlbaranesclientesreparacionesParte']['horasdesplazamientoreales_vuelta']; ?>&nbsp;</td>
		<td><?php echo $tareasAlbaranesclientesreparacionesParte['TareasAlbaranesclientesreparacionesParte']['horasdesplazamientoimputables_vuelta']; ?>&nbsp;</td>
		<td><?php echo $tareasAlbaranesclientesreparacionesParte['TareasAlbaranesclientesreparacionesParte']['kilometrajereal_vuelta']; ?>&nbsp;</td>
		<td><?php echo $tareasAlbaranesclientesreparacionesParte['TareasAlbaranesclientesreparacionesParte']['kilometrajeimputable_vuelta']; ?>&nbsp;</td>
		<td><?php echo $tareasAlbaranesclientesreparacionesParte['TareasAlbaranesclientesreparacionesParte']['preciodesplazamiento']; ?>&nbsp;</td>
		<td><?php echo $tareasAlbaranesclientesreparacionesParte['TareasAlbaranesclientesreparacionesParte']['dietasreales']; ?>&nbsp;</td>
		<td><?php echo $tareasAlbaranesclientesreparacionesParte['TareasAlbaranesclientesreparacionesParte']['dietasimputables']; ?>&nbsp;</td>
		<td><?php echo $tareasAlbaranesclientesreparacionesParte['TareasAlbaranesclientesreparacionesParte']['otrosservicios_real']; ?>&nbsp;</td>
		<td><?php echo $tareasAlbaranesclientesreparacionesParte['TareasAlbaranesclientesreparacionesParte']['otrosservicios_imputable']; ?>&nbsp;</td>
		<td><?php echo $tareasAlbaranesclientesreparacionesParte['TareasAlbaranesclientesreparacionesParte']['operacion']; ?>&nbsp;</td>
		<td><?php echo $tareasAlbaranesclientesreparacionesParte['TareasAlbaranesclientesreparacionesParte']['parteescaneado']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($tareasAlbaranesclientesreparacionesParte['Parte']['id'], array('controller' => 'partes', 'action' => 'view', $tareasAlbaranesclientesreparacionesParte['Parte']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $tareasAlbaranesclientesreparacionesParte['TareasAlbaranesclientesreparacionesParte']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $tareasAlbaranesclientesreparacionesParte['TareasAlbaranesclientesreparacionesParte']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $tareasAlbaranesclientesreparacionesParte['TareasAlbaranesclientesreparacionesParte']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $tareasAlbaranesclientesreparacionesParte['TareasAlbaranesclientesreparacionesParte']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Tareas Albaranesclientesreparaciones Parte', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Tareas Albaranesclientesreparaciones', true), array('controller' => 'tareas_albaranesclientesreparaciones', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tareas Albaranesclientesreparacione', true), array('controller' => 'tareas_albaranesclientesreparaciones', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Partes', true), array('controller' => 'partes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Parte', true), array('controller' => 'partes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Mecanicos', true), array('controller' => 'mecanicos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Mecanico', true), array('controller' => 'mecanicos', 'action' => 'add')); ?> </li>
	</ul>
</div>