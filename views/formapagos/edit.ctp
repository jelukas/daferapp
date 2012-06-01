<div class="formapagos form">
<?php echo $this->Form->create('Formapago');?>
	<fieldset>
 		<legend><?php __('Editar Forma de pago'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('codigo');
		echo $this->Form->input('nombre');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Guardar', true));?>
</div>
<div class="actions">
	<h3><?php __('Acciones'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('Formapago.id')), null, sprintf(__('¿Desea eliminar la forma de pago %s?', true), $this->Form->value('Formapago.id'))); ?></li>
		<li><?php echo $this->Html->link(__('Listar Formas de pago', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('Listar Clientes', true), array('controller' => 'clientes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Cliente', true), array('controller' => 'clientes', 'action' => 'add')); ?> </li>
	</ul>
</div>
