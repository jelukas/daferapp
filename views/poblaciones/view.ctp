<div class="poblaciones view">
<h2><?php  __('Población');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $poblacione['Poblacione']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Provincia'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($poblacione['Provincia']['id'], array('controller' => 'provincias', 'action' => 'view', $poblacione['Provincia']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Poblacion'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $poblacione['Poblacione']['poblacion']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Poblacionseo'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $poblacione['Poblacione']['poblacionseo']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Latitud'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $poblacione['Poblacione']['latitud']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Longitud'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $poblacione['Poblacione']['longitud']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Código postal'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($poblacione['Codigospostale']['postal'], array('controller' => 'codigospostales', 'action' => 'view', $poblacione['Codigospostale']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Acciones'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Editar Población', true), array('action' => 'edit', $poblacione['Poblacione']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Eliminar Población', true), array('action' => 'delete', $poblacione['Poblacione']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $poblacione['Poblacione']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Poblaciones', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nueva Población', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Províncias', true), array('controller' => 'provincias', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nueva Província', true), array('controller' => 'provincias', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Códigos postales', true), array('controller' => 'codigospostales', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Código postal', true), array('controller' => 'codigospostales', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Proveedores', true), array('controller' => 'proveedores', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Proveedor', true), array('controller' => 'proveedores', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php __('Proveedores');?></h3>
	<?php if (!empty($poblacione['Proveedore'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Cif'); ?></th>
		<th><?php __('Nombre'); ?></th>
		<th><?php __('Direccion'); ?></th>
		<th><?php __('Provincia'); ?></th>
		<th><?php __('Poblacion'); ?></th>
		<th><?php __('Codigo postal'); ?></th>
		<th><?php __('Telefono'); ?></th>
		<th><?php __('Fax'); ?></th>
		<th><?php __('Web'); ?></th>
		<th><?php __('Email'); ?></th>
		<th><?php __('Impuestos'); ?></th>
		<th><?php __('Cuentacontable'); ?></th>
		<th><?php __('Observaciones'); ?></th>
		<th><?php __('País'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($poblacione['Proveedore'] as $proveedore):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $proveedore['id'];?></td>
			<td><?php echo $proveedore['cif'];?></td>
			<td><?php echo $proveedore['nombre'];?></td>
			<td><?php echo $proveedore['direccion'];?></td>
			<td><?php echo $proveedore['provincia_id'];?></td>
			<td><?php echo $proveedore['poblacione_id'];?></td>
			<td><?php echo $proveedore['codigospostale_id'];?></td>
			<td><?php echo $proveedore['telefono'];?></td>
			<td><?php echo $proveedore['fax'];?></td>
			<td><?php echo $proveedore['web'];?></td>
			<td><?php echo $proveedore['email'];?></td>
			<td><?php echo $proveedore['impuestos'];?></td>
			<td><?php echo $proveedore['cuentacontable'];?></td>
			<td><?php echo $proveedore['observaciones'];?></td>
			<td><?php echo $proveedore['paise_id'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('Ver', true), array('controller' => 'proveedores', 'action' => 'view', $proveedore['id'])); ?>
				<?php echo $this->Html->link(__('Editar', true), array('controller' => 'proveedores', 'action' => 'edit', $proveedore['id'])); ?>
				<?php echo $this->Html->link(__('Eliminar', true), array('controller' => 'proveedores', 'action' => 'delete', $proveedore['id']), null, sprintf(__('¿Desea eliminar el proveedor %s?', true), $proveedore['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('Nuevo Proveedor', true), array('controller' => 'proveedores', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
