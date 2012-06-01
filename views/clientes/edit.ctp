<div class="clientes form">
<?php echo $form->create('Cliente');?>
	<fieldset>
 		<legend><?php __('Editar Cliente');?></legend>
	<?php
		echo $form->input('cif',array('label' => __('CIF',true)));
		echo $form->input('codigo',array('label' => __('Código de cliente',true)));
		echo $form->input('nombre',array('label' => __('Nombre Fiscal',true)));
		echo $form->input('descripcion',array('label' => __('Descripción',true)));
		echo $form->input('personacontacto',array('label' => __('Personas de contacto',true)));
		echo $form->input('cuentabancaria',array('label' => __('Cuenta Bancaria (20 dígitos)',true)));
		echo $form->input('telefono',array('label' => __('Teléfono',true)));
		echo $form->input('fax',array('label' => __('Fax',true)));
		echo $form->input('web',array('label' => __('Página WEB',true)));
		echo $form->input('email',array('label' => __('E-mail',true)));
		echo $form->input('direccion',array('label' => __('Dirección',true)));
		echo $form->input('direccion_postal',array('label' => __('Dirección Postal',true)));
		echo $form->input('direccion_fiscal',array('label' => __('Dirección Fiscal',true)));
		echo $form->input('valoracion',array('label' => __('Valoración',true)));
		echo $form->input('descuentos_repuestos',array('label' => __('Descuento Repuestos',true)));
		echo $form->input('materiales',array('label' => __('Materiales',true)));
		echo $form->input('descuentos_materiales',array('label' => __('Descuento Materiales',true)));
		echo $form->input('precio_mano_obra',array('label' => __('Precio Mano de Obra',true)));

		echo $form->input('dietas',array('label' => __('Dietas',true)));
		echo $form->input('riesgos',array('label' => __('Riesgo',true)));
		echo $form->input('modo_facturacion',array('label' => __('Modo de Facturación',true)));
		echo $form->input('comerciale_id',array('label' => __('Comercial',true)));
		echo $form->input('formapago_id',array('label' => __('Forma de pago',true)));
		echo $form->input('imprimirconreferencias',array('label' => __('Imp. con referencias',true)));
		echo $form->input('enviarcorreoe',array('label' => __('Enviar por e-mail',true)));
	?>
	</fieldset>
<?php echo $form->end('Guardar');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Eliminar', true), array('action' => 'delete', $form->value('Cliente.id')), null, sprintf(__('¿Desea borrar el cliente %s?', true), $form->value('Cliente.id'))); ?></li>
		<li><?php echo $html->link(__('Listar Clientes', true), array('action' => 'index'));?></li>
		<li><?php echo $html->link(__('Listar Comerciales', true), array('controller' => 'comerciales', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('Nuevo Comercial', true), array('controller' => 'comerciales', 'action' => 'add')); ?> </li>
		<li><?php echo $html->link(__('Listar Formas de pago', true), array('controller' => 'formapagos', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('Nueva Forma de pago', true), array('controller' => 'formapagos', 'action' => 'add')); ?> </li>
	</ul>
</div>
