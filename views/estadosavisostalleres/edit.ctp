<div class="estadosavisostalleres form">
<?php echo $this->Form->create('Estadosavisostallere');?>
	<fieldset>
 		<legend><?php __('Edit Estadosavisostallere'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('estado');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('Estadosavisostallere.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('Estadosavisostallere.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Estadosavisostalleres', true), array('action' => 'index'));?></li>
	</ul>
</div>