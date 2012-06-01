<div class="familias view">
<h2><?php  __('Ficha de Familia');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('ID'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $familia['Familia']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Nombre'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $familia['Familia']['nombre']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Descripción'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $familia['Familia']['descripcion']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Acciones'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Editar Familia', true), array('action' => 'edit', $familia['Familia']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Eliminar Familia', true), array('action' => 'delete', $familia['Familia']['id']), null, sprintf(__('¿Desea borrar la família %s?', true), $familia['Familia']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Familias', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nueva Familia', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Artículos', true), array('controller' => 'articulos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Artículo', true), array('controller' => 'articulos', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php __('Articulos relacionados');?></h3>
	<?php if (!empty($familia['Articulo'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>

		<th><?php __('Ref'); ?></th>
		<th><?php __('Nombre'); ?></th>
		<th><?php __('Código barras'); ?></th>

		<th><?php __('PVP (sin IVA)'); ?></th>
		<th><?php __('Familia'); ?></th>
		<th class="actions"><?php __('Acciones');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($familia['Articulo'] as $articulo):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>

			<td><?php echo $articulo['ref'];?></td>
			<td><?php echo $articulo['nombre'];?></td>
			<td><?php echo $articulo['codigobarras'];?></td>

			<td><?php echo $articulo['precio_sin_iva'];?></td>
			<td><?php echo $articulo['familia_id'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('Ver', true), array('controller' => 'articulos', 'action' => 'view', $articulo['id'])); ?>
				<?php echo $this->Html->link(__('Editar', true), array('controller' => 'articulos', 'action' => 'edit', $articulo['id'])); ?>
				<?php echo $this->Html->link(__('Eliminar', true), array('controller' => 'articulos', 'action' => 'delete', $articulo['id']), null, sprintf(__('¿Está seguro que quiere eliminar # %s?', true), $articulo['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('Nuevo Artículo', true), array('controller' => 'articulos', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
