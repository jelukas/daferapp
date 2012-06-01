<div class="manodeobras form">
<?php echo $this->Form->create('Manodeobra');?>
	<fieldset>
 		<legend><?php __('Edit Manodeobra'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('tareaspresupuestocliente_id');
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

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('Manodeobra.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('Manodeobra.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Manodeobras', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Tareaspresupuestoclientes', true), array('controller' => 'tareaspresupuestoclientes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tareaspresupuestocliente', true), array('controller' => 'tareaspresupuestoclientes', 'action' => 'add')); ?> </li>
	</ul>
</div>