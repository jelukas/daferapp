<div class="materiales index">
	<h2><?php __('Materiales');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('tareaspresupuestocliente_id');?></th>
			<th><?php echo $this->Paginator->sort('articulo_id');?></th>
			<th><?php echo $this->Paginator->sort('cantidad');?></th>
			<th><?php echo $this->Paginator->sort('importe');?></th>
			<th><?php echo $this->Paginator->sort('descuento');?></th>
			<th><?php echo $this->Paginator->sort('precio_unidad');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($materiales as $materiale):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $materiale['Materiale']['id']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($materiale['Tareaspresupuestocliente']['asunto'], array('controller' => 'tareaspresupuestoclientes', 'action' => 'view', $materiale['Tareaspresupuestocliente']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($materiale['Articulo']['nombre'], array('controller' => 'articulos', 'action' => 'view', $materiale['Articulo']['id'])); ?>
		</td>
		<td><?php echo $materiale['Materiale']['cantidad']; ?>&nbsp;</td>
		<td><?php echo $materiale['Materiale']['importe']; ?>&nbsp;</td>
		<td><?php echo $materiale['Materiale']['descuento']; ?>&nbsp;</td>
		<td><?php echo $materiale['Materiale']['precio_unidad']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $materiale['Materiale']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $materiale['Materiale']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $materiale['Materiale']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $materiale['Materiale']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Materiale', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Tareaspresupuestoclientes', true), array('controller' => 'tareaspresupuestoclientes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tareaspresupuestocliente', true), array('controller' => 'tareaspresupuestoclientes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Articulos', true), array('controller' => 'articulos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Articulo', true), array('controller' => 'articulos', 'action' => 'add')); ?> </li>
	</ul>
</div>