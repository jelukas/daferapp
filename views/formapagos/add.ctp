<div class="formapagos form">
<?php echo $this->Form->create('Formapago');?>
	<fieldset>
 		<legend><?php __('Add Formapago'); ?></legend>
	<?php
		echo $this->Form->input('nombre');
		echo $this->Form->input('tipodepago');
		echo $this->Form->input('numero_vencimientos');
		echo $this->Form->input('dias_entre_vencimiento');
		echo $this->Form->input('dia_mes_fijo_vencimiento');
		echo $this->Form->input('proveedore_id');
		echo $this->Form->input('cliente_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Formapagos', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Proveedores', true), array('controller' => 'proveedores', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Proveedore', true), array('controller' => 'proveedores', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Clientes', true), array('controller' => 'clientes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cliente', true), array('controller' => 'clientes', 'action' => 'add')); ?> </li>
	</ul>
</div>