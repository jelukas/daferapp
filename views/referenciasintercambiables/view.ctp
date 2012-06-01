<div class="referenciasintercambiables view">
<h2><?php  __('Referencias intercambiables');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $referenciasintercambiable['Referenciasintercambiable']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Articulo'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($referenciasintercambiable['Articulo']['id'], array('controller' => 'articulos', 'action' => 'view', $referenciasintercambiable['Articulo']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Referenciasintercambiable', true), array('action' => 'edit', $referenciasintercambiable['Referenciasintercambiable']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Referenciasintercambiable', true), array('action' => 'delete', $referenciasintercambiable['Referenciasintercambiable']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $referenciasintercambiable['Referenciasintercambiable']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Referenciasintercambiables', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Referenciasintercambiable', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Articulos', true), array('controller' => 'articulos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Articulo', true), array('controller' => 'articulos', 'action' => 'add')); ?> </li>
	</ul>
</div>
