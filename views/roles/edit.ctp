<div class="roles form">
<?php echo $this->Form->create('Role');?>
	<fieldset>
 		<legend><?php __('Editar Rol'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('nombre',array('label'=>'Nombre'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Guardar', true));?>
</div>
<div class="actions">
	<h3><?php __('Acciones'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Eliminar', true), array('action' => 'delete', $this->Form->value('Role.id')), null, sprintf(__('¿Desea eliminar el rol %s?', true), $this->Form->value('Role.id'))); ?></li>
		<li><?php echo $this->Html->link(__('Listar Roles', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('Listar Restricciones', true), array('controller' => 'restricciones', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nueva Restricción', true), array('controller' => 'restricciones', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Usuarios', true), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Usuario', true), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
