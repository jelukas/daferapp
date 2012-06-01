<div class="articulosAvisosrepuestos view">
<h2><?php  __('Articulos Avisosrepuesto');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $articulosAvisosrepuesto['ArticulosAvisosrepuesto']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Articulo'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($articulosAvisosrepuesto['Articulo']['nombre'], array('controller' => 'articulos', 'action' => 'view', $articulosAvisosrepuesto['Articulo']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Avisosrepuesto'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($articulosAvisosrepuesto['Avisosrepuesto']['id'], array('controller' => 'avisosrepuestos', 'action' => 'view', $articulosAvisosrepuesto['Avisosrepuesto']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Cantidad'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $articulosAvisosrepuesto['ArticulosAvisosrepuesto']['cantidad']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Articulos Avisosrepuesto', true), array('action' => 'edit', $articulosAvisosrepuesto['ArticulosAvisosrepuesto']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Articulos Avisosrepuesto', true), array('action' => 'delete', $articulosAvisosrepuesto['ArticulosAvisosrepuesto']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $articulosAvisosrepuesto['ArticulosAvisosrepuesto']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Articulos Avisosrepuestos', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Articulos Avisosrepuesto', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Articulos', true), array('controller' => 'articulos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Articulo', true), array('controller' => 'articulos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Avisosrepuestos', true), array('controller' => 'avisosrepuestos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Avisosrepuesto', true), array('controller' => 'avisosrepuestos', 'action' => 'add')); ?> </li>
	</ul>
</div>
