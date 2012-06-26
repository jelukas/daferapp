<div class="cuentasbancarias view">
<h2><?php  __('Cuentasbancaria');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $cuentasbancaria['Cuentasbancaria']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Nombre'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $cuentasbancaria['Cuentasbancaria']['nombre']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Numero Entidad'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $cuentasbancaria['Cuentasbancaria']['numero_entidad']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Numero Sucursal'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $cuentasbancaria['Cuentasbancaria']['numero_sucursal']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Numero Dc'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $cuentasbancaria['Cuentasbancaria']['numero_dc']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Numero Cuenta'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $cuentasbancaria['Cuentasbancaria']['numero_cuenta']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Numero Bicswift'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $cuentasbancaria['Cuentasbancaria']['numero_bicswift']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Numero Iban'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $cuentasbancaria['Cuentasbancaria']['numero_iban']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Proveedore'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($cuentasbancaria['Proveedore']['idnombre'], array('controller' => 'proveedores', 'action' => 'view', $cuentasbancaria['Proveedore']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Cliente'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($cuentasbancaria['Cliente']['nombre'], array('controller' => 'clientes', 'action' => 'view', $cuentasbancaria['Cliente']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Cuentasbancaria', true), array('action' => 'edit', $cuentasbancaria['Cuentasbancaria']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Cuentasbancaria', true), array('action' => 'delete', $cuentasbancaria['Cuentasbancaria']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $cuentasbancaria['Cuentasbancaria']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Cuentasbancarias', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cuentasbancaria', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Proveedores', true), array('controller' => 'proveedores', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Proveedore', true), array('controller' => 'proveedores', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Clientes', true), array('controller' => 'clientes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cliente', true), array('controller' => 'clientes', 'action' => 'add')); ?> </li>
	</ul>
</div>
