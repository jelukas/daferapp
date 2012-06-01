<div class="articulosAlbaranesproveedores view">
<h2><?php  __('Articulos Albaranesproveedore');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $articulosAlbaranesproveedore['ArticulosAlbaranesproveedore']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Articulo'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($articulosAlbaranesproveedore['Articulo']['nombre'], array('controller' => 'articulos', 'action' => 'view', $articulosAlbaranesproveedore['Articulo']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Albaranesproveedore'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($articulosAlbaranesproveedore['Albaranesproveedore']['id'], array('controller' => 'albaranesproveedores', 'action' => 'view', $articulosAlbaranesproveedore['Albaranesproveedore']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Cantidad'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $articulosAlbaranesproveedore['ArticulosAlbaranesproveedore']['cantidad']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Precio Proveedor'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $articulosAlbaranesproveedore['ArticulosAlbaranesproveedore']['precio_proveedor']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Descuento'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $articulosAlbaranesproveedore['ArticulosAlbaranesproveedore']['descuento']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Neto'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $articulosAlbaranesproveedore['ArticulosAlbaranesproveedore']['neto']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Total'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $articulosAlbaranesproveedore['ArticulosAlbaranesproveedore']['total']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Articulos Albaranesproveedore', true), array('action' => 'edit', $articulosAlbaranesproveedore['ArticulosAlbaranesproveedore']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Articulos Albaranesproveedore', true), array('action' => 'delete', $articulosAlbaranesproveedore['ArticulosAlbaranesproveedore']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $articulosAlbaranesproveedore['ArticulosAlbaranesproveedore']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Articulos Albaranesproveedores', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Articulos Albaranesproveedore', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Articulos', true), array('controller' => 'articulos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Articulo', true), array('controller' => 'articulos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Albaranesproveedores', true), array('controller' => 'albaranesproveedores', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Albaranesproveedore', true), array('controller' => 'albaranesproveedores', 'action' => 'add')); ?> </li>
	</ul>
</div>
