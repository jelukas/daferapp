<div class="proveedores form">
<?php echo $this->Form->create('Proveedore');?>
	<fieldset>
 		<legend><?php __('Añadir Proveedor'); ?></legend>
	<?php
		echo $this->Form->input('cif',array('label' => __('CIF',true)));
		echo $this->Form->input('nombre',array('label' => __('Nombre',true)));
		echo $this->Form->input('direccion',array('label' => __('Dirección',true)));
		echo $this->Form->input('direccionalmacen',array('label' => __('Dirección Almacén',true)));
		echo $this->Form->input('provincia',array('label' => __('Provincia',true)));
		echo $this->Form->input('poblacion',array('label' => __('Población',true)));
		echo $this->Form->input('cp',array('label' => __('Código Postal',true)));
		echo $this->Form->input('pais',array('label' => __('Pais',true)));
		echo $this->Form->input('telefono',array('label' => __('Teléfono',true)));
		echo $this->Form->input('fax',array('label' => __('Fax',true)));
		echo $this->Form->input('web',array('label' => __('Página WEB',true)));
		echo $this->Form->input('email',array('label' => __('E-Mail',true)));
		echo $this->Form->input('comercial',array('label' => __('Comercial/es',true)));
		echo $this->Form->input('impuestos',array('label' => __('Impuestos',true)));
		echo $this->Form->input('cuentacontable',array('label' => __('Cuenta Contable',true)));
		echo $this->Form->input('observaciones',array('label' => __('Observaciones',true)));		
				
		echo $this->Form->input('tipomaterial',array('label' => __('Materiales que provee',true)));
		echo $this->Form->input('tipotransporte',array('label' => __('Transporte',true)));
		echo $this->Form->input('formapedido',array('label' => __('Forma de Pedido',true)));
		echo $this->Form->input('ecommerce',array('label' => __('E-Commerce',true)));
		echo $this->Form->input('usuario',array('label' => __('Usuario E-Commerce',true)));
		echo $this->Form->input('contrasenia',array('label' => __('Contraseña E-Commerce',true)));
		
		
	?>
	</fieldset>
<?php echo $this->Form->end(__('Enviar', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Listar Proveedores', true), array('action' => 'index'));?></li>
		
	</ul>
</div>
