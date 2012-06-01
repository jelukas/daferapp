<div class="articulosReferenciasintercambiables form">
<?php echo $this->Form->create('ArticulosReferenciasintercambiable');?>
	<fieldset>
 		<legend><?php __('Add Articulos Referenciasintercambiable'); ?></legend>
	<?php
		echo $this->Form->input('referenciasintercambiable_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Articulos Referenciasintercambiables', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Articulos', true), array('controller' => 'articulos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Articulo', true), array('controller' => 'articulos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Referenciasintercambiables', true), array('controller' => 'referenciasintercambiables', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Referenciasintercambiable', true), array('controller' => 'referenciasintercambiables', 'action' => 'add')); ?> </li>
	</ul>
</div>