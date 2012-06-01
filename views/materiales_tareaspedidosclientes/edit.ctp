<?php echo $this->Form->create('MaterialesTareaspedidoscliente');?>
	<fieldset>
 		<legend><?php __('Edit Materiales Tareaspedidoscliente'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('articulo_id');
		echo $this->Form->input('tareaspedidoscliente_id');
		echo $this->Form->input('cantidad');
		echo $this->Form->input('importe');
		echo $this->Form->input('descuento');
		echo $this->Form->input('precio_unidad');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>