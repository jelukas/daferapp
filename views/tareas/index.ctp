<div class="tareas index">
	<h2><?php __('Tareas');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('ID');?></th>
			<th><?php echo $this->Paginator->sort('Nº Orden');?></th>
			<th><?php echo $this->Paginator->sort('Descripción');?></th>
			<th class="actions"><?php __('Acciones');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($tareas as $tarea):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $tarea['Tarea']['id']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($tarea['Ordene']['id'], array('controller' => 'ordenes', 'action' => 'view', $tarea['Ordene']['id'])); ?>
		</td>
		<td><?php echo $tarea['Tarea']['descripcion']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Ver', true), array('action' => 'view', $tarea['Tarea']['id'])); ?>
			<?php echo $this->Html->link(__('Editar', true), array('action' => 'edit', $tarea['Tarea']['id'])); ?>
			<?php echo $this->Html->link(__('Eliminar', true), array('action' => 'delete', $tarea['Tarea']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $tarea['Tarea']['id'])); ?>
                        <?php echo $this->Html->link(__('Pdf', true), array('action' => 'pdf', $tarea['Tarea']['id'])); ?>
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
<!--<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Tarea', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Ordenes', true), array('controller' => 'ordenes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Ordene', true), array('controller' => 'ordenes', 'action' => 'add')); ?> </li>
	</ul>
</div>-->