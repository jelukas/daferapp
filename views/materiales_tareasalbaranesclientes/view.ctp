<div class="materialesTareasalbaranesclientes view">
<h2><?php  __('Materiales Tareasalbaranescliente');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $materialesTareasalbaranescliente['MaterialesTareasalbaranescliente']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Articulo'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($materialesTareasalbaranescliente['Articulo']['nombre'], array('controller' => 'articulos', 'action' => 'view', $materialesTareasalbaranescliente['Articulo']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Tareasalbaranescliente'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($materialesTareasalbaranescliente['Tareasalbaranescliente']['id'], array('controller' => 'tareasalbaranesclientes', 'action' => 'view', $materialesTareasalbaranescliente['Tareasalbaranescliente']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Cantidad'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $materialesTareasalbaranescliente['MaterialesTareasalbaranescliente']['cantidad']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Importe'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $materialesTareasalbaranescliente['MaterialesTareasalbaranescliente']['importe']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Descuento'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $materialesTareasalbaranescliente['MaterialesTareasalbaranescliente']['descuento']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Precio Unidad'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $materialesTareasalbaranescliente['MaterialesTareasalbaranescliente']['precio_unidad']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Materiales Tareasalbaranescliente', true), array('action' => 'edit', $materialesTareasalbaranescliente['MaterialesTareasalbaranescliente']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Materiales Tareasalbaranescliente', true), array('action' => 'delete', $materialesTareasalbaranescliente['MaterialesTareasalbaranescliente']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $materialesTareasalbaranescliente['MaterialesTareasalbaranescliente']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Materiales Tareasalbaranesclientes', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Materiales Tareasalbaranescliente', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Tareasalbaranesclientes', true), array('controller' => 'tareasalbaranesclientes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tareasalbaranescliente', true), array('controller' => 'tareasalbaranesclientes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Articulos', true), array('controller' => 'articulos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Articulo', true), array('controller' => 'articulos', 'action' => 'add')); ?> </li>
	</ul>
</div>
