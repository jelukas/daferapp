<div class="roles view">
<h2><?php  __('Rol');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $role['Role']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Nombre'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $role['Role']['nombre']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Editar Rol', true), array('action' => 'edit', $role['Role']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Eliminar Rol', true), array('action' => 'delete', $role['Role']['id']), null, sprintf(__('¿Desea eliminar el rol %s?', true), $role['Role']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Roles', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Rol', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Restricciones', true), array('controller' => 'restricciones', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nueva Restricción', true), array('controller' => 'restricciones', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Usuarios', true), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Usuario', true), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php __('Restricciones');?></h3>
	<?php if (!empty($role['Restriccione'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Rol'); ?></th>
		<th><?php __('Modelo'); ?></th>
		<th><?php __('Acción'); ?></th>
		<th class="actions"><?php __('Acciones');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($role['Restriccione'] as $restriccione):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $restriccione['id'];?></td>
			<td><?php echo $restriccione['role_id'];?></td>
			<td><?php echo $restriccione['modelo'];?></td>
			<td><?php echo $restriccione['accion'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('Ver', true), array('controller' => 'restricciones', 'action' => 'view', $restriccione['id'])); ?>
				<?php echo $this->Html->link(__('Editar', true), array('controller' => 'restricciones', 'action' => 'edit', $restriccione['id'])); ?>
				<?php echo $this->Html->link(__('Eliminar', true), array('controller' => 'restricciones', 'action' => 'delete', $restriccione['id']), null, sprintf(__('¿Desea eliminar la restricción %s?', true), $restriccione['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('Nueva Restricción', true), array('controller' => 'restricciones', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php __('Usuarios');?></h3>
	<?php if (!empty($role['User'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Usuario'); ?></th>
		<th><?php __('Contraseña'); ?></th>
		<th><?php __('Creado'); ?></th>
		<th><?php __('Modificado'); ?></th>
		<th><?php __('Rol'); ?></th>
		<th class="actions"><?php __('Acciones');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($role['User'] as $user):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $user['id'];?></td>
			<td><?php echo $user['username'];?></td>
			<td><?php echo $user['password'];?></td>
			<td><?php echo $user['created'];?></td>
			<td><?php echo $user['modified'];?></td>
			<td><?php echo $role['Role']['nombre'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('Ver', true), array('controller' => 'users', 'action' => 'view', $user['id'])); ?>
				<?php echo $this->Html->link(__('Editar', true), array('controller' => 'users', 'action' => 'edit', $user['id'])); ?>
				<?php echo $this->Html->link(__('Eliminar', true), array('controller' => 'users', 'action' => 'delete', $user['id']), null, sprintf(__('¿Desea eliminar el usuario %s?', true), $user['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('Nuevo Usuario', true), array('controller' => 'users', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
