<div class="articulosAvisosrepuestos form">
<?php echo $this->Form->create('ArticulosAvisosrepuesto');?>
	<fieldset>
 		<legend><?php __('Add Articulos Avisosrepuesto'); ?></legend>
	<?php
		echo $this->Form->input('articulo_id');
		echo $this->Form->input('avisosrepuesto_id');
		echo $this->Form->input('cantidad');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Articulos Avisosrepuestos', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Articulos', true), array('controller' => 'articulos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Articulo', true), array('controller' => 'articulos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Avisosrepuestos', true), array('controller' => 'avisosrepuestos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Avisosrepuesto', true), array('controller' => 'avisosrepuestos', 'action' => 'add')); ?> </li>
	</ul>
</div>