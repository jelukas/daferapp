<div class="estadosordenes form">
<?php echo $this->Form->create('Estadosordene');?>
	<fieldset>
 		<legend><?php __('Add Estadosordene'); ?></legend>
	<?php
		echo $this->Form->input('estado');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Estadosordenes', true), array('action' => 'index'));?></li>
	</ul>
</div>