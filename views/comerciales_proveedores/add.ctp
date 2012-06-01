<div class="comercialesProveedores form">
<?php echo $this->Form->create('ComercialesProveedore');?>
	<fieldset>
 		<legend><?php __('Añadir Comerciales Proveedores'); ?></legend>
	<?php
		echo $this->Form->input('nombre');
		echo $this->Form->input('apellidos');
		echo $this->Form->input('email');
		echo $this->Form->input('telefono');
		echo $this->Form->input('observaciones');
		echo $this->Form->input('proveedore_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Añadir', true));?>
</div>
<div class="actions">
	<h3><?php __('Acciones'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Listar Comerciales Prov.', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('Listar Proveedores', true), array('controller' => 'proveedores', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Proveedor', true), array('controller' => 'proveedores', 'action' => 'add')); ?> </li>
	</ul>
</div>
