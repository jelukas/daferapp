<?php echo $this->Form->create('Tareasalbaranescliente');?>
	<fieldset>
 		<legend><?php __('Edit Tareasalbaranescliente'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('asunto');
		echo $this->Form->input('materiales',array('readonly'=>true));
		echo $this->Form->input('mano_de_obra',array('readonly'=>true));
		echo $this->Form->input('servicios',array('readonly'=>true));
		echo $this->Form->input('albaranescliente_id',array('type'=>'hidden'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>