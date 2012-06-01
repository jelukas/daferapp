<div class="manodeobrasTareasalbaranesclientes form">
<?php echo $this->Form->create('ManodeobrasTareasalbaranescliente');?>
	<fieldset>
 		<legend><?php __('Edit Manodeobras Tareasalbaranescliente'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('tareasalbaranescliente_id');
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

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('ManodeobrasTareasalbaranescliente.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('ManodeobrasTareasalbaranescliente.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Manodeobras Tareasalbaranesclientes', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Tareasalbaranesclientes', true), array('controller' => 'tareasalbaranesclientes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tareasalbaranescliente', true), array('controller' => 'tareasalbaranesclientes', 'action' => 'add')); ?> </li>
	</ul>
</div>