<div class="articulosPedidosproveedores view">
<h2><?php  __('Articulos Pedidosproveedore');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $articulosPedidosproveedore['ArticulosPedidosproveedore']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Articulo'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($articulosPedidosproveedore['Articulo']['nombre'], array('controller' => 'articulos', 'action' => 'view', $articulosPedidosproveedore['Articulo']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Pedidosproveedore'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($articulosPedidosproveedore['Pedidosproveedore']['id'], array('controller' => 'pedidosproveedores', 'action' => 'view', $articulosPedidosproveedore['Pedidosproveedore']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Cantidad'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $articulosPedidosproveedore['ArticulosPedidosproveedore']['cantidad']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Precio Proveedor'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $articulosPedidosproveedore['ArticulosPedidosproveedore']['precio_proveedor']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Descuento'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $articulosPedidosproveedore['ArticulosPedidosproveedore']['descuento']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Neto'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $articulosPedidosproveedore['ArticulosPedidosproveedore']['neto']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Total'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $articulosPedidosproveedore['ArticulosPedidosproveedore']['total']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Articulos Pedidosproveedore', true), array('action' => 'edit', $articulosPedidosproveedore['ArticulosPedidosproveedore']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Articulos Pedidosproveedore', true), array('action' => 'delete', $articulosPedidosproveedore['ArticulosPedidosproveedore']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $articulosPedidosproveedore['ArticulosPedidosproveedore']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Articulos Pedidosproveedores', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Articulos Pedidosproveedore', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Articulos', true), array('controller' => 'articulos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Articulo', true), array('controller' => 'articulos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Pedidosproveedores', true), array('controller' => 'pedidosproveedores', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Pedidosproveedore', true), array('controller' => 'pedidosproveedores', 'action' => 'add')); ?> </li>
	</ul>
</div>
