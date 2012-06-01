<div class="almacenes form">
<?php echo $form->create('Almacene');?>
	<fieldset>
 		<legend><?php __('Añadir Almacén');?></legend>
	<?php
		echo $form->input('nombre');
		echo $form->input('direccion');
		echo $form->input('telefono');
	?>
	</fieldset>
<?php echo $form->end('Añadir');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Listar Almacenes', true), array('action' => 'index'));?></li>
	</ul>
</div>
