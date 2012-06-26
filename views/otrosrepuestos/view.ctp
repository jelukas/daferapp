<div class="otrosrepuestos view">
<h2><?php  __('Otrosrepuesto');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $otrosrepuesto['Otrosrepuesto']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Articulo'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($otrosrepuesto['Articulo']['nombre'], array('controller' => 'articulos', 'action' => 'view', $otrosrepuesto['Articulo']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Maquina'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($otrosrepuesto['Maquina']['nombre'], array('controller' => 'maquinas', 'action' => 'view', $otrosrepuesto['Maquina']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Cantidad'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $otrosrepuesto['Otrosrepuesto']['cantidad']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Otrosrepuesto', true), array('action' => 'edit', $otrosrepuesto['Otrosrepuesto']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Otrosrepuesto', true), array('action' => 'delete', $otrosrepuesto['Otrosrepuesto']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $otrosrepuesto['Otrosrepuesto']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Otrosrepuestos', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Otrosrepuesto', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Articulos', true), array('controller' => 'articulos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Articulo', true), array('controller' => 'articulos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Maquinas', true), array('controller' => 'maquinas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Maquina', true), array('controller' => 'maquinas', 'action' => 'add')); ?> </li>
	</ul>
</div>
