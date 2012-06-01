<?php echo $this->Form->create('Tareasalbaranescliente');?>
	<fieldset>
 		<legend><?php __('Add Tareasalbaranescliente'); ?></legend>
	<?php
		echo $this->Form->input('asunto');
		echo $this->Form->input('materiales',array('readonly'=>true,'value' => 0));
		echo $this->Form->input('mano_de_obra',array('readonly'=>true,'value' => 0));
		echo $this->Form->input('servicios',array('readonly'=>true,'value' => 0));
		echo $this->Form->input('albaranescliente_id',array('type'=>'hidden','value'=>$albaranescliente_id));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Guardar', true));?>