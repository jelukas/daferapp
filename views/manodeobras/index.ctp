<div class="manodeobras index">
	<h2><?php __('Manodeobras');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('tareaspresupuestocliente_id');?></th>
			<th><?php echo $this->Paginator->sort('horas');?></th>
			<th><?php echo $this->Paginator->sort('precio_hora');?></th>
			<th><?php echo $this->Paginator->sort('descuento');?></th>
			<th><?php echo $this->Paginator->sort('importe');?></th>
			<th><?php echo $this->Paginator->sort('descripcion');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($manodeobras as $manodeobra):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $manodeobra['Manodeobra']['id']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($manodeobra['Tareaspresupuestocliente']['asunto'], array('controller' => 'tareaspresupuestoclientes', 'action' => 'view', $manodeobra['Tareaspresupuestocliente']['id'])); ?>
		</td>
		<td><?php echo $manodeobra['Manodeobra']['horas']; ?>&nbsp;</td>
		<td><?php echo $manodeobra['Manodeobra']['precio_hora']; ?>&nbsp;</td>
		<td><?php echo $manodeobra['Manodeobra']['descuento']; ?>&nbsp;</td>
		<td><?php echo $manodeobra['Manodeobra']['importe']; ?>&nbsp;</td>
		<td><?php echo $manodeobra['Manodeobra']['descripcion']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $manodeobra['Manodeobra']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $manodeobra['Manodeobra']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $manodeobra['Manodeobra']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $manodeobra['Manodeobra']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Manodeobra', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Tareaspresupuestoclientes', true), array('controller' => 'tareaspresupuestoclientes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tareaspresupuestocliente', true), array('controller' => 'tareaspresupuestoclientes', 'action' => 'add')); ?> </li>
	</ul>
</div>