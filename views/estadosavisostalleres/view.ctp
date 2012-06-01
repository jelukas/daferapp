<div class="estadosavisostalleres view">
<h2><?php  __('Estadosavisostallere');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $estadosavisostallere['Estadosavisostallere']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Estado'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $estadosavisostallere['Estadosavisostallere']['estado']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Estadosavisostallere', true), array('action' => 'edit', $estadosavisostallere['Estadosavisostallere']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Estadosavisostallere', true), array('action' => 'delete', $estadosavisostallere['Estadosavisostallere']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $estadosavisostallere['Estadosavisostallere']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Estadosavisostalleres', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Estadosavisostallere', true), array('action' => 'add')); ?> </li>
	</ul>
</div>
