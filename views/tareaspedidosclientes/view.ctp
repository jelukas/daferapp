<div class="tareaspedidosclientes view">
<h2><?php  __('Tareaspedidoscliente');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $tareaspedidoscliente['Tareaspedidoscliente']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Asunto'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $tareaspedidoscliente['Tareaspedidoscliente']['asunto']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Materiales'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $tareaspedidoscliente['Tareaspedidoscliente']['materiales']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Mano De Obra'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $tareaspedidoscliente['Tareaspedidoscliente']['mano_de_obra']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Servicios'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $tareaspedidoscliente['Tareaspedidoscliente']['servicios']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Pedidoscliente'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($tareaspedidoscliente['Pedidoscliente']['id'], array('controller' => 'pedidosclientes', 'action' => 'view', $tareaspedidoscliente['Pedidoscliente']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Tareaspedidoscliente', true), array('action' => 'edit', $tareaspedidoscliente['Tareaspedidoscliente']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Tareaspedidoscliente', true), array('action' => 'delete', $tareaspedidoscliente['Tareaspedidoscliente']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $tareaspedidoscliente['Tareaspedidoscliente']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Tareaspedidosclientes', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tareaspedidoscliente', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Pedidosclientes', true), array('controller' => 'pedidosclientes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Pedidoscliente', true), array('controller' => 'pedidosclientes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Tareaspedidosclientes Otrosservicios', true), array('controller' => 'tareaspedidosclientes_otrosservicios', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tareaspedidosclientes Otrosservicio', true), array('controller' => 'tareaspedidosclientes_otrosservicios', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Materiales Tareaspedidosclientes', true), array('controller' => 'materiales_tareaspedidosclientes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Materiales Tareaspedidoscliente', true), array('controller' => 'materiales_tareaspedidosclientes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Manodeobras Tareaspedidosclientes', true), array('controller' => 'manodeobras_tareaspedidosclientes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Manodeobras Tareaspedidoscliente', true), array('controller' => 'manodeobras_tareaspedidosclientes', 'action' => 'add')); ?> </li>
	</ul>
</div>
	<div class="related">
		<h3><?php __('Related Tareaspedidosclientes Otrosservicios');?></h3>
	<?php if (!empty($tareaspedidoscliente['TareaspedidosclientesOtrosservicio'])):?>
		<dl>	<?php $i = 0; $class = ' class="altrow"';?>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id');?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
	<?php echo $tareaspedidoscliente['TareaspedidosclientesOtrosservicio']['id'];?>
&nbsp;</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Tareaspedidoscliente Id');?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
	<?php echo $tareaspedidoscliente['TareaspedidosclientesOtrosservicio']['tareaspedidoscliente_id'];?>
&nbsp;</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Desplazamiento');?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
	<?php echo $tareaspedidoscliente['TareaspedidosclientesOtrosservicio']['desplazamiento'];?>
&nbsp;</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Manoobradesplazamiento');?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
	<?php echo $tareaspedidoscliente['TareaspedidosclientesOtrosservicio']['manoobradesplazamiento'];?>
&nbsp;</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Kilometraje');?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
	<?php echo $tareaspedidoscliente['TareaspedidosclientesOtrosservicio']['kilometraje'];?>
&nbsp;</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Dietas');?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
	<?php echo $tareaspedidoscliente['TareaspedidosclientesOtrosservicio']['dietas'];?>
&nbsp;</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Varios');?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
	<?php echo $tareaspedidoscliente['TareaspedidosclientesOtrosservicio']['varios'];?>
&nbsp;</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Total');?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
	<?php echo $tareaspedidoscliente['TareaspedidosclientesOtrosservicio']['total'];?>
