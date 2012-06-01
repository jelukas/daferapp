<div class="mecanicosPartestalleres view">
<h2><?php  __('Mecanicos Partestallere');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Mecanico'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($mecanicosPartestallere['Mecanico']['nombre'], array('controller' => 'mecanicos', 'action' => 'view', $mecanicosPartestallere['Mecanico']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Partestallere'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($mecanicosPartestallere['Partestallere']['id'], array('controller' => 'partestalleres', 'action' => 'view', $mecanicosPartestallere['Partestallere']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Mecanicos Partestallere', true), array('action' => 'edit', $mecanicosPartestallere['MecanicosPartestallere']['partestallere_id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Mecanicos Partestallere', true), array('action' => 'delete', $mecanicosPartestallere['MecanicosPartestallere']['partestallere_id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $mecanicosPartestallere['MecanicosPartestallere']['partestallere_id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Mecanicos Partestalleres', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Mecanicos Partestallere', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Mecanicos', true), array('controller' => 'mecanicos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Mecanico', true), array('controller' => 'mecanicos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Partestalleres', true), array('controller' => 'partestalleres', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Partestallere', true), array('controller' => 'partestalleres', 'action' => 'add')); ?> </li>
	</ul>
</div>
