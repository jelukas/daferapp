<div class="cuentasbancarias form">
<?php echo $this->Form->create('Cuentasbancaria');?>
	<fieldset>
 		<legend><?php __('Edit Cuentasbancaria'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('nombre');
		echo $this->Form->input('numero_entidad');
		echo $this->Form->input('numero_sucursal');
		echo $this->Form->input('numero_dc');
		echo $this->Form->input('numero_cuenta');
		echo $this->Form->input('numero_bicswift');
		echo $this->Form->input('numero_iban');
		echo $this->Form->input('proveedore_id');
		echo $this->Form->input('cliente_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('Cuentasbancaria.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('Cuentasbancaria.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Cuentasbancarias', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Proveedores', true), array('controller' => 'proveedores', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Proveedore', true), array('controller' => 'proveedores', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Clientes', true), array('controller' => 'clientes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cliente', true), array('controller' => 'clientes', 'action' => 'add')); ?> </li>
	</ul>
</div>