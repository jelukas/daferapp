<div class="albaranesclientesreparaciones form">
<?php echo $this->Form->create('Albaranesclientesreparacione');?>
	<fieldset>
 		<legend><?php __('Add Albaranesclientesreparacione'); ?></legend>
	<?php
		echo $this->Form->input('fecha');
		echo $this->Form->input('numero');
		echo $this->Form->input('observaciones');
		echo $this->Form->input('albaranescaneado');
		echo $this->Form->input('facturable');
		echo $this->Form->input('tiposiva_id');
		echo $this->Form->input('ordene_id');
		echo $this->Form->input('cliente_id');
		echo $this->Form->input('almacene_id');
		echo $this->Form->input('facturas_cliente_id');
		echo $this->Form->input('es_devolucion');
		echo $this->Form->input('comerciale_id');
		echo $this->Form->input('centrosdecoste_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Albaranesclientesreparaciones', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Tiposivas', true), array('controller' => 'tiposivas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tiposiva', true), array('controller' => 'tiposivas', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Ordenes', true), array('controller' => 'ordenes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Ordene', true), array('controller' => 'ordenes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Clientes', true), array('controller' => 'clientes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cliente', true), array('controller' => 'clientes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Almacenes', true), array('controller' => 'almacenes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Almacene', true), array('controller' => 'almacenes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Facturas Clientes', true), array('controller' => 'facturas_clientes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Facturas Cliente', true), array('controller' => 'facturas_clientes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Comerciales', true), array('controller' => 'comerciales', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Comerciale', true), array('controller' => 'comerciales', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Centrosdecostes', true), array('controller' => 'centrosdecostes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Centrosdecoste', true), array('controller' => 'centrosdecostes', 'action' => 'add')); ?> </li>
	</ul>
</div>