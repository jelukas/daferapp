<div class="tareasalbaranesclientes view">
<h2><?php  __('Tareasalbaranescliente');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $tareasalbaranescliente['Tareasalbaranescliente']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Asunto'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $tareasalbaranescliente['Tareasalbaranescliente']['asunto']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Materiales'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $tareasalbaranescliente['Tareasalbaranescliente']['materiales']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Mano De Obra'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $tareasalbaranescliente['Tareasalbaranescliente']['mano_de_obra']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Servicios'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $tareasalbaranescliente['Tareasalbaranescliente']['servicios']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Albaranescliente'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($tareasalbaranescliente['Albaranescliente']['id'], array('controller' => 'albaranesclientes', 'action' => 'view', $tareasalbaranescliente['Albaranescliente']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Tareasalbaranescliente', true), array('action' => 'edit', $tareasalbaranescliente['Tareasalbaranescliente']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Tareasalbaranescliente', true), array('action' => 'delete', $tareasalbaranescliente['Tareasalbaranescliente']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $tareasalbaranescliente['Tareasalbaranescliente']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Tareasalbaranesclientes', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tareasalbaranescliente', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Albaranesclientes', true), array('controller' => 'albaranesclientes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Albaranescliente', true), array('controller' => 'albaranesclientes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Tareasalbaranesclientes Otrosservicios', true), array('controller' => 'tareasalbaranesclientes_otrosservicios', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tareasalbaranesclientes Otrosservicio', true), array('controller' => 'tareasalbaranesclientes_otrosservicios', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Materiales Tareasalbaranesclientes', true), array('controller' => 'materiales_tareasalbaranesclientes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Materiales Tareasalbaranescliente', true), array('controller' => 'materiales_tareasalbaranesclientes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Manodeobras Tareasalbaranesclientes', true), array('controller' => 'manodeobras_tareasalbaranesclientes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Manodeobras Tareasalbaranescliente', true), array('controller' => 'manodeobras_tareasalbaranesclientes', 'action' => 'add')); ?> </li>
	</ul>
</div>
	<div class="related">
		<h3><?php __('Related Tareasalbaranesclientes Otrosservicios');?></h3>
	<?php if (!empty($tareasalbaranescliente['TareasalbaranesclientesOtrosservicio'])):?>
		<dl>	<?php $i = 0; $class = ' class="altrow"';?>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id');?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
	<?php echo $tareasalbaranescliente['TareasalbaranesclientesOtrosservicio']['id'];?>
&nbsp;</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Tareasalbaranescliente Id');?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
	<?php echo $tareasalbaranescliente['TareasalbaranesclientesOtrosservicio']['tareasalbaranescliente_id'];?>
&nbsp;</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Desplazamiento');?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
	<?php echo $tareasalbaranescliente['TareasalbaranesclientesOtrosservicio']['desplazamiento'];?>
&nbsp;</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Manoobradesplazamiento');?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
	<?php echo $tareasalbaranescliente['TareasalbaranesclientesOtrosservicio']['manoobradesplazamiento'];?>
&nbsp;</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Kilometraje');?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
	<?php echo $tareasalbaranescliente['TareasalbaranesclientesOtrosservicio']['kilometraje'];?>
&nbsp;</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Dietas');?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
	<?php echo $tareasalbaranescliente['TareasalbaranesclientesOtrosservicio']['dietas'];?>
&nbsp;</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Varios');?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
	<?php echo $tareasalbaranescliente['TareasalbaranesclientesOtrosservicio']['varios'];?>
&nbsp;</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Total');?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
	<?php echo $tareasalbaranescliente['TareasalbaranesclientesOtrosservicio']['total'];?>
