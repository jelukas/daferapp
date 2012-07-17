<div class="albaranesclientesreparaciones index">
	<h2><?php __('Albaranesclientesreparaciones');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('fecha');?></th>
			<th><?php echo $this->Paginator->sort('numero');?></th>
			<th><?php echo $this->Paginator->sort('observaciones');?></th>
			<th><?php echo $this->Paginator->sort('albaranescaneado');?></th>
			<th><?php echo $this->Paginator->sort('facturable');?></th>
			<th><?php echo $this->Paginator->sort('tiposiva_id');?></th>
			<th><?php echo $this->Paginator->sort('ordene_id');?></th>
			<th><?php echo $this->Paginator->sort('cliente_id');?></th>
			<th><?php echo $this->Paginator->sort('almacene_id');?></th>
			<th><?php echo $this->Paginator->sort('facturas_cliente_id');?></th>
			<th><?php echo $this->Paginator->sort('es_devolucion');?></th>
			<th><?php echo $this->Paginator->sort('comerciale_id');?></th>
			<th><?php echo $this->Paginator->sort('centrosdecoste_id');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($albaranesclientesreparaciones as $albaranesclientesreparacione):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $albaranesclientesreparacione['Albaranesclientesreparacione']['id']; ?>&nbsp;</td>
		<td><?php echo $albaranesclientesreparacione['Albaranesclientesreparacione']['fecha']; ?>&nbsp;</td>
		<td><?php echo $albaranesclientesreparacione['Albaranesclientesreparacione']['numero']; ?>&nbsp;</td>
		<td><?php echo $albaranesclientesreparacione['Albaranesclientesreparacione']['observaciones']; ?>&nbsp;</td>
		<td><?php echo $albaranesclientesreparacione['Albaranesclientesreparacione']['albaranescaneado']; ?>&nbsp;</td>
		<td><?php echo $albaranesclientesreparacione['Albaranesclientesreparacione']['facturable']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($albaranesclientesreparacione['Tiposiva']['tipoiva'], array('controller' => 'tiposivas', 'action' => 'view', $albaranesclientesreparacione['Tiposiva']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($albaranesclientesreparacione['Ordene']['id'], array('controller' => 'ordenes', 'action' => 'view', $albaranesclientesreparacione['Ordene']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($albaranesclientesreparacione['Cliente']['nombre'], array('controller' => 'clientes', 'action' => 'view', $albaranesclientesreparacione['Cliente']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($albaranesclientesreparacione['Almacene']['nombre'], array('controller' => 'almacenes', 'action' => 'view', $albaranesclientesreparacione['Almacene']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($albaranesclientesreparacione['FacturasCliente']['id'], array('controller' => 'facturas_clientes', 'action' => 'view', $albaranesclientesreparacione['FacturasCliente']['id'])); ?>
		</td>
		<td><?php echo $albaranesclientesreparacione['Albaranesclientesreparacione']['es_devolucion']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($albaranesclientesreparacione['Comerciale']['nombre'], array('controller' => 'comerciales', 'action' => 'view', $albaranesclientesreparacione['Comerciale']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($albaranesclientesreparacione['Centrosdecoste']['denominacion'], array('controller' => 'centrosdecostes', 'action' => 'view', $albaranesclientesreparacione['Centrosdecoste']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $albaranesclientesreparacione['Albaranesclientesreparacione']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $albaranesclientesreparacione['Albaranesclientesreparacione']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $albaranesclientesreparacione['Albaranesclientesreparacione']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $albaranesclientesreparacione['Albaranesclientesreparacione']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Albaranesclientesreparacione', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Tiposivas', true), array('controller' => 'tiposivas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tiposiva', true), array('controller' => 'tiposivas', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Ordenes', true), array('controller' => 'ordenes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Ordene', true), array('controller' => 'ordenes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Clientes', true), array('controller' => 'clientes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cliente', true), array('controller' => 'clientes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Almacenes', true), array('controller' => 'almacenes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Almacene', true), array('controller' => 'almacenes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Facturas Clientes', true), array('controller' => 'facturas_clientes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Facturas Cliente', true), array('controller' => 'facturas_clientes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Comerciales', true), array('controller' => 'comerciales', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Comerciale', true), array('controller' => 'comerciales', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Centrosdecostes', true), array('controller' => 'centrosdecostes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Centrosdecoste', true), array('controller' => 'centrosdecostes', 'action' => 'add')); ?> </li>
	</ul>
</div>