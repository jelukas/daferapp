<?php echo $this->Form->create('Referenciasintercambiable');?>
	<?php
		echo $this->Form->input('articulo_id',array('type'=>'hidden','value'=>$articulo_id));
		echo $this->Autocomplete->replace_select('Articuloref', null, true, null);
	?>
<?php echo $this->Form->end(__('Submit', true));?>