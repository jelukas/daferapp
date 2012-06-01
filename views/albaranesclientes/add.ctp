<div class="albaranesclientes form">
<?php echo $this->Form->create('Albaranescliente');?>
	<fieldset>
 		<legend><?php __('Add Albaranescliente'); ?></legend>
	<?php
		echo $this->Form->input('fecha');
		echo $this->Form->input('numeroalbaran');
		echo $this->Form->input('observaciones');
		echo $this->Form->input('file', array('type' => 'file', 'label' => 'Albaran Escaneado'));
		echo $this->Form->input('avisosrepuesto_id');
		echo $this->Form->input('almacene_id');
		echo $this->Form->input('ordene_id');
		echo $this->Form->input('pedidoscliente_id');
		echo $this->Form->input('tiposiva_id');
                echo $this->Form->input('facturable');
		echo $this->Form->input('FacturasCliente');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Guardar', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Albaranesclientes', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Avisosrepuestos', true), array('controller' => 'avisosrepuestos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Avisosrepuesto', true), array('controller' => 'avisosrepuestos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Ordenes', true), array('controller' => 'ordenes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Ordene', true), array('controller' => 'ordenes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Pedidosclientes', true), array('controller' => 'pedidosclientes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Pedidoscliente', true), array('controller' => 'pedidosclientes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Tareasalbaranesclientes', true), array('controller' => 'tareasalbaranesclientes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tareasalbaranescliente', true), array('controller' => 'tareasalbaranesclientes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Facturas Clientes', true), array('controller' => 'facturas_clientes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Facturas Cliente', true), array('controller' => 'facturas_clientes', 'action' => 'add')); ?> </li>
	</ul>
</div>