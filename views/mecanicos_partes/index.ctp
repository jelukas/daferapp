<div class="mecanicosPartes index">
	<h2><?php __('Mecanicos Partes');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('mecanico_id');?></th>
			<th><?php echo $this->Paginator->sort('parte_id');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($mecanicosPartes as $mecanicosParte):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $this->Html->link($mecanicosParte['Mecanico']['nombre'], array('controller' => 'mecanicos', 'action' => 'view', $mecanicosParte['Mecanico']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($mecanicosParte['Parte']['id'], array('controller' => 'partes', 'action' => 'view', $mecanicosParte['Parte']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $mecanicosParte['MecanicosParte']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $mecanicosParte['MecanicosParte']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $mecanicosParte['MecanicosParte']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $mecanicosParte['MecanicosParte']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Mecanicos Parte', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Mecanicos', true), array('controller' => 'mecanicos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Mecanico', true), array('controller' => 'mecanicos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Partes', true), array('controller' => 'partes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Parte', true), array('controller' => 'partes', 'action' => 'add')); ?> </li>
	</ul>
</div>