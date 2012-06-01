<div class="tareaspresupuestoclientesOtrosservicios index">
	<h2><?php __('Tareaspresupuestoclientes Otrosservicios');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('tareaspresupuestocliente_id');?></th>
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
	foreach ($tareaspresupuestoclientesOtrosservicios as $tareaspresupuestoclientesOtrosservicio):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $tareaspresupuestoclientesOtrosservicio['TareaspresupuestoclientesOtrosservicio']['id']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($tareaspresupuestoclientesOtrosservicio['Tareaspresupuestocliente']['asunto'], array('controller' => 'tareaspresupuestoclientes', 'action' => 'view', $tareaspresupuestoclientesOtrosservicio['Tareaspresupuestocliente']['id'])); ?>
		</td>
		<td><?php echo $tareaspresupuestoclientesOtrosservicio['TareaspresupuestoclientesOtrosservicio']['desplazamiento']; ?>&nbsp;</td>
		<td><?php echo $tareaspresupuestoclientesOtrosservicio['TareaspresupuestoclientesOtrosservicio']['manoobradesplazamiento']; ?>&nbsp;</td>
		<td><?php echo $tareaspresupuestoclientesOtrosservicio['TareaspresupuestoclientesOtrosservicio']['kilometraje']; ?>&nbsp;</td>
		<td><?php echo $tareaspresupuestoclientesOtrosservicio['TareaspresupuestoclientesOtrosservicio']['dietas']; ?>&nbsp;</td>
		<td><?php echo $tareaspresupuestoclientesOtrosservicio['TareaspresupuestoclientesOtrosservicio']['varios']; ?>&nbsp;</td>
		<td><?php echo $tareaspresupuestoclientesOtrosservicio['TareaspresupuestoclientesOtrosservicio']['total']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $tareaspresupuestoclientesOtrosservicio['TareaspresupuestoclientesOtrosservicio']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $tareaspresupuestoclientesOtrosservicio['TareaspresupuestoclientesOtrosservicio']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $tareaspresupuestoclientesOtrosservicio['TareaspresupuestoclientesOtrosservicio']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $tareaspresupuestoclientesOtrosservicio['TareaspresupuestoclientesOtrosservicio']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Tareaspresupuestoclientes Otrosservicio', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Tareaspresupuestoclientes', true), array('controller' => 'tareaspresupuestoclientes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tareaspresupuestocliente', true), array('controller' => 'tareaspresupuestoclientes', 'action' => 'add')); ?> </li>
	</ul>
</div>