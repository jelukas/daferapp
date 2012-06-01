<div class="tareaspedidosclientesOtrosservicios index">
	<h2><?php __('Tareaspedidosclientes Otrosservicios');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('tareaspedidoscliente_id');?></th>
			<th><?php echo $this->Paginator->sort('desplazamiento');?></th>
			<th><?php echo $this->Paginator->sort('manoobradesplazamiento');?></th>
			<th><?php echo $this->Paginator->sort('kilometraje');?></th>
			<th><?php echo $this->Paginator->sort('dietas');?></th>
			<th><?php echo $this->Paginator->sort('varios');?></th>
			<th><?php echo $this->Paginator->sort('total');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($tareaspedidosclientesOtrosservicios as $tareaspedidosclientesOtrosservicio):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $tareaspedidosclientesOtrosservicio['TareaspedidosclientesOtrosservicio']['id']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($tareaspedidosclientesOtrosservicio['Tareaspedidoscliente']['asunto'], array('controller' => 'tareaspedidosclientes', 'action' => 'view', $tareaspedidosclientesOtrosservicio['Tareaspedidoscliente']['id'])); ?>
		</td>
		<td><?php echo $tareaspedidosclientesOtrosservicio['TareaspedidosclientesOtrosservicio']['desplazamiento']; ?>&nbsp;</td>
		<td><?php echo $tareaspedidosclientesOtrosservicio['TareaspedidosclientesOtrosservicio']['manoobradesplazamiento']; ?>&nbsp;</td>
		<td><?php echo $tareaspedidosclientesOtrosservicio['TareaspedidosclientesOtrosservicio']['kilometraje']; ?>&nbsp;</td>
		<td><?php echo $tareaspedidosclientesOtrosservicio['TareaspedidosclientesOtrosservicio']['dietas']; ?>&nbsp;</td>
		<td><?php echo $tareaspedidosclientesOtrosservicio['TareaspedidosclientesOtrosservicio']['varios']; ?>&nbsp;</td>
		<td><?php echo $tareaspedidosclientesOtrosservicio['TareaspedidosclientesOtrosservicio']['total']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $tareaspedidosclientesOtrosservicio['TareaspedidosclientesOtrosservicio']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $tareaspedidosclientesOtrosservicio['TareaspedidosclientesOtrosservicio']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $tareaspedidosclientesOtrosservicio['TareaspedidosclientesOtrosservicio']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $tareaspedidosclientesOtrosservicio['TareaspedidosclientesOtrosservicio']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Tareaspedidosclientes Otrosservicio', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Tareaspedidosclientes', true), array('controller' => 'tareaspedidosclientes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tareaspedidoscliente', true), array('controller' => 'tareaspedidosclientes', 'action' => 'add')); ?> </li>
	</ul>
</div>