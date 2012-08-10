<?php echo $this->Form->create('Otrosrepuesto');?>
	<fieldset>
 		<legend><?php __('Edit Otrosrepuesto'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('articulo_id');
		echo $this->Form->input('maquina_id');
		echo $this->Form->input('cantidad');
		echo $this->Form->input('observaciones');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Guardar', true));?>