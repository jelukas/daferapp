<div class="articulosFacturasproveedores index">
	<h2><?php __('Articulos Facturasproveedores');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('articulo_id');?></th>
			<th><?php echo $this->Paginator->sort('facturasproveedore_id');?></th>
			<th><?php echo $this->Paginator->sort('cantidad');?></th>
			<th><?php echo $this->Paginator->sort('precio_proveedor');?></th>
			<th><?php echo $this->Paginator->sort('descuento');?></th>
			<th><?php echo $this->Paginator->sort('neto');?></th>
			<th><?php echo $this->Paginator->sort('total');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($articulosFacturasproveedores as $articulosFacturasproveedore):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $articulosFacturasproveedore['ArticulosFacturasproveedore']['id']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($articulosFacturasproveedore['Articulo']['nombre'], array('controller' => 'articulos', 'action' => 'view', $articulosFacturasproveedore['Articulo']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($articulosFacturasproveedore['Facturasproveedore']['id'], array('controller' => 'facturasproveedores', 'action' => 'view', $articulosFacturasproveedore['Facturasproveedore']['id'])); ?>
		</td>
		<td><?php echo $articulosFacturasproveedore['ArticulosFacturasproveedore']['cantidad']; ?>&nbsp;</td>
		<td><?php echo $articulosFacturasproveedore['ArticulosFacturasproveedore']['precio_proveedor']; ?>&nbsp;</td>
		<td><?php echo $articulosFacturasproveedore['ArticulosFacturasproveedore']['descuento']; ?>&nbsp;</td>
		<td><?php echo $articulosFacturasproveedore['ArticulosFacturasproveedore']['neto']; ?>&nbsp;</td>
		<td><?php echo $articulosFacturasproveedore['ArticulosFacturasproveedore']['total']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $articulosFacturasproveedore['ArticulosFacturasproveedore']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $articulosFacturasproveedore['ArticulosFacturasproveedore']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $articulosFacturasproveedore['ArticulosFacturasproveedore']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $articulosFacturasproveedore['ArticulosFacturasproveedore']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Articulos Facturasproveedore', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Articulos', true), array('controller' => 'articulos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Articulo', true), array('controller' => 'articulos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Facturasproveedores', true), array('controller' => 'facturasproveedores', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Facturasproveedore', true), array('controller' => 'facturasproveedores', 'action' => 'add')); ?> </li>
	</ul>
</div>