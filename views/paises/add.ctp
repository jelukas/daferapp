<div class="paises form">
<?php echo $this->Form->create('Paise');?>
	<fieldset>
 		<legend><?php __('Añadir Pais'); ?></legend>
	<?php
		echo $this->Form->input('pais');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Añadir', true));?>
</div>
<div class="actions">
	<h3><?php __('Acciones'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Listar Paises', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('Listar Proveedores', true), array('controller' => 'proveedores', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Proveedor', true), array('controller' => 'proveedores', 'action' => 'add')); ?> </li>
	</ul>
</div>
