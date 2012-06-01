<div class="articulosAlbaranesproveedores index">
	<h2><?php __('Articulos Albaranesproveedores');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('articulo_id');?></th>
			<th><?php echo $this->Paginator->sort('albaranesproveedore_id');?></th>
			<th><?php echo $this->Paginator->sort('cantidad');?></th>
			<th><?php echo $this->Paginator->sort('precio_proveedor');?></th>
			<th><?php echo $this->Paginator->sort('descuento');?></th>
			<th><?php echo $this->Paginator->sort('neto');?></th>
			<th><?php echo $this->Paginator->sort('total');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($articulosAlbaranesproveedores as $articulosAlbaranesproveedore):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $articulosAlbaranesproveedore['ArticulosAlbaranesproveedore']['id']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($articulosAlbaranesproveedore['Articulo']['nombre'], array('controller' => 'articulos', 'action' => 'view', $articulosAlbaranesproveedore['Articulo']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($articulosAlbaranesproveedore['Albaranesproveedore']['id'], array('controller' => 'albaranesproveedores', 'action' => 'view', $articulosAlbaranesproveedore['Albaranesproveedore']['id'])); ?>
		</td>
		<td><?php echo $articulosAlbaranesproveedore['ArticulosAlbaranesproveedore']['cantidad']; ?>&nbsp;</td>
		<td><?php echo $articulosAlbaranesproveedore['ArticulosAlbaranesproveedore']['precio_proveedor']; ?>&nbsp;</td>
		<td><?php echo $articulosAlbaranesproveedore['ArticulosAlbaranesproveedore']['descuento']; ?>&nbsp;</td>
		<td><?php echo $articulosAlbaranesproveedore['ArticulosAlbaranesproveedore']['neto']; ?>&nbsp;</td>
		<td><?php echo $articulosAlbaranesproveedore['ArticulosAlbaranesproveedore']['total']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $articulosAlbaranesproveedore['ArticulosAlbaranesproveedore']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $articulosAlbaranesproveedore['ArticulosAlbaranesproveedore']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $articulosAlbaranesproveedore['ArticulosAlbaranesproveedore']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $articulosAlbaranesproveedore['ArticulosAlbaranesproveedore']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Articulos Albaranesproveedore', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Articulos', true), array('controller' => 'articulos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Articulo', true), array('controller' => 'articulos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Albaranesproveedores', true), array('controller' => 'albaranesproveedores', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Albaranesproveedore', true), array('controller' => 'albaranesproveedores', 'action' => 'add')); ?> </li>
	</ul>
</div>