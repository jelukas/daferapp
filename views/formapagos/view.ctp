<div class="formapagos view">
<h2><?php  __('Forma de pago');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('ID'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $formapago['Formapago']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Código'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $formapago['Formapago']['codigo']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Nombre'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $formapago['Formapago']['nombre']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Editar Forma de pago', true), array('action' => 'edit', $formapago['Formapago']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Eliminar Forma de pago', true), array('action' => 'delete', $formapago['Formapago']['id']), null, sprintf(__('¿Desea eliminar la forma de pago %s?', true), $formapago['Formapago']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Formas de pago', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nueva Forma de pago', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Clientes', true), array('controller' => 'clientes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Cliente', true), array('controller' => 'clientes', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php __('Clientes relacionados');?></h3>
	<?php if (!empty($formapago['Cliente'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
			<td><?php echo $cliente['CIF'];?></td>

			<td><?php echo $cliente['Código'];?></td>
			<td><?php echo $cliente['Nombre'];?></td>
			
			<td><?php echo $cliente['Teléfono'];?></td>

		<th class="actions"><?php __('Acciones');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($formapago['Cliente'] as $cliente):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			
			<td><?php echo $cliente['cif'];?></td>
			<td><?php echo $cliente['codigo'];?></td>
			<td><?php echo $cliente['nombre'];?></td>
			
			<td><?php echo $cliente['telefono'];?></td>
			
			<td class="actions">
				<?php echo $this->Html->link(__('Ver', true), array('controller' => 'clientes', 'action' => 'view', $cliente['id'])); ?>
				<?php echo $this->Html->link(__('Editar', true), array('controller' => 'clientes', 'action' => 'edit', $cliente['id'])); ?>
				<?php echo $this->Html->link(__('Eliminar', true), array('controller' => 'clientes', 'action' => 'delete', $cliente['id']), null, sprintf(__('¿Desea eliminar el cliente %s?', true), $cliente['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('Nuevo Cliente', true), array('controller' => 'clientes', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
