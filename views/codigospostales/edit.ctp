<div class="codigospostales form">
<?php echo $this->Form->create('Codigospostale');?>
	<fieldset>
 		<legend><?php __('Editar Codigo postal'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('postal');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Guardar', true));?>
</div>
<div class="actions">
	<h3><?php __('Acciones'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Eliminar', true), array('action' => 'delete', $this->Form->value('Codigospostale.id')), null, sprintf(__('¿Desea eliminar el código postal %s?', true), $this->Form->value('Codigospostale.id'))); ?></li>
		<li><?php echo $this->Html->link(__('Listar Codigos postales', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('Listar Poblaciones', true), array('controller' => 'poblaciones', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nueva Poblacion', true), array('controller' => 'poblaciones', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Proveedores', true), array('controller' => 'proveedores', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Proveedor', true), array('controller' => 'proveedores', 'action' => 'add')); ?> </li>
	</ul>
</div>
