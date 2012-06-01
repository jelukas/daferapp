<div class="materialesTareaspedidosclientes index">
	<h2><?php __('Materiales Tareaspedidosclientes');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('articulo_id');?></th>
			<th><?php echo $this->Paginator->sort('tareaspedidoscliente_id');?></th>
			<th><?php echo $this->Paginator->sort('cantidad');?></th>
			<th><?php echo $this->Paginator->sort('importe');?></th>
			<th><?php echo $this->Paginator->sort('descuento');?></th>
			<th><?php echo $this->Paginator->sort('precio_unidad');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($materialesTareaspedidosclientes as $materialesTareaspedidoscliente):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $materialesTareaspedidoscliente['MaterialesTareaspedidoscliente']['id']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($materialesTareaspedidoscliente['Articulo']['nombre'], array('controller' => 'articulos', 'action' => 'view', $materialesTareaspedidoscliente['Articulo']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($materialesTareaspedidoscliente['Tareaspedidoscliente']['asunto'], array('controller' => 'tareaspedidosclientes', 'action' => 'view', $materialesTareaspedidoscliente['Tareaspedidoscliente']['id'])); ?>
		</td>
		<td><?php echo $materialesTareaspedidoscliente['MaterialesTareaspedidoscliente']['cantidad']; ?>&nbsp;</td>
		<td><?php echo $materialesTareaspedidoscliente['MaterialesTareaspedidoscliente']['importe']; ?>&nbsp;</td>
		<td><?php echo $materialesTareaspedidoscliente['MaterialesTareaspedidoscliente']['descuento']; ?>&nbsp;</td>
		<td><?php echo $materialesTareaspedidoscliente['MaterialesTareaspedidoscliente']['precio_unidad']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $materialesTareaspedidoscliente['MaterialesTareaspedidoscliente']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $materialesTareaspedidoscliente['MaterialesTareaspedidoscliente']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $materialesTareaspedidoscliente['MaterialesTareaspedidoscliente']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $materialesTareaspedidoscliente['MaterialesTareaspedidoscliente']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Materiales Tareaspedidoscliente', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Tareaspedidosclientes', true), array('controller' => 'tareaspedidosclientes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tareaspedidoscliente', true), array('controller' => 'tareaspedidosclientes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Articulos', true), array('controller' => 'articulos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Articulo', true), array('controller' => 'articulos', 'action' => 'add')); ?> </li>
	</ul>
</div>