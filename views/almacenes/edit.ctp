<div class="almacenes form">
<?php echo $form->create('Almacene');?>
	<fieldset>
 		<legend><?php __('Editar Almacen');?></legend>
	<?php
		echo $form->input('id');
		echo $form->input('nombre');
		echo $form->input('direccion');
		echo $form->input('telefono');
	?>
	</fieldset>
<?php echo $form->end('Guardar');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Eliminar', true), array('action' => 'delete', $form->value('Almacene.id')), null, sprintf(__('¿Desea borrar el almacén %s?', true), $form->value('Almacene.id'))); ?></li>
		<li><?php echo $html->link(__('Listar Almacenes', true), array('action' => 'index'));?></li>
	</ul>
</div>
