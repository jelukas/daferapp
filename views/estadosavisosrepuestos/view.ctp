<div class="estadosavisosrepuestos view">
<h2><?php  __('Estadosavisosrepuesto');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $estadosavisosrepuesto['Estadosavisosrepuesto']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Estado'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $estadosavisosrepuesto['Estadosavisosrepuesto']['estado']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Estadosavisosrepuesto', true), array('action' => 'edit', $estadosavisosrepuesto['Estadosavisosrepuesto']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Estadosavisosrepuesto', true), array('action' => 'delete', $estadosavisosrepuesto['Estadosavisosrepuesto']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $estadosavisosrepuesto['Estadosavisosrepuesto']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Estadosavisosrepuestos', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Estadosavisosrepuesto', true), array('action' => 'add')); ?> </li>
	</ul>
</div>
