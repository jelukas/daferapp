<div class="tareasAlbaranesclientesreparacionesPartes view">
<h2><?php  __('Tareas Albaranesclientesreparaciones Parte');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $tareasAlbaranesclientesreparacionesParte['TareasAlbaranesclientesreparacionesParte']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Numero'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $tareasAlbaranesclientesreparacionesParte['TareasAlbaranesclientesreparacionesParte']['numero']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Tareas Albaranesclientesreparacione'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($tareasAlbaranesclientesreparacionesParte['TareasAlbaranesclientesreparacione']['id'], array('controller' => 'tareas_albaranesclientesreparaciones', 'action' => 'view', $tareasAlbaranesclientesreparacionesParte['TareasAlbaranesclientesreparacione']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Mecanico'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($tareasAlbaranesclientesreparacionesParte['Mecanico']['nombre'], array('controller' => 'mecanicos', 'action' => 'view', $tareasAlbaranesclientesreparacionesParte['Mecanico']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Fecha'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $tareasAlbaranesclientesreparacionesParte['TareasAlbaranesclientesreparacionesParte']['fecha']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Horainicio'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $tareasAlbaranesclientesreparacionesParte['TareasAlbaranesclientesreparacionesParte']['horainicio']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Horafinal'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $tareasAlbaranesclientesreparacionesParte['TareasAlbaranesclientesreparacionesParte']['horafinal']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Horasimputables'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $tareasAlbaranesclientesreparacionesParte['TareasAlbaranesclientesreparacionesParte']['horasimputables']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Horasreales'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $tareasAlbaranesclientesreparacionesParte['TareasAlbaranesclientesreparacionesParte']['horasreales']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Horasdesplazamientoinicio Ida'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $tareasAlbaranesclientesreparacionesParte['TareasAlbaranesclientesreparacionesParte']['horasdesplazamientoinicio_ida']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Horasdesplazamientofin Ida'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $tareasAlbaranesclientesreparacionesParte['TareasAlbaranesclientesreparacionesParte']['horasdesplazamientofin_ida']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Horasdesplazamientoreales Ida'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $tareasAlbaranesclientesreparacionesParte['TareasAlbaranesclientesreparacionesParte']['horasdesplazamientoreales_ida']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Horasdesplazamientoimputables Ida'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $tareasAlbaranesclientesreparacionesParte['TareasAlbaranesclientesreparacionesParte']['horasdesplazamientoimputables_ida']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Kilometrajereal Ida'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $tareasAlbaranesclientesreparacionesParte['TareasAlbaranesclientesreparacionesParte']['kilometrajereal_ida']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Kilometrajeimputable Ida'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $tareasAlbaranesclientesreparacionesParte['TareasAlbaranesclientesreparacionesParte']['kilometrajeimputable_ida']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Horasdesplazamientoinicio Vuelta'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $tareasAlbaranesclientesreparacionesParte['TareasAlbaranesclientesreparacionesParte']['horasdesplazamientoinicio_vuelta']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Horasdesplazamientofin Vuelta'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $tareasAlbaranesclientesreparacionesParte['TareasAlbaranesclientesreparacionesParte']['horasdesplazamientofin_vuelta']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Horasdesplazamientoreales Vuelta'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $tareasAlbaranesclientesreparacionesParte['TareasAlbaranesclientesreparacionesParte']['horasdesplazamientoreales_vuelta']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Horasdesplazamientoimputables Vuelta'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $tareasAlbaranesclientesreparacionesParte['TareasAlbaranesclientesreparacionesParte']['horasdesplazamientoimputables_vuelta']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Kilometrajereal Vuelta'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $tareasAlbaranesclientesreparacionesParte['TareasAlbaranesclientesreparacionesParte']['kilometrajereal_vuelta']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Kilometrajeimputable Vuelta'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $tareasAlbaranesclientesreparacionesParte['TareasAlbaranesclientesreparacionesParte']['kilometrajeimputable_vuelta']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Preciodesplazamiento'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $tareasAlbaranesclientesreparacionesParte['TareasAlbaranesclientesreparacionesParte']['preciodesplazamiento']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Dietasreales'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $tareasAlbaranesclientesreparacionesParte['TareasAlbaranesclientesreparacionesParte']['dietasreales']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Dietasimputables'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $tareasAlbaranesclientesreparacionesParte['TareasAlbaranesclientesreparacionesParte']['dietasimputables']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Otrosservicios Real'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $tareasAlbaranesclientesreparacionesParte['TareasAlbaranesclientesreparacionesParte']['otrosservicios_real']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Otrosservicios Imputable'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $tareasAlbaranesclientesreparacionesParte['TareasAlbaranesclientesreparacionesParte']['otrosservicios_imputable']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Operacion'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $tareasAlbaranesclientesreparacionesParte['TareasAlbaranesclientesreparacionesParte']['operacion']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Parteescaneado'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $tareasAlbaranesclientesreparacionesParte['TareasAlbaranesclientesreparacionesParte']['parteescaneado']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Parte'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($tareasAlbaranesclientesreparacionesParte['Parte']['id'], array('controller' => 'partes', 'action' => 'view', $tareasAlbaranesclientesreparacionesParte['Parte']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Tareas Albaranesclientesreparaciones Parte', true), array('action' => 'edit', $tareasAlbaranesclientesreparacionesParte['TareasAlbaranesclientesreparacionesParte']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Tareas Albaranesclientesreparaciones Parte', true), array('action' => 'delete', $tareasAlbaranesclientesreparacionesParte['TareasAlbaranesclientesreparacionesParte']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $tareasAlbaranesclientesreparacionesParte['TareasAlbaranesclientesreparacionesParte']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Tareas Albaranesclientesreparaciones Partes', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tareas Albaranesclientesreparaciones Parte', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Tareas Albaranesclientesreparaciones', true), array('controller' => 'tareas_albaranesclientesreparaciones', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tareas Albaranesclientesreparacione', true), array('controller' => 'tareas_albaranesclientesreparaciones', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Partes', true), array('controller' => 'partes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Parte', true), array('controller' => 'partes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Mecanicos', true), array('controller' => 'mecanicos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Mecanico', true), array('controller' => 'mecanicos', 'action' => 'add')); ?> </li>
	</ul>
</div>
