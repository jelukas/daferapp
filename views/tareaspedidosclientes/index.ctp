<div class="tareaspedidosclientes index">
	<h2><?php __('Tareaspedidosclientes');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('asunto');?></th>
			<th><?php echo $this->Paginator->sort('materiales');?></th>
			<th><?php echo $this->Paginator->sort('mano_de_obra');?></th>
			<th><?php echo $this->Paginator->sort('servicios');?></th>
			<th><?php echo $this->Paginator->sort('pedidoscliente_id');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($tareaspedidosclientes as $tareaspedidoscliente):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $tareaspedidoscliente['Tareaspedidoscliente']['id']; ?>&nbsp;</td>
		<td><?php echo $tareaspedidoscliente['Tareaspedidoscliente']['asunto']; ?>&nbsp;</td>
		<td><?php echo $tareaspedidoscliente['Tareaspedidoscliente']['materiales']; ?>&nbsp;</td>
		<td><?php echo $tareaspedidoscliente['Tareaspedidoscliente']['mano_de_obra']; ?>&nbsp;</td>
		<td><?php echo $tareaspedidoscliente['Tareaspedidoscliente']['servicios']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($tareaspedidoscliente['Pedidoscliente']['id'], array('controller' => 'pedidosclientes', 'action' => 'view', $tareaspedidoscliente['Pedidoscliente']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $tareaspedidoscliente['Tareaspedidoscliente']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $tareaspedidoscliente['Tareaspedidoscliente']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $tareaspedidoscliente['Tareaspedidoscliente']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $tareaspedidoscliente['Tareaspedidoscliente']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Tareaspedidoscliente', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Pedidosclientes', true), array('controller' => 'pedidosclientes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Pedidoscliente', true), array('controller' => 'pedidosclientes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Tareaspedidosclientes Otrosservicios', true), array('controller' => 'tareaspedidosclientes_otrosservicios', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tareaspedidosclientes Otrosservicio', true), array('controller' => 'tareaspedidosclientes_otrosservicios', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Materiales Tareaspedidosclientes', true), array('controller' => 'materiales_tareaspedidosclientes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Materiales Tareaspedidoscliente', true), array('controller' => 'materiales_tareaspedidosclientes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Manodeobras Tareaspedidosclientes', true), array('controller' => 'manodeobras_tareaspedidosclientes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Manodeobras Tareaspedidoscliente', true), array('controller' => 'manodeobras_tareaspedidosclientes', 'action' => 'add')); ?> </li>
	</ul>
</div>