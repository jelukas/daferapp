<div class="cuentascontables view">
<h2><?php  __('Cuentascontable');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $cuentascontable['Cuentascontable']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Codigo'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $cuentascontable['Cuentascontable']['codigo']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Nombre'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $cuentascontable['Cuentascontable']['nombre']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Nombre Cuenta Abierta'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $cuentascontable['Cuentascontable']['nombre_cuenta_abierta']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Nombre Cuenta Externa'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $cuentascontable['Cuentascontable']['nombre_cuenta_externa']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Cuentascontable', true), array('action' => 'edit', $cuentascontable['Cuentascontable']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Cuentascontable', true), array('action' => 'delete', $cuentascontable['Cuentascontable']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $cuentascontable['Cuentascontable']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Cuentascontables', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cuentascontable', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Clientes', true), array('controller' => 'clientes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cliente', true), array('controller' => 'clientes', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php __('Related Clientes');?></h3>
	<?php if (!empty($cuentascontable['Cliente'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Cif'); ?></th>
		<th><?php __('Nombrefiscal'); ?></th>
		<th><?php __('Nombre'); ?></th>
		<th><?php __('Personascontacto'); ?></th>
		<th><?php __('Telefono'); ?></th>
		<th><?php __('Fax'); ?></th>
		<th><?php __('Web'); ?></th>
		<th><?php __('Email'); ?></th>
		<th><?php __('Direccion Postal'); ?></th>
		<th><?php __('Direccion Fiscal'); ?></th>
		<th><?php __('Modoenviofactura'); ?></th>
		<th><?php __('Riesgos'); ?></th>
		<th><?php __('Modo Facturacion'); ?></th>
		<th><?php __('Cuentascontable Id'); ?></th>
		<th><?php __('Imprimir Con Ref'); ?></th>
		<th><?php __('Comerciale Id'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($cuentascontable['Cliente'] as $cliente):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $cliente['id'];?></td>
			<td><?php echo $cliente['cif'];?></td>
			<td><?php echo $cliente['nombrefiscal'];?></td>
			<td><?php echo $cliente['nombre'];?></td>
			<td><?php echo $cliente['personascontacto'];?></td>
			<td><?php echo $cliente['telefono'];?></td>
			<td><?php echo $cliente['fax'];?></td>
			<td><?php echo $cliente['web'];?></td>
			<td><?php echo $cliente['email'];?></td>
			<td><?php echo $cliente['direccion_postal'];?></td>
			<td><?php echo $cliente['direccion_fiscal'];?></td>
			<td><?php echo $cliente['modoenviofactura'];?></td>
			<td><?php echo $cliente['riesgos'];?></td>
			<td><?php echo $cliente['modo_facturacion'];?></td>
			<td><?php echo $cliente['cuentascontable_id'];?></td>
			<td><?php echo $cliente['imprimir_con_ref'];?></td>
			<td><?php echo $cliente['comerciale_id'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View', true), array('controller' => 'clientes', 'action' => 'view', $cliente['id'])); ?>
				<?php echo $this->Html->link(__('Edit', true), array('controller' => 'clientes', 'action' => 'edit', $cliente['id'])); ?>
				<?php echo $this->Html->link(__('Delete', true), array('controller' => 'clientes', 'action' => 'delete', $cliente['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $cliente['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Cliente', true), array('controller' => 'clientes', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
