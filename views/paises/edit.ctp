<div class="paises form">
<?php echo $this->Form->create('Paise');?>
	<fieldset>
 		<legend><?php __('Editar Pais'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('pais');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Guardar', true));?>
</div>
<div class="actions">
	<h3><?php __('Acciones'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Eliminar', true), array('action' => 'delete', $this->Form->value('Paise.id')), null, sprintf(__('¿Desea eliminar el país %s?', true), $this->Form->value('Paise.id'))); ?></li>
		<li><?php echo $this->Html->link(__('Listar Paises', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('Listar Proveedores', true), array('controller' => 'proveedores', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Proveedor', true), array('controller' => 'proveedores', 'action' => 'add')); ?> </li>
	</ul>
</div>
