<div class="comerciales form">
<?php echo $form->create('Comerciale');?>
	<fieldset>
 		<legend><?php __('Editar Comercial');?></legend>
	<?php
		echo $form->input('nombre',array('label' => __('Nombre',true)));
		echo $form->input('apellidos',array('label' => __('Apellidos',true)));
		echo $form->input('telefono',array('label' => __('Teléfono',true)));
		echo $form->input('dni',array('label' => __('NIF',true)));
		echo $form->input('direccion',array('label' => __('Dirección',true)));
		echo $form->input('porcentaje_comision',array('label' => __('Porcentaje comisión',true)));

		echo $form->input('fecha_alta', array('label' => 'Fecha de alta', 'dateFormat' => 'DMY')); 
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Eliminar', true), array('action' => 'delete', $form->value('Comerciale.id')), null, sprintf(__('¿Desea eliminar el comercial %s?', true), $form->value('Comerciale.id'))); ?></li>
		<li><?php echo $html->link(__('Listar Comerciales', true), array('action' => 'index'));?></li>
		<li><?php echo $html->link(__('Listar Clientes', true), array('controller' => 'clientes', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('Nuevo Cliente', true), array('controller' => 'clientes', 'action' => 'add')); ?> </li>
	</ul>
</div>
