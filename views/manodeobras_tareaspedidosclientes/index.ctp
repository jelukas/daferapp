<div class="manodeobrasTareaspedidosclientes index">
	<h2><?php __('Manodeobras Tareaspedidosclientes');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('tareaspedidoscliente_id');?></th>
			<th><?php echo $this->Paginator->sort('horas');?></th>
			<th><?php echo $this->Paginator->sort('precio_hora');?></th>
			<th><?php echo $this->Paginator->sort('descuento');?></th>
			<th><?php echo $this->Paginator->sort('importe');?></th>
			<th><?php echo $this->Paginator->sort('descripcion');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($manodeobrasTareaspedidosclientes as $manodeobrasTareaspedidoscliente):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $manodeobrasTareaspedidoscliente['ManodeobrasTareaspedidoscliente']['id']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($manodeobrasTareaspedidoscliente['Tareaspedidoscliente']['asunto'], array('controller' => 'tareaspedidosclientes', 'action' => 'view', $manodeobrasTareaspedidoscliente['Tareaspedidoscliente']['id'])); ?>
		</td>
		<td><?php echo $manodeobrasTareaspedidoscliente['ManodeobrasTareaspedidoscliente']['horas']; ?>&nbsp;</td>
		<td><?php echo $manodeobrasTareaspedidoscliente['ManodeobrasTareaspedidoscliente']['precio_hora']; ?>&nbsp;</td>
		<td><?php echo $manodeobrasTareaspedidoscliente['ManodeobrasTareaspedidoscliente']['descuento']; ?>&nbsp;</td>
		<td><?php echo $manodeobrasTareaspedidoscliente['ManodeobrasTareaspedidoscliente']['importe']; ?>&nbsp;</td>
		<td><?php echo $manodeobrasTareaspedidoscliente['ManodeobrasTareaspedidoscliente']['descripcion']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $manodeobrasTareaspedidoscliente['ManodeobrasTareaspedidoscliente']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $manodeobrasTareaspedidoscliente['ManodeobrasTareaspedidoscliente']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $manodeobrasTareaspedidoscliente['ManodeobrasTareaspedidoscliente']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $manodeobrasTareaspedidoscliente['ManodeobrasTareaspedidoscliente']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Manodeobras Tareaspedidoscliente', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Tareaspedidosclientes', true), array('controller' => 'tareaspedidosclientes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tareaspedidoscliente', true), array('controller' => 'tareaspedidosclientes', 'action' => 'add')); ?> </li>
	</ul>
</div>