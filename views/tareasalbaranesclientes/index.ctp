<div class="tareasalbaranesclientes index">
	<h2><?php __('Tareasalbaranesclientes');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('asunto');?></th>
			<th><?php echo $this->Paginator->sort('materiales');?></th>
			<th><?php echo $this->Paginator->sort('mano_de_obra');?></th>
			<th><?php echo $this->Paginator->sort('servicios');?></th>
			<th><?php echo $this->Paginator->sort('albaranescliente_id');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($tareasalbaranesclientes as $tareasalbaranescliente):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $tareasalbaranescliente['Tareasalbaranescliente']['id']; ?>&nbsp;</td>
		<td><?php echo $tareasalbaranescliente['Tareasalbaranescliente']['asunto']; ?>&nbsp;</td>
		<td><?php echo $tareasalbaranescliente['Tareasalbaranescliente']['materiales']; ?>&nbsp;</td>
		<td><?php echo $tareasalbaranescliente['Tareasalbaranescliente']['mano_de_obra']; ?>&nbsp;</td>
		<td><?php echo $tareasalbaranescliente['Tareasalbaranescliente']['servicios']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($tareasalbaranescliente['Albaranescliente']['id'], array('controller' => 'albaranesclientes', 'action' => 'view', $tareasalbaranescliente['Albaranescliente']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $tareasalbaranescliente['Tareasalbaranescliente']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $tareasalbaranescliente['Tareasalbaranescliente']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $tareasalbaranescliente['Tareasalbaranescliente']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $tareasalbaranescliente['Tareasalbaranescliente']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Tareasalbaranescliente', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Albaranesclientes', true), array('controller' => 'albaranesclientes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Albaranescliente', true), array('controller' => 'albaranesclientes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Tareasalbaranesclientes Otrosservicios', true), array('controller' => 'tareasalbaranesclientes_otrosservicios', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tareasalbaranesclientes Otrosservicio', true), array('controller' => 'tareasalbaranesclientes_otrosservicios', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Materiales Tareasalbaranesclientes', true), array('controller' => 'materiales_tareasalbaranesclientes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Materiales Tareasalbaranescliente', true), array('controller' => 'materiales_tareasalbaranesclientes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Manodeobras Tareasalbaranesclientes', true), array('controller' => 'manodeobras_tareasalbaranesclientes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Manodeobras Tareasalbaranescliente', true), array('controller' => 'manodeobras_tareasalbaranesclientes', 'action' => 'add')); ?> </li>
	</ul>
</div>