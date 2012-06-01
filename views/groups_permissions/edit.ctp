<div class="groupsPermissions form">
<?php echo $this->Form->create('GroupsPermission');?>
	<fieldset>
 		<legend><?php __('Edit Groups Permission'); ?></legend>
	<?php
		echo $this->Form->input('group_id');
		echo $this->Form->input('permission_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('GroupsPermission.group_id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('GroupsPermission.group_id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Groups Permissions', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Groups', true), array('controller' => 'groups', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Group', true), array('controller' => 'groups', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Permissions', true), array('controller' => 'permissions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Permission', true), array('controller' => 'permissions', 'action' => 'add')); ?> </li>
	</ul>
</div>