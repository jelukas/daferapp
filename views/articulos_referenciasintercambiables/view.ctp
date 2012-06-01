<div class="articulosReferenciasintercambiables view">
<h2><?php  __('Articulos Referenciasintercambiable');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Articulo'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($articulosReferenciasintercambiable['Articulo']['nombre'], array('controller' => 'articulos', 'action' => 'view', $articulosReferenciasintercambiable['Articulo']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Referenciasintercambiable'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($articulosReferenciasintercambiable['Referenciasintercambiable']['id'], array('controller' => 'referenciasintercambiables', 'action' => 'view', $articulosReferenciasintercambiable['Referenciasintercambiable']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Articulos Referenciasintercambiable', true), array('action' => 'edit', $articulosReferenciasintercambiable['ArticulosReferenciasintercambiable']['articulo_id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Articulos Referenciasintercambiable', true), array('action' => 'delete', $articulosReferenciasintercambiable['ArticulosReferenciasintercambiable']['articulo_id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $articulosReferenciasintercambiable['ArticulosReferenciasintercambiable']['articulo_id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Articulos Referenciasintercambiables', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Articulos Referenciasintercambiable', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Articulos', true), array('controller' => 'articulos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Articulo', true), array('controller' => 'articulos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Referenciasintercambiables', true), array('controller' => 'referenciasintercambiables', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Referenciasintercambiable', true), array('controller' => 'referenciasintercambiables', 'action' => 'add')); ?> </li>
	</ul>
</div>
