<?php echo $this->Form->create('MaterialesTareasalbaranescliente');?>
	<fieldset>
 		<legend><?php __('Edit Materiales Tareasalbaranescliente'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('articulo_id');
		echo $this->Form->input('tareasalbaranescliente_id');
		echo $this->Form->input('cantidad');
		echo $this->Form->input('importe');
		echo $this->Form->input('descuento');
		echo $this->Form->input('precio_unidad');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>