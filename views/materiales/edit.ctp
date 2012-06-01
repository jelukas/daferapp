<div class="materiales form">
<?php echo $this->Form->create('Materiale');?>
	<fieldset>
 		<legend><?php __('Edit Materiale'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('tareaspresupuestocliente_id');
		echo $this->Form->input('articulo_id');
		echo $this->Form->input('cantidad');
		echo $this->Form->input('importe');
		echo $this->Form->input('descuento');
		echo $this->Form->input('precio_unidad');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('Materiale.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('Materiale.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Materiales', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Tareaspresupuestoclientes', true), array('controller' => 'tareaspresupuestoclientes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tareaspresupuestocliente', true), array('controller' => 'tareaspresupuestoclientes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Articulos', true), array('controller' => 'articulos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Articulo', true), array('controller' => 'articulos', 'action' => 'add')); ?> </li>
	</ul>
</div>