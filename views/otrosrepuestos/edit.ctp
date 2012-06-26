<div class="otrosrepuestos form">
<?php echo $this->Form->create('Otrosrepuesto');?>
	<fieldset>
 		<legend><?php __('Edit Otrosrepuesto'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('articulo_id');
		echo $this->Form->input('maquina_id');
		echo $this->Form->input('cantidad');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('Otrosrepuesto.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('Otrosrepuesto.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Otrosrepuestos', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Articulos', true), array('controller' => 'articulos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Articulo', true), array('controller' => 'articulos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Maquinas', true), array('controller' => 'maquinas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Maquina', true), array('controller' => 'maquinas', 'action' => 'add')); ?> </li>
	</ul>
</div>