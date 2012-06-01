<div class="restricciones view">
<h2><?php  __('Restricción');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $restriccione['Restriccione']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Rol'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($restriccione['Role']['nombre'], array('controller' => 'roles', 'action' => 'view', $restriccione['Role']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Modelo'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $restriccione['Restriccione']['modelo']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Acción'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<td><?php switch($restriccione['Restriccione']['accion'])
			  {
				case 'add':
					echo "Añadir";
					break;
				case 'edit':
					echo "Editar";
					break;
				case 'delete':
					echo "Eliminar";
					break;
				case 'index':
					echo "Listar";
					break;
				case 'view':
					echo "Ver";
					break;
			  }
		     	?>
			</td>
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Acciones'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Editar Restricción', true), array('action' => 'edit', $restriccione['Restriccione']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Eliminar Restricción', true), array('action' => 'delete', $restriccione['Restriccione']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $restriccione['Restriccione']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Restricciones', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nueva Restricción', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Roles', true), array('controller' => 'roles', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Rol', true), array('controller' => 'roles', 'action' => 'add')); ?> </li>
	</ul>
</div>
