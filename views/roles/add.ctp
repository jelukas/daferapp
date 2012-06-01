<div class="roles form">
<?php echo $this->Form->create('Role');?>
	<fieldset>
 		<legend><?php __('Añadir Rol'); ?></legend>
	<?php
		echo $this->Form->input('nombre');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Añadir', true));?>
</div>
<div class="actions">
	<h3><?php __('Acciones'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Listar Roles', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('Listar Restricciones', true), array('controller' => 'restricciones', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nueva Restricción', true), array('controller' => 'restricciones', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Usuarios', true), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Usuario', true), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
