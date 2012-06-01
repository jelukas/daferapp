<div class="estadosavisosrepuestos form">
<?php echo $this->Form->create('Estadosavisosrepuesto');?>
	<fieldset>
 		<legend><?php __('Add Estadosavisosrepuesto'); ?></legend>
	<?php
		echo $this->Form->input('estado');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Estadosavisosrepuestos', true), array('action' => 'index'));?></li>
	</ul>
</div>