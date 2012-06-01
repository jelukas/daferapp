<div class="comercialesProveedores view">
<h2><?php  __('Comerciales Proveedores');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $comercialesProveedore['ComercialesProveedore']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Nombre'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $comercialesProveedore['ComercialesProveedore']['nombre']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Apellidos'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $comercialesProveedore['ComercialesProveedore']['apellidos']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Email'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $comercialesProveedore['ComercialesProveedore']['email']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Telefono'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $comercialesProveedore['ComercialesProveedore']['telefono']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Observaciones'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $comercialesProveedore['ComercialesProveedore']['observaciones']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Proveedor'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($comercialesProveedore['Proveedore']['nombre'], array('controller' => 'proveedores', 'action' => 'view', $comercialesProveedore['Proveedore']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Acciones'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Editar Comercial Proveedor', true), array('action' => 'edit', $comercialesProveedore['ComercialesProveedore']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Eliminar Comercial Proveedor', true), array('action' => 'delete', $comercialesProveedore['ComercialesProveedore']['id']), null, sprintf(__('¿Desea eliminar el comercial proveedor %s?', true), $comercialesProveedore['ComercialesProveedore']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Comerciales Proveedores', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Comercial Proveedor', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Proveedores', true), array('controller' => 'proveedores', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Proveedor', true), array('controller' => 'proveedores', 'action' => 'add')); ?> </li>
	</ul>
</div>
