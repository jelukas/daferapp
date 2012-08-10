<?php echo $this->Form->create('Articulosparamantenimiento');?>
	<fieldset>
 		<legend><?php __('Edit Articulosparamantenimiento'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('articulo_id');
		echo $this->Form->input('maquina_id');
		echo $this->Form->input('cantidad');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>