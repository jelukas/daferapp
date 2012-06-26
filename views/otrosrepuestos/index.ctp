<div class="otrosrepuestos index">
	<h2><?php __('Otrosrepuestos');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('articulo_id');?></th>
			<th><?php echo $this->Paginator->sort('maquina_id');?></th>
			<th><?php echo $this->Paginator->sort('cantidad');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($otrosrepuestos as $otrosrepuesto):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $otrosrepuesto['Otrosrepuesto']['id']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($otrosrepuesto['Articulo']['nombre'], array('controller' => 'articulos', 'action' => 'view', $otrosrepuesto['Articulo']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($otrosrepuesto['Maquina']['nombre'], array('controller' => 'maquinas', 'action' => 'view', $otrosrepuesto['Maquina']['id'])); ?>
		</td>
		<td><?php echo $otrosrepuesto['Otrosrepuesto']['cantidad']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $otrosrepuesto['Otrosrepuesto']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $otrosrepuesto['Otrosrepuesto']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $otrosrepuesto['Otrosrepuesto']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $otrosrepuesto['Otrosrepuesto']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Otrosrepuesto', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Articulos', true), array('controller' => 'articulos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Articulo', true), array('controller' => 'articulos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Maquinas', true), array('controller' => 'maquinas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Maquina', true), array('controller' => 'maquinas', 'action' => 'add')); ?> </li>
	</ul>
</div>