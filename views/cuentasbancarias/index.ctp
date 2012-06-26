<div class="cuentasbancarias index">
	<h2><?php __('Cuentasbancarias');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('nombre');?></th>
			<th><?php echo $this->Paginator->sort('numero_entidad');?></th>
			<th><?php echo $this->Paginator->sort('numero_sucursal');?></th>
			<th><?php echo $this->Paginator->sort('numero_dc');?></th>
			<th><?php echo $this->Paginator->sort('numero_cuenta');?></th>
			<th><?php echo $this->Paginator->sort('numero_bicswift');?></th>
			<th><?php echo $this->Paginator->sort('numero_iban');?></th>
			<th><?php echo $this->Paginator->sort('proveedore_id');?></th>
			<th><?php echo $this->Paginator->sort('cliente_id');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($cuentasbancarias as $cuentasbancaria):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $cuentasbancaria['Cuentasbancaria']['id']; ?>&nbsp;</td>
		<td><?php echo $cuentasbancaria['Cuentasbancaria']['nombre']; ?>&nbsp;</td>
		<td><?php echo $cuentasbancaria['Cuentasbancaria']['numero_entidad']; ?>&nbsp;</td>
		<td><?php echo $cuentasbancaria['Cuentasbancaria']['numero_sucursal']; ?>&nbsp;</td>
		<td><?php echo $cuentasbancaria['Cuentasbancaria']['numero_dc']; ?>&nbsp;</td>
		<td><?php echo $cuentasbancaria['Cuentasbancaria']['numero_cuenta']; ?>&nbsp;</td>
		<td><?php echo $cuentasbancaria['Cuentasbancaria']['numero_bicswift']; ?>&nbsp;</td>
		<td><?php echo $cuentasbancaria['Cuentasbancaria']['numero_iban']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($cuentasbancaria['Proveedore']['idnombre'], array('controller' => 'proveedores', 'action' => 'view', $cuentasbancaria['Proveedore']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($cuentasbancaria['Cliente']['nombre'], array('controller' => 'clientes', 'action' => 'view', $cuentasbancaria['Cliente']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $cuentasbancaria['Cuentasbancaria']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $cuentasbancaria['Cuentasbancaria']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $cuentasbancaria['Cuentasbancaria']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $cuentasbancaria['Cuentasbancaria']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Cuentasbancaria', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Proveedores', true), array('controller' => 'proveedores', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Proveedore', true), array('controller' => 'proveedores', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Clientes', true), array('controller' => 'clientes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cliente', true), array('controller' => 'clientes', 'action' => 'add')); ?> </li>
	</ul>
</div>