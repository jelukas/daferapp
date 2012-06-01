<div class="restricciones index">
	<h2><?php __('Restricciones');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('Id');?></th>
			<th><?php echo $this->Paginator->sort('Rol');?></th>
			<th><?php echo $this->Paginator->sort('Modelo');?></th>
			<th><?php echo $this->Paginator->sort('Acción');?></th>
			<th class="actions"><?php __('Acciones');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($restricciones as $restriccione):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $restriccione['Restriccione']['id']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($restriccione['Role']['nombre'], array('controller' => 'roles', 'action' => 'view', $restriccione['Role']['id'])); ?>
		</td>
		<td><?php echo $restriccione['Restriccione']['modelo']; ?>&nbsp;</td>
		<td><?php switch($restriccione['Restriccione']['accion'])
			  {
				case 'add':
					echo "Añadir";
					break;
				case 'edit':
					echo "Editar";
					break;
				case 'delete':
					echo "Eliminar";
					break;
				case 'index':
					echo "Listar";
					break;
				case 'view':
					echo "Ver";
					break;
			  }
		     ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Ver', true), array('action' => 'view', $restriccione['Restriccione']['id'])); ?>
			<?php echo $this->Html->link(__('Editar', true), array('action' => 'edit', $restriccione['Restriccione']['id'])); ?>
			<?php echo $this->Html->link(__('Eliminar', true), array('action' => 'delete', $restriccione['Restriccione']['id']), null, sprintf(__('¿Desea eliminar la restricción %s?', true), $restriccione['Restriccione']['id'])); ?>
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
		<?php echo $this->Paginator->prev('<< ' . __('Anterior', true), array(), null, array('class'=>'disabled'));?>
	 | 	<?php echo $this->Paginator->numbers();?>
 |
		<?php echo $this->Paginator->next(__('Siguiente', true) . ' >>', array(), null, array('class' => 'disabled'));?>
	</div>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Nueva Restricción', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('Listar Roles', true), array('controller' => 'roles', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Rol', true), array('controller' => 'roles', 'action' => 'add')); ?> </li>
	</ul>
</div>
