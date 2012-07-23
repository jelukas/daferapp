<div class="articulosTareasAlbaranesclientesreparaciones view">
<h2><?php  __('Articulos Tareas Albaranesclientesreparacione');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $articulosTareasAlbaranesclientesreparacione['ArticulosTareasAlbaranesclientesreparacione']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Articulo'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($articulosTareasAlbaranesclientesreparacione['Articulo']['nombre'], array('controller' => 'articulos', 'action' => 'view', $articulosTareasAlbaranesclientesreparacione['Articulo']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Tareas Albaranesclientesreparacione'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($articulosTareasAlbaranesclientesreparacione['TareasAlbaranesclientesreparacione']['id'], array('controller' => 'tareas_albaranesclientesreparaciones', 'action' => 'view', $articulosTareasAlbaranesclientesreparacione['TareasAlbaranesclientesreparacione']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Cantidadreal'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $articulosTareasAlbaranesclientesreparacione['ArticulosTareasAlbaranesclientesreparacione']['cantidadreal']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Cantidad'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $articulosTareasAlbaranesclientesreparacione['ArticulosTareasAlbaranesclientesreparacione']['cantidad']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Descuento'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $articulosTareasAlbaranesclientesreparacione['ArticulosTareasAlbaranesclientesreparacione']['descuento']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Articulos Tarea'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($articulosTareasAlbaranesclientesreparacione['ArticulosTarea']['id'], array('controller' => 'articulos_tareas', 'action' => 'view', $articulosTareasAlbaranesclientesreparacione['ArticulosTarea']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Articulos Tareas Albaranesclientesreparacione', true), array('action' => 'edit', $articulosTareasAlbaranesclientesreparacione['ArticulosTareasAlbaranesclientesreparacione']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Articulos Tareas Albaranesclientesreparacione', true), array('action' => 'delete', $articulosTareasAlbaranesclientesreparacione['ArticulosTareasAlbaranesclientesreparacione']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $articulosTareasAlbaranesclientesreparacione['ArticulosTareasAlbaranesclientesreparacione']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Articulos Tareas Albaranesclientesreparaciones', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Articulos Tareas Albaranesclientesreparacione', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Articulos', true), array('controller' => 'articulos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Articulo', true), array('controller' => 'articulos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Articulos Tareas', true), array('controller' => 'articulos_tareas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Articulos Tarea', true), array('controller' => 'articulos_tareas', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Tareas Albaranesclientesreparaciones', true), array('controller' => 'tareas_albaranesclientesreparaciones', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tareas Albaranesclientesreparacione', true), array('controller' => 'tareas_albaranesclientesreparaciones', 'action' => 'add')); ?> </li>
	</ul>
</div>
