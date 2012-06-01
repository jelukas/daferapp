<div class="manodeobras view">
<h2><?php  __('Manodeobra');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $manodeobra['Manodeobra']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Tareaspresupuestocliente'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($manodeobra['Tareaspresupuestocliente']['asunto'], array('controller' => 'tareaspresupuestoclientes', 'action' => 'view', $manodeobra['Tareaspresupuestocliente']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Horas'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $manodeobra['Manodeobra']['horas']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Precio Hora'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $manodeobra['Manodeobra']['precio_hora']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Descuento'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $manodeobra['Manodeobra']['descuento']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Importe'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $manodeobra['Manodeobra']['importe']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Descripcion'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $manodeobra['Manodeobra']['descripcion']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Manodeobra', true), array('action' => 'edit', $manodeobra['Manodeobra']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Manodeobra', true), array('action' => 'delete', $manodeobra['Manodeobra']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $manodeobra['Manodeobra']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Manodeobras', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Manodeobra', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Tareaspresupuestoclientes', true), array('controller' => 'tareaspresupuestoclientes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tareaspresupuestocliente', true), array('controller' => 'tareaspresupuestoclientes', 'action' => 'add')); ?> </li>
	</ul>
</div>
