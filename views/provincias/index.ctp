<div class="provincias index">
	<h2><?php __('Provincias');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('provincia');?></th>
			<th><?php echo $this->Paginator->sort('provinciaseo');?></th>
			<th><?php echo $this->Paginator->sort('provincia3');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($provincias as $provincia):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $provincia['Provincia']['id']; ?>&nbsp;</td>
		<td><?php echo $provincia['Provincia']['provincia']; ?>&nbsp;</td>
		<td><?php echo $provincia['Provincia']['provinciaseo']; ?>&nbsp;</td>
		<td><?php echo $provincia['Provincia']['provincia3']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $provincia['Provincia']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $provincia['Provincia']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $provincia['Provincia']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $provincia['Provincia']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Página %page% de %pages%, mostrando %current% filas de %count% total, starting on record %start%, finalizando en %end%', true)
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
		<li><?php echo $this->Html->link(__('New Provincia', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Poblaciones', true), array('controller' => 'poblaciones', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Poblacione', true), array('controller' => 'poblaciones', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Proveedores', true), array('controller' => 'proveedores', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Proveedore', true), array('controller' => 'proveedores', 'action' => 'add')); ?> </li>
	</ul>
</div>