&nbsp;</dd>
		</dl>
	<?php endif; ?>
		<div class="actions">
			<ul>
				<li><?php echo $this->Html->link(__('Edit Tareaspedidosclientes Otrosservicio', true), array('controller' => 'tareaspedidosclientes_otrosservicios', 'action' => 'edit', $tareaspedidoscliente['TareaspedidosclientesOtrosservicio']['id'])); ?></li>
			</ul>
		</div>
	</div>
	<div class="related">
	<h3><?php __('Related Materiales Tareaspedidosclientes');?></h3>
	<?php if (!empty($tareaspedidoscliente['MaterialesTareaspedidoscliente'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Articulo Id'); ?></th>
		<th><?php __('Tareaspedidoscliente Id'); ?></th>
		<th><?php __('Cantidad'); ?></th>
		<th><?php __('Importe'); ?></th>
		<th><?php __('Descuento'); ?></th>
		<th><?php __('Precio Unidad'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($tareaspedidoscliente['MaterialesTareaspedidoscliente'] as $materialesTareaspedidoscliente):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $materialesTareaspedidoscliente['id'];?></td>
			<td><?php echo $materialesTareaspedidoscliente['articulo_id'];?></td>
			<td><?php echo $materialesTareaspedidoscliente['tareaspedidoscliente_id'];?></td>
			<td><?php echo $materialesTareaspedidoscliente['cantidad'];?></td>
			<td><?php echo $materialesTareaspedidoscliente['importe'];?></td>
			<td><?php echo $materialesTareaspedidoscliente['descuento'];?></td>
			<td><?php echo $materialesTareaspedidoscliente['precio_unidad'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View', true), array('controller' => 'materiales_tareaspedidosclientes', 'action' => 'view', $materialesTareaspedidoscliente['id'])); ?>
				<?php echo $this->Html->link(__('Edit', true), array('controller' => 'materiales_tareaspedidosclientes', 'action' => 'edit', $materialesTareaspedidoscliente['id'])); ?>
				<?php echo $this->Html->link(__('Delete', true), array('controller' => 'materiales_tareaspedidosclientes', 'action' => 'delete', $materialesTareaspedidoscliente['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $materialesTareaspedidoscliente['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Materiales Tareaspedidoscliente', true), array('controller' => 'materiales_tareaspedidosclientes', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php __('Related Manodeobras Tareaspedidosclientes');?></h3>
	<?php if (!empty($tareaspedidoscliente['ManodeobrasTareaspedidoscliente'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Tareaspedidoscliente Id'); ?></th>
		<th><?php __('Horas'); ?></th>
		<th><?php __('Precio Hora'); ?></th>
		<th><?php __('Descuento'); ?></th>
		<th><?php __('Importe'); ?></th>
		<th><?php __('Descripcion'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($tareaspedidoscliente['ManodeobrasTareaspedidoscliente'] as $manodeobrasTareaspedidoscliente):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $manodeobrasTareaspedidoscliente['id'];?></td>
			<td><?php echo $manodeobrasTareaspedidoscliente['tareaspedidoscliente_id'];?></td>
			<td><?php echo $manodeobrasTareaspedidoscliente['horas'];?></td>
			<td><?php echo $manodeobrasTareaspedidoscliente['precio_hora'];?></td>
			<td><?php echo $manodeobrasTareaspedidoscliente['descuento'];?></td>
			<td><?php echo $manodeobrasTareaspedidoscliente['importe'];?></td>
			<td><?php echo $manodeobrasTareaspedidoscliente['descripcion'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View', true), array('controller' => 'manodeobras_tareaspedidosclientes', 'action' => 'view', $manodeobrasTareaspedidoscliente['id'])); ?>
				<?php echo $this->Html->link(__('Edit', true), array('controller' => 'manodeobras_tareaspedidosclientes', 'action' => 'edit', $manodeobrasTareaspedidoscliente['id'])); ?>
				<?php echo $this->Html->link(__('Delete', true), array('controller' => 'manodeobras_tareaspedidosclientes', 'action' => 'delete', $manodeobrasTareaspedidoscliente['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $manodeobrasTareaspedidoscliente['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Manodeobras Tareaspedidoscliente', true), array('controller' => 'manodeobras_tareaspedidosclientes', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
