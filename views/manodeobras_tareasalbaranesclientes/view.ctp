<div class="manodeobrasTareasalbaranesclientes view">
<h2><?php  __('Manodeobras Tareasalbaranescliente');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $manodeobrasTareasalbaranescliente['ManodeobrasTareasalbaranescliente']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Tareasalbaranescliente'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($manodeobrasTareasalbaranescliente['Tareasalbaranescliente']['id'], array('controller' => 'tareasalbaranesclientes', 'action' => 'view', $manodeobrasTareasalbaranescliente['Tareasalbaranescliente']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Horas'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $manodeobrasTareasalbaranescliente['ManodeobrasTareasalbaranescliente']['horas']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Precio Hora'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $manodeobrasTareasalbaranescliente['ManodeobrasTareasalbaranescliente']['precio_hora']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Descuento'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $manodeobrasTareasalbaranescliente['ManodeobrasTareasalbaranescliente']['descuento']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Importe'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $manodeobrasTareasalbaranescliente['ManodeobrasTareasalbaranescliente']['importe']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Descripcion'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $manodeobrasTareasalbaranescliente['ManodeobrasTareasalbaranescliente']['descripcion']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Manodeobras Tareasalbaranescliente', true), array('action' => 'edit', $manodeobrasTareasalbaranescliente['ManodeobrasTareasalbaranescliente']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Manodeobras Tareasalbaranescliente', true), array('action' => 'delete', $manodeobrasTareasalbaranescliente['ManodeobrasTareasalbaranescliente']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $manodeobrasTareasalbaranescliente['ManodeobrasTareasalbaranescliente']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Manodeobras Tareasalbaranesclientes', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Manodeobras Tareasalbaranescliente', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Tareasalbaranesclientes', true), array('controller' => 'tareasalbaranesclientes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tareasalbaranescliente', true), array('controller' => 'tareasalbaranesclientes', 'action' => 'add')); ?> </li>
	</ul>
</div>
