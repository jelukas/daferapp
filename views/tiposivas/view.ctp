<div class="tiposivas view">
<h2><?php  __('Tiposiva');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $tiposiva['Tiposiva']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Tipo de iva'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $tiposiva['Tiposiva']['tipoiva']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Acciones'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Editar Tipo de iva', true), array('action' => 'edit', $tiposiva['Tiposiva']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Eliminar Tipo de iva', true), array('action' => 'delete', $tiposiva['Tiposiva']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $tiposiva['Tiposiva']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Tipos de iva', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Tipo de iva', true), array('action' => 'add')); ?> </li>
	</ul>
</div>
