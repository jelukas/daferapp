<div class="articulosPedidosproveedores index">
	<h2><?php __('Articulos Pedidosproveedores');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('articulo_id');?></th>
			<th><?php echo $this->Paginator->sort('pedidosproveedore_id');?></th>
			<th><?php echo $this->Paginator->sort('cantidad');?></th>
			<th><?php echo $this->Paginator->sort('precio_proveedor');?></th>
			<th><?php echo $this->Paginator->sort('descuento');?></th>
			<th><?php echo $this->Paginator->sort('neto');?></th>
			<th><?php echo $this->Paginator->sort('total');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($articulosPedidosproveedores as $articulosPedidosproveedore):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $articulosPedidosproveedore['ArticulosPedidosproveedore']['id']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($articulosPedidosproveedore['Articulo']['nombre'], array('controller' => 'articulos', 'action' => 'view', $articulosPedidosproveedore['Articulo']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($articulosPedidosproveedore['Pedidosproveedore']['id'], array('controller' => 'pedidosproveedores', 'action' => 'view', $articulosPedidosproveedore['Pedidosproveedore']['id'])); ?>
		</td>
		<td><?php echo $articulosPedidosproveedore['ArticulosPedidosproveedore']['cantidad']; ?>&nbsp;</td>
		<td><?php echo $articulosPedidosproveedore['ArticulosPedidosproveedore']['precio_proveedor']; ?>&nbsp;</td>
		<td><?php echo $articulosPedidosproveedore['ArticulosPedidosproveedore']['descuento']; ?>&nbsp;</td>
		<td><?php echo $articulosPedidosproveedore['ArticulosPedidosproveedore']['neto']; ?>&nbsp;</td>
		<td><?php echo $articulosPedidosproveedore['ArticulosPedidosproveedore']['total']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $articulosPedidosproveedore['ArticulosPedidosproveedore']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $articulosPedidosproveedore['ArticulosPedidosproveedore']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $articulosPedidosproveedore['ArticulosPedidosproveedore']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $articulosPedidosproveedore['ArticulosPedidosproveedore']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Articulos Pedidosproveedore', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Articulos', true), array('controller' => 'articulos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Articulo', true), array('controller' => 'articulos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Pedidosproveedores', true), array('controller' => 'pedidosproveedores', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Pedidosproveedore', true), array('controller' => 'pedidosproveedores', 'action' => 'add')); ?> </li>
	</ul>
</div>