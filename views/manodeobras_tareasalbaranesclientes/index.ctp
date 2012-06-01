<div class="manodeobrasTareasalbaranesclientes index">
	<h2><?php __('Manodeobras Tareasalbaranesclientes');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('tareasalbaranescliente_id');?></th>
			<th><?php echo $this->Paginator->sort('horas');?></th>
			<th><?php echo $this->Paginator->sort('precio_hora');?></th>
			<th><?php echo $this->Paginator->sort('descuento');?></th>
			<th><?php echo $this->Paginator->sort('importe');?></th>
			<th><?php echo $this->Paginator->sort('descripcion');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($manodeobrasTareasalbaranesclientes as $manodeobrasTareasalbaranescliente):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $manodeobrasTareasalbaranescliente['ManodeobrasTareasalbaranescliente']['id']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($manodeobrasTareasalbaranescliente['Tareasalbaranescliente']['id'], array('controller' => 'tareasalbaranesclientes', 'action' => 'view', $manodeobrasTareasalbaranescliente['Tareasalbaranescliente']['id'])); ?>
		</td>
		<td><?php echo $manodeobrasTareasalbaranescliente['ManodeobrasTareasalbaranescliente']['horas']; ?>&nbsp;</td>
		<td><?php echo $manodeobrasTareasalbaranescliente['ManodeobrasTareasalbaranescliente']['precio_hora']; ?>&nbsp;</td>
		<td><?php echo $manodeobrasTareasalbaranescliente['ManodeobrasTareasalbaranescliente']['descuento']; ?>&nbsp;</td>
		<td><?php echo $manodeobrasTareasalbaranescliente['ManodeobrasTareasalbaranescliente']['importe']; ?>&nbsp;</td>
		<td><?php echo $manodeobrasTareasalbaranescliente['ManodeobrasTareasalbaranescliente']['descripcion']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $manodeobrasTareasalbaranescliente['ManodeobrasTareasalbaranescliente']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $manodeobrasTareasalbaranescliente['ManodeobrasTareasalbaranescliente']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $manodeobrasTareasalbaranescliente['ManodeobrasTareasalbaranescliente']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $manodeobrasTareasalbaranescliente['ManodeobrasTareasalbaranescliente']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Manodeobras Tareasalbaranescliente', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Tareasalbaranesclientes', true), array('controller' => 'tareasalbaranesclientes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tareasalbaranescliente', true), array('controller' => 'tareasalbaranesclientes', 'action' => 'add')); ?> </li>
	</ul>
</div>