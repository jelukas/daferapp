<div class="tareasalbaranesclientesOtrosservicios index">
	<h2><?php __('Tareasalbaranesclientes Otrosservicios');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('tareasalbaranescliente_id');?></th>
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
	foreach ($tareasalbaranesclientesOtrosservicios as $tareasalbaranesclientesOtrosservicio):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $tareasalbaranesclientesOtrosservicio['TareasalbaranesclientesOtrosservicio']['id']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($tareasalbaranesclientesOtrosservicio['Tareasalbaranescliente']['id'], array('controller' => 'tareasalbaranesclientes', 'action' => 'view', $tareasalbaranesclientesOtrosservicio['Tareasalbaranescliente']['id'])); ?>
		</td>
		<td><?php echo $tareasalbaranesclientesOtrosservicio['TareasalbaranesclientesOtrosservicio']['desplazamiento']; ?>&nbsp;</td>
		<td><?php echo $tareasalbaranesclientesOtrosservicio['TareasalbaranesclientesOtrosservicio']['manoobradesplazamiento']; ?>&nbsp;</td>
		<td><?php echo $tareasalbaranesclientesOtrosservicio['TareasalbaranesclientesOtrosservicio']['kilometraje']; ?>&nbsp;</td>
		<td><?php echo $tareasalbaranesclientesOtrosservicio['TareasalbaranesclientesOtrosservicio']['dietas']; ?>&nbsp;</td>
		<td><?php echo $tareasalbaranesclientesOtrosservicio['TareasalbaranesclientesOtrosservicio']['varios']; ?>&nbsp;</td>
		<td><?php echo $tareasalbaranesclientesOtrosservicio['TareasalbaranesclientesOtrosservicio']['total']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $tareasalbaranesclientesOtrosservicio['TareasalbaranesclientesOtrosservicio']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $tareasalbaranesclientesOtrosservicio['TareasalbaranesclientesOtrosservicio']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $tareasalbaranesclientesOtrosservicio['TareasalbaranesclientesOtrosservicio']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $tareasalbaranesclientesOtrosservicio['TareasalbaranesclientesOtrosservicio']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Tareasalbaranesclientes Otrosservicio', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Tareasalbaranesclientes', true), array('controller' => 'tareasalbaranesclientes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tareasalbaranescliente', true), array('controller' => 'tareasalbaranesclientes', 'action' => 'add')); ?> </li>
	</ul>
</div>