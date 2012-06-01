<div class="poblaciones form">
<?php echo $this->Form->create('Poblacione');?>
	<fieldset>
 		<legend><?php __('Editar Población'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('provincia_id');
		echo $this->Form->input('poblacion');
		echo $this->Form->input('poblacionseo');
		echo $this->Form->input('latitud');
		echo $this->Form->input('longitud');
		echo $this->Form->input('codigospostale_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Guardar', true));?>
</div>
<div class="actions">
	<h3><?php __('Acciones'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Eliminar', true), array('action' => 'delete', $this->Form->value('Poblacione.id')), null, sprintf(__('¿Desea eliminar la población %s?', true), $this->Form->value('Poblacione.id'))); ?></li>
		<li><?php echo $this->Html->link(__('Listar Poblaciones', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('Listar Provincias', true), array('controller' => 'provincias', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nueva Provincia', true), array('controller' => 'provincias', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Códigos postales', true), array('controller' => 'codigospostales', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Código postal', true), array('controller' => 'codigospostales', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Proveedores', true), array('controller' => 'proveedores', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Proveedor', true), array('controller' => 'proveedores', 'action' => 'add')); ?> </li>
	</ul>
</div>
