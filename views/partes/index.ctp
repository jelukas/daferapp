<div class="partes index">
	<h2><?php __('Partes');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('Id');?></th>
			<th><?php echo $this->Paginator->sort('Operación');?></th>
			<th><?php echo $this->Paginator->sort('Fecha');?></th>
			<th><?php echo $this->Paginator->sort('Hora de Inicio');?></th>
			<th><?php echo $this->Paginator->sort('Hora de final');?></th>
			<th><?php echo $this->Paginator->sort('Observaciones');?></th>
			<th class="actions"><?php __('Acciones');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($partes as $parte):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $parte['Parte']['id']; ?>&nbsp;</td>
		<td><?php echo $parte['Parte']['operacion']; ?>&nbsp;</td>
		<td><?php echo $parte['Parte']['fecha']; ?>&nbsp;</td>
		<td><?php echo $parte['Parte']['horainicio']; ?>&nbsp;</td>
		<td><?php echo $parte['Parte']['horafinal']; ?>&nbsp;</td>
		<td><?php echo $parte['Parte']['observaciones']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Ver', true), array('action' => 'view', $parte['Parte']['id'])); ?>
			<?php echo $this->Html->link(__('Editar', true), array('action' => 'edit', $parte['Parte']['id'])); ?>
			<?php echo $this->Html->link(__('Eliminar', true), array('action' => 'delete', $parte['Parte']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $parte['Parte']['id'])); ?>
                        <?php echo $this->Html->link(__('Pdf', true), array('action' => 'pdf', $parte['Parte']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('Nuevo Parte', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('Listar Ordenes', true), array('controller' => 'ordenes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nueva Orden', true), array('controller' => 'ordenes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Mecánicos', true), array('controller' => 'mecanicos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Mecánico', true), array('controller' => 'mecanicos', 'action' => 'add')); ?> </li>
	</ul>
</div>