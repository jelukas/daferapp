<div class="partestalleres index">
	<h2><?php __('Partestalleres');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('Id');?></th>
			
			<th><?php echo $this->Paginator->sort('Tarea');?></th>
			<th><?php echo $this->Paginator->sort('Fecha');?></th>
			<th><?php echo $this->Paginator->sort('Hora inicio');?></th>
			<th><?php echo $this->Paginator->sort('Hora final');?></th>
			<th><?php echo $this->Paginator->sort('Horas imputables');?></th>
			<th><?php echo $this->Paginator->sort('Horas no imputables');?></th>
			<th><?php echo $this->Paginator->sort('Operacion');?></th>
			<th><?php echo $this->Paginator->sort('Observaciones');?></th>
			<th><?php echo $this->Paginator->sort('Firmado por');?></th>
			<th><?php echo $this->Paginator->sort('DNI');?></th>
			<th><?php echo $this->Paginator->sort('Parte escaneado');?></th>
			<th class="actions"><?php __('Acciones');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($partestalleres as $partestallere):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $partestallere['Partestallere']['id']; ?>&nbsp;</td>
		
		<td>
			<?php echo $this->Html->link($partestallere['Tarea']['id'], array('controller' => 'tareas', 'action' => 'view', $partestallere['Tarea']['id'])); ?>
		</td>
		<td><?php echo $partestallere['Partestallere']['fecha']; ?>&nbsp;</td>
		<td><?php echo $partestallere['Partestallere']['horainicio']; ?>&nbsp;</td>
		<td><?php echo $partestallere['Partestallere']['horafinal']; ?>&nbsp;</td>
		<td><?php echo $partestallere['Partestallere']['horasimputables']; ?>&nbsp;</td>
		<td><?php echo $partestallere['Partestallere']['horasnoimputables']; ?>&nbsp;</td>
		<td><?php echo $partestallere['Partestallere']['operacion']; ?>&nbsp;</td>
		<td><?php echo $partestallere['Partestallere']['observaciones']; ?>&nbsp;</td>
		<td><?php echo $partestallere['Partestallere']['firmadopor']; ?>&nbsp;</td>
		<td><?php echo $partestallere['Partestallere']['DNI']; ?>&nbsp;</td>
		<td><?php echo $partestallere['Partestallere']['parteescaneado']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Ver', true), array('action' => 'view', $partestallere['Partestallere']['id'])); ?>
			<?php echo $this->Html->link(__('Editar', true), array('action' => 'edit', $partestallere['Partestallere']['id'])); ?>
			<?php echo $this->Html->link(__('Eliminar', true), array('action' => 'delete', $partestallere['Partestallere']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $partestallere['Partestallere']['id'])); ?>
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
		<?php echo $this->Paginator->prev('<< ' . __('Anterior', true), array(), null, array('class'=>'disabled'));?>
	 | 	<?php echo $this->Paginator->numbers();?>
 |
		<?php echo $this->Paginator->next(__('Siguiente', true) . ' >>', array(), null, array('class' => 'disabled'));?>
	</div>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Nuevo Parte de taller', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('Listar Ordenes', true), array('controller' => 'ordenes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Articulos', true), array('controller' => 'articulos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Articulo', true), array('controller' => 'articulos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Mecanicos', true), array('controller' => 'mecanicos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Mecanico', true), array('controller' => 'mecanicos', 'action' => 'add')); ?> </li>
	</ul>
</div>