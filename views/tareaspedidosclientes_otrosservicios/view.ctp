<div class="tareaspedidosclientesOtrosservicios view">
<h2><?php  __('Tareaspedidosclientes Otrosservicio');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $tareaspedidosclientesOtrosservicio['TareaspedidosclientesOtrosservicio']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Tareaspedidoscliente'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($tareaspedidosclientesOtrosservicio['Tareaspedidoscliente']['asunto'], array('controller' => 'tareaspedidosclientes', 'action' => 'view', $tareaspedidosclientesOtrosservicio['Tareaspedidoscliente']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Desplazamiento'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $tareaspedidosclientesOtrosservicio['TareaspedidosclientesOtrosservicio']['desplazamiento']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Manoobradesplazamiento'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $tareaspedidosclientesOtrosservicio['TareaspedidosclientesOtrosservicio']['manoobradesplazamiento']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Kilometraje'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $tareaspedidosclientesOtrosservicio['TareaspedidosclientesOtrosservicio']['kilometraje']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Dietas'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $tareaspedidosclientesOtrosservicio['TareaspedidosclientesOtrosservicio']['dietas']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Varios'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $tareaspedidosclientesOtrosservicio['TareaspedidosclientesOtrosservicio']['varios']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Total'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $tareaspedidosclientesOtrosservicio['TareaspedidosclientesOtrosservicio']['total']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Tareaspedidosclientes Otrosservicio', true), array('action' => 'edit', $tareaspedidosclientesOtrosservicio['TareaspedidosclientesOtrosservicio']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Tareaspedidosclientes Otrosservicio', true), array('action' => 'delete', $tareaspedidosclientesOtrosservicio['TareaspedidosclientesOtrosservicio']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $tareaspedidosclientesOtrosservicio['TareaspedidosclientesOtrosservicio']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Tareaspedidosclientes Otrosservicios', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tareaspedidosclientes Otrosservicio', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Tareaspedidosclientes', true), array('controller' => 'tareaspedidosclientes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tareaspedidoscliente', true), array('controller' => 'tareaspedidosclientes', 'action' => 'add')); ?> </li>
	</ul>
</div>
