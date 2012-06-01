<div class="materialesTareasalbaranesclientes index">
	<h2><?php __('Materiales Tareasalbaranesclientes');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('articulo_id');?></th>
			<th><?php echo $this->Paginator->sort('tareasalbaranescliente_id');?></th>
			<th><?php echo $this->Paginator->sort('cantidad');?></th>
			<th><?php echo $this->Paginator->sort('importe');?></th>
			<th><?php echo $this->Paginator->sort('descuento');?></th>
			<th><?php echo $this->Paginator->sort('precio_unidad');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($materialesTareasalbaranesclientes as $materialesTareasalbaranescliente):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $materialesTareasalbaranescliente['MaterialesTareasalbaranescliente']['id']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($materialesTareasalbaranescliente['Articulo']['nombre'], array('controller' => 'articulos', 'action' => 'view', $materialesTareasalbaranescliente['Articulo']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($materialesTareasalbaranescliente['Tareasalbaranescliente']['id'], array('controller' => 'tareasalbaranesclientes', 'action' => 'view', $materialesTareasalbaranescliente['Tareasalbaranescliente']['id'])); ?>
		</td>
		<td><?php echo $materialesTareasalbaranescliente['MaterialesTareasalbaranescliente']['cantidad']; ?>&nbsp;</td>
		<td><?php echo $materialesTareasalbaranescliente['MaterialesTareasalbaranescliente']['importe']; ?>&nbsp;</td>
		<td><?php echo $materialesTareasalbaranescliente['MaterialesTareasalbaranescliente']['descuento']; ?>&nbsp;</td>
		<td><?php echo $materialesTareasalbaranescliente['MaterialesTareasalbaranescliente']['precio_unidad']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $materialesTareasalbaranescliente['MaterialesTareasalbaranescliente']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $materialesTareasalbaranescliente['MaterialesTareasalbaranescliente']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $materialesTareasalbaranescliente['MaterialesTareasalbaranescliente']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $materialesTareasalbaranescliente['MaterialesTareasalbaranescliente']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Materiales Tareasalbaranescliente', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Tareasalbaranesclientes', true), array('controller' => 'tareasalbaranesclientes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tareasalbaranescliente', true), array('controller' => 'tareasalbaranesclientes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Articulos', true), array('controller' => 'articulos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Articulo', true), array('controller' => 'articulos', 'action' => 'add')); ?> </li>
	</ul>
</div>