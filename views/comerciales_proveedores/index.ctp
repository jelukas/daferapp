<div class="comercialesProveedores index">

	<h2><?php __('Comerciales Proveedores');?></h2>
<?php
	echo $form->create('', array('action'=>'search'));
	echo $form->input('Buscar', array('type'=>'text'));
	echo $form->end('Buscar');
?>
	<table cellpadding="0" cellspacing="0">
	<tr>
			
			<th><?php echo $this->Paginator->sort('Nombre');?></th>
			<th><?php echo $this->Paginator->sort('Apellidos');?></th>
			
			<th><?php echo $this->Paginator->sort('Teléfono');?></th>
			
			<th><?php echo $this->Paginator->sort('Proveedor');?></th>
			<th class="actions"><?php __('Acciones');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($comercialesProveedores as $comercialesProveedore):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>

		<td><?php echo $comercialesProveedore['ComercialesProveedore']['nombre']; ?>&nbsp;</td>
		<td><?php echo $comercialesProveedore['ComercialesProveedore']['apellidos']; ?>&nbsp;</td>
		
		<td><?php echo $comercialesProveedore['ComercialesProveedore']['telefono']; ?>&nbsp;</td>
		
		<td>
			<?php echo $this->Html->link($comercialesProveedore['Proveedore']['nombre'], array('controller' => 'proveedores', 'action' => 'view', $comercialesProveedore['Proveedore']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Ver', true), array('action' => 'view', $comercialesProveedore['ComercialesProveedore']['id'])); ?>
			<?php echo $this->Html->link(__('Editar', true), array('action' => 'edit', $comercialesProveedore['ComercialesProveedore']['id'])); ?>
			<?php echo $this->Html->link(__('Eliminar', true), array('action' => 'delete', $comercialesProveedore['ComercialesProveedore']['id']), null, sprintf(__('¿Desea eliminar el comercial proveedor # %s?', true), $comercialesProveedore['ComercialesProveedore']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Página %page% de %pages%, mostrando %current% registros de un total de %count%, empezando en registro %start%, finalizando en el registro %end%', true)
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
		<li><?php echo $this->Html->link(__('Nuevo Comercial Prov.', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('Listar Proveedores', true), array('controller' => 'proveedores', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Proveedor', true), array('controller' => 'proveedores', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Generar Informe', true), array('action' => 'pdf')); ?> </li>
	</ul>
</div>
