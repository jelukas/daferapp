<div class="articulosPresupuestosproveedores view">
<h2><?php  __('Articulos Presupuestosproveedore');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $articulosPresupuestosproveedore['ArticulosPresupuestosproveedore']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Articulo Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $articulosPresupuestosproveedore['ArticulosPresupuestosproveedore']['articulo_id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Presupuestosproveedores Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $articulosPresupuestosproveedore['ArticulosPresupuestosproveedore']['presupuestosproveedore_id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Cantidad'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $articulosPresupuestosproveedore['ArticulosPresupuestosproveedore']['cantidad']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Precio Proveedor'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $articulosPresupuestosproveedore['ArticulosPresupuestosproveedore']['precio_proveedor']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Descuento'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $articulosPresupuestosproveedore['ArticulosPresupuestosproveedore']['descuento']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Neto'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $articulosPresupuestosproveedore['ArticulosPresupuestosproveedore']['neto']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Total'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $articulosPresupuestosproveedore['ArticulosPresupuestosproveedore']['total']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Marcado'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $articulosPresupuestosproveedore['ArticulosPresupuestosproveedore']['marcado']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Articulos Presupuestosproveedore', true), array('action' => 'edit', $articulosPresupuestosproveedore['ArticulosPresupuestosproveedore']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Articulos Presupuestosproveedore', true), array('action' => 'delete', $articulosPresupuestosproveedore['ArticulosPresupuestosproveedore']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $articulosPresupuestosproveedore['ArticulosPresupuestosproveedore']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Articulos Presupuestosproveedores', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Articulos Presupuestosproveedore', true), array('action' => 'add')); ?> </li>
	</ul>
</div>
