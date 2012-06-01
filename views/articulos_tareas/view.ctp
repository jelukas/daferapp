<div class="articulosTareas view">
<h2><?php  __('Articulos Tarea');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $articulosTarea['ArticulosTarea']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Articulo'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($articulosTarea['Articulo']['nombre'], array('controller' => 'articulos', 'action' => 'view', $articulosTarea['Articulo']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Tarea'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($articulosTarea['Tarea']['id'], array('controller' => 'tareas', 'action' => 'view', $articulosTarea['Tarea']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Cantidad'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $articulosTarea['ArticulosTarea']['cantidad']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Articulos Tarea', true), array('action' => 'edit', $articulosTarea['ArticulosTarea']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Articulos Tarea', true), array('action' => 'delete', $articulosTarea['ArticulosTarea']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $articulosTarea['ArticulosTarea']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Articulos Tareas', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Articulos Tarea', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Articulos', true), array('controller' => 'articulos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Articulo', true), array('controller' => 'articulos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Tareas', true), array('controller' => 'tareas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tarea', true), array('controller' => 'tareas', 'action' => 'add')); ?> </li>
	</ul>
</div>
