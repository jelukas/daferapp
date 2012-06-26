<div class="articulosparamantenimientos view">
<h2><?php  __('Articulosparamantenimiento');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $articulosparamantenimiento['Articulosparamantenimiento']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Articulo'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($articulosparamantenimiento['Articulo']['nombre'], array('controller' => 'articulos', 'action' => 'view', $articulosparamantenimiento['Articulo']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Maquina'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($articulosparamantenimiento['Maquina']['nombre'], array('controller' => 'maquinas', 'action' => 'view', $articulosparamantenimiento['Maquina']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Cantidad'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $articulosparamantenimiento['Articulosparamantenimiento']['cantidad']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Articulosparamantenimiento', true), array('action' => 'edit', $articulosparamantenimiento['Articulosparamantenimiento']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Articulosparamantenimiento', true), array('action' => 'delete', $articulosparamantenimiento['Articulosparamantenimiento']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $articulosparamantenimiento['Articulosparamantenimiento']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Articulosparamantenimientos', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Articulosparamantenimiento', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Articulos', true), array('controller' => 'articulos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Articulo', true), array('controller' => 'articulos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Maquinas', true), array('controller' => 'maquinas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Maquina', true), array('controller' => 'maquinas', 'action' => 'add')); ?> </li>
	</ul>
</div>
