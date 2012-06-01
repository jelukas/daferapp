<?php echo $this->Form->create('Tareaspresupuestocliente');?>
	<fieldset>
 		<legend><?php __('Add Tareaspresupuestocliente'); ?></legend>
	<?php
		echo $this->Form->input('asunto');
		echo $this->Form->input('materiales',array('type'=>'hidden','value'=>0));
		echo $this->Form->input('mano_de_obra',array('type'=>'hidden','value'=>0));
		echo $this->Form->input('presupuestoscliente_id',array('type'=>'hidden','value'=>$presupuestoscliente_id));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>