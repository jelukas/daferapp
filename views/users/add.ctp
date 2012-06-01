<div class="users form">
<?php echo $this->Form->create('User');?>
	<fieldset>
 		<legend><?php __('Añadir Usuario'); ?></legend>
	<?php
		echo $this->Form->input('username',array('label' => 'Usuario'));
		echo $this->Form->input('password',array('label' => 'Contraseña'));
		echo $this->Form->input('role_id',array('label' => 'Rol'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Añadir', true));?>
</div>
<div class="actions">
	<h3><?php __('Acciones'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Listar Usuarios', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('Listar Roles', true), array('controller' => 'roles', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Rol', true), array('controller' => 'roles', 'action' => 'add')); ?> </li>
	</ul>
</div>
