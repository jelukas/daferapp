<div class="formapagos index">
	<h2><?php __('Formapagos');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('nombre');?></th>
			<th><?php echo $this->Paginator->sort('tipodepago');?></th>
			<th><?php echo $this->Paginator->sort('numero_vencimientos');?></th>
			<th><?php echo $this->Paginator->sort('dias_entre_vencimiento');?></th>
			<th><?php echo $this->Paginator->sort('dia_mes_fijo_vencimiento');?></th>
			<th><?php echo $this->Paginator->sort('proveedore_id');?></th>
			<th><?php echo $this->Paginator->sort('cliente_id');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($formapagos as $formapago):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $formapago['Formapago']['id']; ?>&nbsp;</td>
		<td><?php echo $formapago['Formapago']['nombre']; ?>&nbsp;</td>
		<td><?php echo $formapago['Formapago']['tipodepago']; ?>&nbsp;</td>
		<td><?php echo $formapago['Formapago']['numero_vencimientos']; ?>&nbsp;</td>
		<td><?php echo $formapago['Formapago']['dias_entre_vencimiento']; ?>&nbsp;</td>
		<td><?php echo $formapago['Formapago']['dia_mes_fijo_vencimiento']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($formapago['Proveedore']['idnombre'], array('controller' => 'proveedores', 'action' => 'view', $formapago['Proveedore']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($formapago['Cliente']['nombre'], array('controller' => 'clientes', 'action' => 'view', $formapago['Cliente']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $formapago['Formapago']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $formapago['Formapago']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $formapago['Formapago']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $formapago['Formapago']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Formapago', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Proveedores', true), array('controller' => 'proveedores', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Proveedore', true), array('controller' => 'proveedores', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Clientes', true), array('controller' => 'clientes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cliente', true), array('controller' => 'clientes', 'action' => 'add')); ?> </li>
	</ul>
</div>