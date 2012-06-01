<div class="articulosPresupuestosproveedores index">
	<h2><?php __('Articulos Presupuestosproveedores');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('articulo_id');?></th>
			<th><?php echo $this->Paginator->sort('presupuestosproveedore_id');?></th>
			<th><?php echo $this->Paginator->sort('cantidad');?></th>
			<th><?php echo $this->Paginator->sort('precio_proveedor');?></th>
			<th><?php echo $this->Paginator->sort('descuento');?></th>
			<th><?php echo $this->Paginator->sort('neto');?></th>
			<th><?php echo $this->Paginator->sort('total');?></th>
			<th><?php echo $this->Paginator->sort('marcado');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($articulosPresupuestosproveedores as $articulosPresupuestosproveedore):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $articulosPresupuestosproveedore['ArticulosPresupuestosproveedore']['id']; ?>&nbsp;</td>
		<td><?php echo $articulosPresupuestosproveedore['ArticulosPresupuestosproveedore']['articulo_id']; ?>&nbsp;</td>
		<td><?php echo $articulosPresupuestosproveedore['ArticulosPresupuestosproveedore']['presupuestosproveedore_id']; ?>&nbsp;</td>
		<td><?php echo $articulosPresupuestosproveedore['ArticulosPresupuestosproveedore']['cantidad']; ?>&nbsp;</td>
		<td><?php echo $articulosPresupuestosproveedore['ArticulosPresupuestosproveedore']['precio_proveedor']; ?>&nbsp;</td>
		<td><?php echo $articulosPresupuestosproveedore['ArticulosPresupuestosproveedore']['descuento']; ?>&nbsp;</td>
		<td><?php echo $articulosPresupuestosproveedore['ArticulosPresupuestosproveedore']['neto']; ?>&nbsp;</td>
		<td><?php echo $articulosPresupuestosproveedore['ArticulosPresupuestosproveedore']['total']; ?>&nbsp;</td>
		<td><?php echo $articulosPresupuestosproveedore['ArticulosPresupuestosproveedore']['marcado']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $articulosPresupuestosproveedore['ArticulosPresupuestosproveedore']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $articulosPresupuestosproveedore['ArticulosPresupuestosproveedore']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $articulosPresupuestosproveedore['ArticulosPresupuestosproveedore']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $articulosPresupuestosproveedore['ArticulosPresupuestosproveedore']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Articulos Presupuestosproveedore', true), array('action' => 'add')); ?></li>
	</ul>
</div>