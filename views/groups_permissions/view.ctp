<div class="groupsPermissions view">
<h2><?php  __('Groups Permission');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Group'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($groupsPermission['Group']['name'], array('controller' => 'groups', 'action' => 'view', $groupsPermission['Group']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Permission'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($groupsPermission['Permission']['name'], array('controller' => 'permissions', 'action' => 'view', $groupsPermission['Permission']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Groups Permission', true), array('action' => 'edit', $groupsPermission['GroupsPermission']['group_id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Groups Permission', true), array('action' => 'delete', $groupsPermission['GroupsPermission']['group_id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $groupsPermission['GroupsPermission']['group_id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Groups Permissions', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Groups Permission', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Groups', true), array('controller' => 'groups', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Group', true), array('controller' => 'groups', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Permissions', true), array('controller' => 'permissions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Permission', true), array('controller' => 'permissions', 'action' => 'add')); ?> </li>
	</ul>
</div>
