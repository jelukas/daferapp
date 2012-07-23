<div class="tareasAlbaranesclientesreparacionesPartestalleres view">
<h2><?php  __('Tareas Albaranesclientesreparaciones Partestallere');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $tareasAlbaranesclientesreparacionesPartestallere['TareasAlbaranesclientesreparacionesPartestallere']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Tareas Albaranesclientesreparacione'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($tareasAlbaranesclientesreparacionesPartestallere['TareasAlbaranesclientesreparacione']['id'], array('controller' => 'tareas_albaranesclientesreparaciones', 'action' => 'view', $tareasAlbaranesclientesreparacionesPartestallere['TareasAlbaranesclientesreparacione']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Mecanico'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($tareasAlbaranesclientesreparacionesPartestallere['Mecanico']['nombre'], array('controller' => 'mecanicos', 'action' => 'view', $tareasAlbaranesclientesreparacionesPartestallere['Mecanico']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Numero'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $tareasAlbaranesclientesreparacionesPartestallere['TareasAlbaranesclientesreparacionesPartestallere']['numero']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Fecha'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $tareasAlbaranesclientesreparacionesPartestallere['TareasAlbaranesclientesreparacionesPartestallere']['fecha']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Horainicio'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $tareasAlbaranesclientesreparacionesPartestallere['TareasAlbaranesclientesreparacionesPartestallere']['horainicio']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Horafinal'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $tareasAlbaranesclientesreparacionesPartestallere['TareasAlbaranesclientesreparacionesPartestallere']['horafinal']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Horasimputables'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $tareasAlbaranesclientesreparacionesPartestallere['TareasAlbaranesclientesreparacionesPartestallere']['horasimputables']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Horasreales'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $tareasAlbaranesclientesreparacionesPartestallere['TareasAlbaranesclientesreparacionesPartestallere']['horasreales']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Operacion'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $tareasAlbaranesclientesreparacionesPartestallere['TareasAlbaranesclientesreparacionesPartestallere']['operacion']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Parteescaneado'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $tareasAlbaranesclientesreparacionesPartestallere['TareasAlbaranesclientesreparacionesPartestallere']['parteescaneado']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Partestallere'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($tareasAlbaranesclientesreparacionesPartestallere['Partestallere']['id'], array('controller' => 'partestalleres', 'action' => 'view', $tareasAlbaranesclientesreparacionesPartestallere['Partestallere']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Tareas Albaranesclientesreparaciones Partestallere', true), array('action' => 'edit', $tareasAlbaranesclientesreparacionesPartestallere['TareasAlbaranesclientesreparacionesPartestallere']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Tareas Albaranesclientesreparaciones Partestallere', true), array('action' => 'delete', $tareasAlbaranesclientesreparacionesPartestallere['TareasAlbaranesclientesreparacionesPartestallere']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $tareasAlbaranesclientesreparacionesPartestallere['TareasAlbaranesclientesreparacionesPartestallere']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Tareas Albaranesclientesreparaciones Partestalleres', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tareas Albaranesclientesreparaciones Partestallere', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Tareas Albaranesclientesreparaciones', true), array('controller' => 'tareas_albaranesclientesreparaciones', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tareas Albaranesclientesreparacione', true), array('controller' => 'tareas_albaranesclientesreparaciones', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Partestalleres', true), array('controller' => 'partestalleres', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Partestallere', true), array('controller' => 'partestalleres', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Mecanicos', true), array('controller' => 'mecanicos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Mecanico', true), array('controller' => 'mecanicos', 'action' => 'add')); ?> </li>
	</ul>
</div>
