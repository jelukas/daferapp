<div class="transportistas form">
<?php echo $form->create('Transportista');?>
	<fieldset>
 		<legend><?php __('Edit Transportista');?></legend>
	<?php
		echo $form->input('id');
		echo $form->input('nombre',array('label'=>'Nombre'));
		echo $form->input('telefono',array('label'=>'Teléfono'));
		echo $form->input('codigocliente',array('label'=>'Código de cliente'));
		echo $form->input('descripcion',array('label'=>'Descripción'));
		echo $form->input('observaciones',array('label'=>'Observaciones'));
	?>
	</fieldset>
<?php echo $form->end('Enviar');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Eliminar', true), array('action' => 'delete', $form->value('Transportista.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $form->value('Transportista.id'))); ?></li>
		<li><?php echo $html->link(__('Listar Transportistas', true), array('action' => 'index'));?></li>
	</ul>
</div>
