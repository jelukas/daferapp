<div class="presupuestosclientes index">
	<h2><?php __('Presupuestosclientes');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('comerciale_id');?></th>
			<th><?php echo $this->Paginator->sort('fecha');?></th>
			<th><?php echo $this->Paginator->sort('avisar');?></th>
			<th><?php echo $this->Paginator->sort('observaciones');?></th>
			<th><?php echo $this->Paginator->sort('precio_mat');?></th>
			<th><?php echo $this->Paginator->sort('precio_obra');?></th>
			<th><?php echo $this->Paginator->sort('precio');?></th>
			<th><?php echo $this->Paginator->sort('impuestos');?></th>
			<th><?php echo $this->Paginator->sort('avisosrepuesto_id');?></th>
			<th><?php echo $this->Paginator->sort('ordene_id');?></th>
			<th><?php echo $this->Paginator->sort('avisostallere_id');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($presupuestosclientes as $presupuestoscliente):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $presupuestoscliente['Presupuestoscliente']['id']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($presupuestoscliente['Comerciale']['nombre'], array('controller' => 'comerciales', 'action' => 'view', $presupuestoscliente['Comerciale']['id'])); ?>
		</td>
		<td><?php echo $presupuestoscliente['Presupuestoscliente']['fecha']; ?>&nbsp;</td>
		<td><?php echo $presupuestoscliente['Presupuestoscliente']['avisar']; ?>&nbsp;</td>
		<td><?php echo $presupuestoscliente['Presupuestoscliente']['observaciones']; ?>&nbsp;</td>
		<td><?php echo $presupuestoscliente['Presupuestoscliente']['precio_mat']; ?>&nbsp;</td>
		<td><?php echo $presupuestoscliente['Presupuestoscliente']['precio_obra']; ?>&nbsp;</td>
		<td><?php echo $presupuestoscliente['Presupuestoscliente']['precio']; ?>&nbsp;</td>
		<td><?php echo $presupuestoscliente['Presupuestoscliente']['impuestos']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($presupuestoscliente['Avisosrepuesto']['id'], array('controller' => 'avisosrepuestos', 'action' => 'view', $presupuestoscliente['Avisosrepuesto']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($presupuestoscliente['Ordene']['id'], array('controller' => 'ordenes', 'action' => 'view', $presupuestoscliente['Ordene']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($presupuestoscliente['Avisostallere']['id'], array('controller' => 'avisostalleres', 'action' => 'view', $presupuestoscliente['Avisostallere']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $presupuestoscliente['Presupuestoscliente']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $presupuestoscliente['Presupuestoscliente']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $presupuestoscliente['Presupuestoscliente']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $presupuestoscliente['Presupuestoscliente']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Presupuestoscliente', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Comerciales', true), array('controller' => 'comerciales', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Comerciale', true), array('controller' => 'comerciales', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Avisosrepuestos', true), array('controller' => 'avisosrepuestos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Avisosrepuesto', true), array('controller' => 'avisosrepuestos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Ordenes', true), array('controller' => 'ordenes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Ordene', true), array('controller' => 'ordenes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Avisostalleres', true), array('controller' => 'avisostalleres', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Avisostallere', true), array('controller' => 'avisostalleres', 'action' => 'add')); ?> </li>
	</ul>
</div>