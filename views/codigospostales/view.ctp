<div class="codigospostales view">
<h2><?php  __('Códigos Postales');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $codigospostale['Codigospostale']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Postal'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $codigospostale['Codigospostale']['postal']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Acciones'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Editar Código postal', true), array('action' => 'edit', $codigospostale['Codigospostale']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Eliminar Código postal', true), array('action' => 'delete', $codigospostale['Codigospostale']['id']), null, sprintf(__('¿Desea eliminar el código postal %s?', true), $codigospostale['Codigospostale']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Códigos postales', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Código postal', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Poblaciones', true), array('controller' => 'poblaciones', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nueva Poblacion', true), array('controller' => 'poblaciones', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Proveedores', true), array('controller' => 'proveedores', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Proveedor', true), array('controller' => 'proveedores', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php __('Poblaciones');?></h3>
	<?php if (!empty($codigospostale['Poblacione'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Provincia'); ?></th>
		<th><?php __('Poblacion'); ?></th>
		<th><?php __('Poblacionseo'); ?></th>
		<th><?php __('Latitud'); ?></th>
		<th><?php __('Longitud'); ?></th>
		<th><?php __('Codigo Postal'); ?></th>
		<th class="actions"><?php __('Acciones');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($codigospostale['Poblacione'] as $poblacione):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $poblacione['id'];?></td>
			<td><?php echo $poblacione['provincia_id'];?></td>
			<td><?php echo $poblacione['poblacion'];?></td>
			<td><?php echo $poblacione['poblacionseo'];?></td>
			<td><?php echo $poblacione['latitud'];?></td>
			<td><?php echo $poblacione['longitud'];?></td>
			<td><?php echo $poblacione['codigospostale_id'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('Ver', true), array('controller' => 'poblaciones', 'action' => 'view', $poblacione['id'])); ?>
				<?php echo $this->Html->link(__('Editar', true), array('controller' => 'poblaciones', 'action' => 'edit', $poblacione['id'])); ?>
				<?php echo $this->Html->link(__('Eliminar', true), array('controller' => 'poblaciones', 'action' => 'delete', $poblacione['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $poblacione['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('Nueva Población', true), array('controller' => 'poblaciones', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php __('Proveedores');?></h3>
	<?php if (!empty($codigospostale['Proveedore'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Cif'); ?></th>
		<th><?php __('Nombre'); ?></th>
		<th><?php __('Direccion'); ?></th>
		<th><?php __('Provincia'); ?></th>
		<th><?php __('Población'); ?></th>
		<th><?php __('Codigo postal'); ?></th>
		<th><?php __('Telefono'); ?></th>
		<th><?php __('Fax'); ?></th>
		<th><?php __('Web'); ?></th>
		<th><?php __('Email'); ?></th>
		<th><?php __('Impuestos'); ?></th>
		<th><?php __('Cuenta contable'); ?></th>
		<th><?php __('Observaciones'); ?></th>
		<th><?php __('País'); ?></th>
		<th><?php __('Población'); ?></th>
		<th><?php __('Provincia'); ?></th>
		<th><?php __('Cp'); ?></th>
		<th><?php __('Pais'); ?></th>
		<th class="actions"><?php __('Acciones');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($codigospostale['Proveedore'] as $proveedore):
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
			<td><?php echo $proveedore['poblacion'];?></td>
			<td><?php echo $proveedore['provincia'];?></td>
			<td><?php echo $proveedore['cp'];?></td>
			<td><?php echo $proveedore['pais'];?></td>
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
