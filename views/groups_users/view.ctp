<div class="groupsUsers view">
<h2><?php  __('Groups User');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Group'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($groupsUser['Group']['name'], array('controller' => 'groups', 'action' => 'view', $groupsUser['Group']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('User'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($groupsUser['User']['username'], array('controller' => 'users', 'action' => 'view', $groupsUser['User']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Groups User', true), array('action' => 'edit', $groupsUser['GroupsUser']['group_id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Groups User', true), array('action' => 'delete', $groupsUser['GroupsUser']['group_id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $groupsUser['GroupsUser']['group_id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Groups Users', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Groups User', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Groups', true), array('controller' => 'groups', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Group', true), array('controller' => 'groups', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User', true), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
