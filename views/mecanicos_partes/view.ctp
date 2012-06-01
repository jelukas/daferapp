<div class="mecanicosPartes view">
<h2><?php  __('Mecanicos Parte');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Mecanico'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($mecanicosParte['Mecanico']['nombre'], array('controller' => 'mecanicos', 'action' => 'view', $mecanicosParte['Mecanico']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Parte'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($mecanicosParte['Parte']['id'], array('controller' => 'partes', 'action' => 'view', $mecanicosParte['Parte']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Mecanicos Parte', true), array('action' => 'edit', $mecanicosParte['MecanicosParte']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Mecanicos Parte', true), array('action' => 'delete', $mecanicosParte['MecanicosParte']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $mecanicosParte['MecanicosParte']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Mecanicos Partes', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Mecanicos Parte', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Mecanicos', true), array('controller' => 'mecanicos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Mecanico', true), array('controller' => 'mecanicos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Partes', true), array('controller' => 'partes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Parte', true), array('controller' => 'partes', 'action' => 'add')); ?> </li>
	</ul>
</div>
