<div class="materialesTareaspedidosclientes view">
<h2><?php  __('Materiales Tareaspedidoscliente');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $materialesTareaspedidoscliente['MaterialesTareaspedidoscliente']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Articulo'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($materialesTareaspedidoscliente['Articulo']['nombre'], array('controller' => 'articulos', 'action' => 'view', $materialesTareaspedidoscliente['Articulo']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Tareaspedidoscliente'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($materialesTareaspedidoscliente['Tareaspedidoscliente']['asunto'], array('controller' => 'tareaspedidosclientes', 'action' => 'view', $materialesTareaspedidoscliente['Tareaspedidoscliente']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Cantidad'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $materialesTareaspedidoscliente['MaterialesTareaspedidoscliente']['cantidad']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Importe'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $materialesTareaspedidoscliente['MaterialesTareaspedidoscliente']['importe']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Descuento'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $materialesTareaspedidoscliente['MaterialesTareaspedidoscliente']['descuento']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Precio Unidad'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $materialesTareaspedidoscliente['MaterialesTareaspedidoscliente']['precio_unidad']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Materiales Tareaspedidoscliente', true), array('action' => 'edit', $materialesTareaspedidoscliente['MaterialesTareaspedidoscliente']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Materiales Tareaspedidoscliente', true), array('action' => 'delete', $materialesTareaspedidoscliente['MaterialesTareaspedidoscliente']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $materialesTareaspedidoscliente['MaterialesTareaspedidoscliente']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Materiales Tareaspedidosclientes', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Materiales Tareaspedidoscliente', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Tareaspedidosclientes', true), array('controller' => 'tareaspedidosclientes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tareaspedidoscliente', true), array('controller' => 'tareaspedidosclientes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Articulos', true), array('controller' => 'articulos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Articulo', true), array('controller' => 'articulos', 'action' => 'add')); ?> </li>
	</ul>
</div>
