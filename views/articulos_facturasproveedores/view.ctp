<div class="articulosFacturasproveedores view">
<h2><?php  __('Articulos Facturasproveedore');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $articulosFacturasproveedore['ArticulosFacturasproveedore']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Articulo'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($articulosFacturasproveedore['Articulo']['nombre'], array('controller' => 'articulos', 'action' => 'view', $articulosFacturasproveedore['Articulo']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Facturasproveedore'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($articulosFacturasproveedore['Facturasproveedore']['id'], array('controller' => 'facturasproveedores', 'action' => 'view', $articulosFacturasproveedore['Facturasproveedore']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Cantidad'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $articulosFacturasproveedore['ArticulosFacturasproveedore']['cantidad']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Precio Proveedor'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $articulosFacturasproveedore['ArticulosFacturasproveedore']['precio_proveedor']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Descuento'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $articulosFacturasproveedore['ArticulosFacturasproveedore']['descuento']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Neto'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $articulosFacturasproveedore['ArticulosFacturasproveedore']['neto']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Total'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $articulosFacturasproveedore['ArticulosFacturasproveedore']['total']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Articulos Facturasproveedore', true), array('action' => 'edit', $articulosFacturasproveedore['ArticulosFacturasproveedore']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Articulos Facturasproveedore', true), array('action' => 'delete', $articulosFacturasproveedore['ArticulosFacturasproveedore']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $articulosFacturasproveedore['ArticulosFacturasproveedore']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Articulos Facturasproveedores', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Articulos Facturasproveedore', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Articulos', true), array('controller' => 'articulos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Articulo', true), array('controller' => 'articulos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Facturasproveedores', true), array('controller' => 'facturasproveedores', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Facturasproveedore', true), array('controller' => 'facturasproveedores', 'action' => 'add')); ?> </li>
	</ul>
</div>
