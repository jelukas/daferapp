<div class="pedidosproveedores index">
	<h2><?php __('Pedidosproveedores');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('fecha');?></th>
			<th><?php echo $this->Paginator->sort('observaciones');?></th>
			<th><?php echo $this->Paginator->sort('fecharecepcion');?></th>
			<th><?php echo $this->Paginator->sort('pedidoescaneado');?></th>
			<th><?php echo $this->Paginator->sort('presupuestosproveedore_id');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($pedidosproveedores as $pedidosproveedore):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $pedidosproveedore['Pedidosproveedore']['id']; ?>&nbsp;</td>
		<td><?php echo $pedidosproveedore['Pedidosproveedore']['fecha']; ?>&nbsp;</td>
		<td><?php echo $pedidosproveedore['Pedidosproveedore']['observaciones']; ?>&nbsp;</td>
		<td><?php echo $pedidosproveedore['Pedidosproveedore']['fecharecepcion']; ?>&nbsp;</td>
		<td><?php echo $pedidosproveedore['Pedidosproveedore']['pedidoescaneado']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($pedidosproveedore['Presupuestosproveedore']['id'], array('controller' => 'presupuestosproveedores', 'action' => 'view', $pedidosproveedore['Presupuestosproveedore']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $pedidosproveedore['Pedidosproveedore']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $pedidosproveedore['Pedidosproveedore']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $pedidosproveedore['Pedidosproveedore']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $pedidosproveedore['Pedidosproveedore']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Pedidosproveedore', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Presupuestosproveedores', true), array('controller' => 'presupuestosproveedores', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Presupuestosproveedore', true), array('controller' => 'presupuestosproveedores', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Albaranesproveedores', true), array('controller' => 'albaranesproveedores', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Albaranesproveedore', true), array('controller' => 'albaranesproveedores', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Articulos Pedidosproveedores', true), array('controller' => 'articulos_pedidosproveedores', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Articulos Pedidosproveedore', true), array('controller' => 'articulos_pedidosproveedores', 'action' => 'add')); ?> </li>
	</ul>
</div>