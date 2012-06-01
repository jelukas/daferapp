<div class="manodeobrasTareaspedidosclientes form">
<?php echo $this->Form->create('ManodeobrasTareaspedidoscliente');?>
	<fieldset>
 		<legend><?php __('Edit Manodeobras Tareaspedidoscliente'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('tareaspedidoscliente_id');
		echo $this->Form->input('horas');
		echo $this->Form->input('precio_hora');
		echo $this->Form->input('descuento');
		echo $this->Form->input('importe');
		echo $this->Form->input('descripcion');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('ManodeobrasTareaspedidoscliente.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('ManodeobrasTareaspedidoscliente.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Manodeobras Tareaspedidosclientes', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Tareaspedidosclientes', true), array('controller' => 'tareaspedidosclientes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tareaspedidoscliente', true), array('controller' => 'tareaspedidosclientes', 'action' => 'add')); ?> </li>
	</ul>
</div>