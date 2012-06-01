<div class="manodeobrasTareaspedidosclientes view">
<h2><?php  __('Manodeobras Tareaspedidoscliente');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $manodeobrasTareaspedidoscliente['ManodeobrasTareaspedidoscliente']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Tareaspedidoscliente'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($manodeobrasTareaspedidoscliente['Tareaspedidoscliente']['asunto'], array('controller' => 'tareaspedidosclientes', 'action' => 'view', $manodeobrasTareaspedidoscliente['Tareaspedidoscliente']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Horas'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $manodeobrasTareaspedidoscliente['ManodeobrasTareaspedidoscliente']['horas']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Precio Hora'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $manodeobrasTareaspedidoscliente['ManodeobrasTareaspedidoscliente']['precio_hora']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Descuento'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $manodeobrasTareaspedidoscliente['ManodeobrasTareaspedidoscliente']['descuento']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Importe'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $manodeobrasTareaspedidoscliente['ManodeobrasTareaspedidoscliente']['importe']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Descripcion'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $manodeobrasTareaspedidoscliente['ManodeobrasTareaspedidoscliente']['descripcion']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Manodeobras Tareaspedidoscliente', true), array('action' => 'edit', $manodeobrasTareaspedidoscliente['ManodeobrasTareaspedidoscliente']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Manodeobras Tareaspedidoscliente', true), array('action' => 'delete', $manodeobrasTareaspedidoscliente['ManodeobrasTareaspedidoscliente']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $manodeobrasTareaspedidoscliente['ManodeobrasTareaspedidoscliente']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Manodeobras Tareaspedidosclientes', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Manodeobras Tareaspedidoscliente', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Tareaspedidosclientes', true), array('controller' => 'tareaspedidosclientes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tareaspedidoscliente', true), array('controller' => 'tareaspedidosclientes', 'action' => 'add')); ?> </li>
	</ul>
</div>
