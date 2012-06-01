<div class="tareaspresupuestoclientes view">
<h2><?php  __('Tareaspresupuestocliente');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $tareaspresupuestocliente['Tareaspresupuestocliente']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Asunto'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $tareaspresupuestocliente['Tareaspresupuestocliente']['asunto']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Materiales'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $tareaspresupuestocliente['Tareaspresupuestocliente']['materiales']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Mano De Obra'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $tareaspresupuestocliente['Tareaspresupuestocliente']['mano_de_obra']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Presupuestoscliente'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($tareaspresupuestocliente['Presupuestoscliente']['fecha'], array('controller' => 'presupuestosclientes', 'action' => 'view', $tareaspresupuestocliente['Presupuestoscliente']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Tareaspresupuestocliente', true), array('action' => 'edit', $tareaspresupuestocliente['Tareaspresupuestocliente']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Tareaspresupuestocliente', true), array('action' => 'delete', $tareaspresupuestocliente['Tareaspresupuestocliente']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $tareaspresupuestocliente['Tareaspresupuestocliente']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Tareaspresupuestoclientes', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tareaspresupuestocliente', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Presupuestosclientes', true), array('controller' => 'presupuestosclientes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Presupuestoscliente', true), array('controller' => 'presupuestosclientes', 'action' => 'add')); ?> </li>
	</ul>
</div>
