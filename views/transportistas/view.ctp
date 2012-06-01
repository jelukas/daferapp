<div class="transportistas view">
<h2><?php  __('Transportista');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('ID'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $transportista['Transportista']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Nombre'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $transportista['Transportista']['nombre']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Teléfono'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $transportista['Transportista']['telefono']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Código cliente'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $transportista['Transportista']['codigocliente']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Descripción'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $transportista['Transportista']['descripcion']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Observaciones'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $transportista['Transportista']['observaciones']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Editar Transportista', true), array('action' => 'edit', $transportista['Transportista']['id'])); ?> </li>
		<li><?php echo $html->link(__('Eliminar Transportista', true), array('action' => 'delete', $transportista['Transportista']['id']), null, sprintf(__('¿Está seguro que quiere eliminar # %s?', true), $transportista['Transportista']['id'])); ?> </li>
		<li><?php echo $html->link(__('Listar Transportistas', true), array('action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('Nuevo Transportista', true), array('action' => 'add')); ?> </li>
		
	</ul>
</div>
