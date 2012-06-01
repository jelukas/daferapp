<div class="tareaspresupuestoclientes index">
	<h2><?php __('Tareaspresupuestoclientes');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('asunto');?></th>
			<th><?php echo $this->Paginator->sort('materiales');?></th>
			<th><?php echo $this->Paginator->sort('mano_de_obra');?></th>
			<th><?php echo $this->Paginator->sort('presupuestoscliente_id');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($tareaspresupuestoclientes as $tareaspresupuestocliente):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $tareaspresupuestocliente['Tareaspresupuestocliente']['id']; ?>&nbsp;</td>
		<td><?php echo $tareaspresupuestocliente['Tareaspresupuestocliente']['asunto']; ?>&nbsp;</td>
		<td><?php echo $tareaspresupuestocliente['Tareaspresupuestocliente']['materiales']; ?>&nbsp;</td>
		<td><?php echo $tareaspresupuestocliente['Tareaspresupuestocliente']['mano_de_obra']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($tareaspresupuestocliente['Presupuestoscliente']['fecha'], array('controller' => 'presupuestosclientes', 'action' => 'view', $tareaspresupuestocliente['Presupuestoscliente']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $tareaspresupuestocliente['Tareaspresupuestocliente']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $tareaspresupuestocliente['Tareaspresupuestocliente']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $tareaspresupuestocliente['Tareaspresupuestocliente']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $tareaspresupuestocliente['Tareaspresupuestocliente']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
	));
	?>	</p>

	<div class="paging">
		<?php echo $this->Paginator->prev('<< ' . __('previous', true), array(), null, array('class'=>'disabled'));?>
	 | 	<?php echo $this->Paginator->numbers();?>
 |
		<?php echo $this->Paginator->next(__('next', true) . ' >>', array(), null, array('class' => 'disabled'));?>
	</div>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Tareaspresupuestocliente', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Presupuestosclientes', true), array('controller' => 'presupuestosclientes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Presupuestoscliente', true), array('controller' => 'presupuestosclientes', 'action' => 'add')); ?> </li>
	</ul>
</div>