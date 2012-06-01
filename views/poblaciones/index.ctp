<div class="poblaciones index">
	<h2><?php __('Poblaciones');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('Id');?></th>
			<th><?php echo $this->Paginator->sort('Província');?></th>
			<th><?php echo $this->Paginator->sort('poblacion');?></th>
			<th><?php echo $this->Paginator->sort('poblacionseo');?></th>
			<th><?php echo $this->Paginator->sort('Latitud');?></th>
			<th><?php echo $this->Paginator->sort('Longitud');?></th>
			<th><?php echo $this->Paginator->sort('Código postal');?></th>
			<th class="actions"><?php __('Acciones');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($poblaciones as $poblacione):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $poblacione['Poblacione']['id']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($poblacione['Provincia']['provincia'], array('controller' => 'provincias', 'action' => 'view', $poblacione['Provincia']['id'])); ?>
		</td>
		<td><?php echo $poblacione['Poblacione']['poblacion']; ?>&nbsp;</td>
		<td><?php echo $poblacione['Poblacione']['poblacionseo']; ?>&nbsp;</td>
		<td><?php echo $poblacione['Poblacione']['latitud']; ?>&nbsp;</td>
		<td><?php echo $poblacione['Poblacione']['longitud']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($poblacione['Codigospostale']['postal'], array('controller' => 'codigospostales', 'action' => 'view', $poblacione['Codigospostale']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Ver', true), array('action' => 'view', $poblacione['Poblacione']['id'])); ?>
			<?php echo $this->Html->link(__('Editar', true), array('action' => 'edit', $poblacione['Poblacione']['id'])); ?>
			<?php echo $this->Html->link(__('Eliminar', true), array('action' => 'delete', $poblacione['Poblacione']['id']), null, sprintf(__('¿Desea eliminar la población %s?', true), $poblacione['Poblacione']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Página %page% de %pages%, mostrando %current% filas de %count% total, starting on record %start%, finalizando en %end%', true)
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
	<h3><?php __('Acciones'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Nueva Población', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('Listar Provincias', true), array('controller' => 'provincias', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nueva Provincia', true), array('controller' => 'provincias', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Códigos postales', true), array('controller' => 'codigospostales', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Código postal', true), array('controller' => 'codigospostales', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Proveedores', true), array('controller' => 'proveedores', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Proveedor', true), array('controller' => 'proveedores', 'action' => 'add')); ?> </li>
	</ul>
</div>