&nbsp;</dd>
		</dl>
	<?php endif; ?>
		<div class="actions">
			<ul>
				<li><?php echo $this->Html->link(__('Edit Tareasalbaranesclientes Otrosservicio', true), array('controller' => 'tareasalbaranesclientes_otrosservicios', 'action' => 'edit', $tareasalbaranescliente['TareasalbaranesclientesOtrosservicio']['id'])); ?></li>
			</ul>
		</div>
	</div>
	<div class="related">
	<h3><?php __('Related Materiales Tareasalbaranesclientes');?></h3>
	<?php if (!empty($tareasalbaranescliente['MaterialesTareasalbaranescliente'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Articulo Id'); ?></th>
		<th><?php __('Tareasalbaranescliente Id'); ?></th>
		<th><?php __('Cantidad'); ?></th>
		<th><?php __('Importe'); ?></th>
		<th><?php __('Descuento'); ?></th>
		<th><?php __('Precio Unidad'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($tareasalbaranescliente['MaterialesTareasalbaranescliente'] as $materialesTareasalbaranescliente):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $materialesTareasalbaranescliente['id'];?></td>
			<td><?php echo $materialesTareasalbaranescliente['articulo_id'];?></td>
			<td><?php echo $materialesTareasalbaranescliente['tareasalbaranescliente_id'];?></td>
			<td><?php echo $materialesTareasalbaranescliente['cantidad'];?></td>
			<td><?php echo $materialesTareasalbaranescliente['importe'];?></td>
			<td><?php echo $materialesTareasalbaranescliente['descuento'];?></td>
			<td><?php echo $materialesTareasalbaranescliente['precio_unidad'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View', true), array('controller' => 'materiales_tareasalbaranesclientes', 'action' => 'view', $materialesTareasalbaranescliente['id'])); ?>
				<?php echo $this->Html->link(__('Edit', true), array('controller' => 'materiales_tareasalbaranesclientes', 'action' => 'edit', $materialesTareasalbaranescliente['id'])); ?>
				<?php echo $this->Html->link(__('Delete', true), array('controller' => 'materiales_tareasalbaranesclientes', 'action' => 'delete', $materialesTareasalbaranescliente['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $materialesTareasalbaranescliente['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Materiales Tareasalbaranescliente', true), array('controller' => 'materiales_tareasalbaranesclientes', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php __('Related Manodeobras Tareasalbaranesclientes');?></h3>
	<?php if (!empty($tareasalbaranescliente['ManodeobrasTareasalbaranescliente'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Tareasalbaranescliente Id'); ?></th>
		<th><?php __('Horas'); ?></th>
		<th><?php __('Precio Hora'); ?></th>
		<th><?php __('Descuento'); ?></th>
		<th><?php __('Importe'); ?></th>
		<th><?php __('Descripcion'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($tareasalbaranescliente['ManodeobrasTareasalbaranescliente'] as $manodeobrasTareasalbaranescliente):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $manodeobrasTareasalbaranescliente['id'];?></td>
			<td><?php echo $manodeobrasTareasalbaranescliente['tareasalbaranescliente_id'];?></td>
			<td><?php echo $manodeobrasTareasalbaranescliente['horas'];?></td>
			<td><?php echo $manodeobrasTareasalbaranescliente['precio_hora'];?></td>
			<td><?php echo $manodeobrasTareasalbaranescliente['descuento'];?></td>
			<td><?php echo $manodeobrasTareasalbaranescliente['importe'];?></td>
			<td><?php echo $manodeobrasTareasalbaranescliente['descripcion'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View', true), array('controller' => 'manodeobras_tareasalbaranesclientes', 'action' => 'view', $manodeobrasTareasalbaranescliente['id'])); ?>
				<?php echo $this->Html->link(__('Edit', true), array('controller' => 'manodeobras_tareasalbaranesclientes', 'action' => 'edit', $manodeobrasTareasalbaranescliente['id'])); ?>
				<?php echo $this->Html->link(__('Delete', true), array('controller' => 'manodeobras_tareasalbaranesclientes', 'action' => 'delete', $manodeobrasTareasalbaranescliente['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $manodeobrasTareasalbaranescliente['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Manodeobras Tareasalbaranescliente', true), array('controller' => 'manodeobras_tareasalbaranesclientes', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
