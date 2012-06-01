<div class="estadosordenes view">
<h2><?php  __('Estadosordene');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $estadosordene['Estadosordene']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Estado'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $estadosordene['Estadosordene']['estado']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Estadosordene', true), array('action' => 'edit', $estadosordene['Estadosordene']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Estadosordene', true), array('action' => 'delete', $estadosordene['Estadosordene']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $estadosordene['Estadosordene']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Estadosordenes', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Estadosordene', true), array('action' => 'add')); ?> </li>
	</ul>
</div>
