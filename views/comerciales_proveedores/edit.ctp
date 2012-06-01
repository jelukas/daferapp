<div class="comercialesProveedores form">
<?php echo $this->Form->create('ComercialesProveedore');?>
	<fieldset>
 		<legend><?php __('Editar Comerciales Proveedores'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('nombre');
		echo $this->Form->input('apellidos');
		echo $this->Form->input('email');
		echo $this->Form->input('telefono');
		echo $this->Form->input('observaciones');
		echo $this->Form->input('proveedore_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Guardar', true));?>
</div>
<div class="actions">
	<h3><?php __('Acciones'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Eliminar', true), array('action' => 'delete', $this->Form->value('ComercialesProveedore.id')), null, sprintf(__('¿Desea eliminar el comercial proveedor # %s?', true), $this->Form->value('ComercialesProveedore.id'))); ?></li>
		<li><?php echo $this->Html->link(__('Listar Comerciales Proveedores', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('Listar Proveedores', true), array('controller' => 'proveedores', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Proveedor', true), array('controller' => 'proveedores', 'action' => 'add')); ?> </li>
	</ul>
</div>
