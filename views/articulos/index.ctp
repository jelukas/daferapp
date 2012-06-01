<div class="articulos index">
	<h2><?php __('Maestro de Artículos');?></h2>
	<?php
	echo $form->create('', array('action'=>'search'));
	echo $form->input('Buscar', array('type'=>'text'));
	echo $form->end('Buscar');
	?>
   		


	<table cellpadding="0" cellspacing="0">
	<tr>

                        <th><?php echo $paginator->sort('Referencia');?></th>
                        <th><?php echo $paginator->sort('Nombre');?></th>
                        <th><?php echo $paginator->sort('Código barras');?></th>
                        <th><?php echo $paginator->sort('PVP (sin IVA)');?></th>
                        <th><?php echo $paginator->sort('Familia');?></th>
			
                        <th class="actions"><?php __('Acciones');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($articulos as $articulo):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>

		<td><?php echo $articulo['Articulo']['ref']; ?>&nbsp;</td>
		<td><?php echo $articulo['Articulo']['nombre']; ?>&nbsp;</td>
		<td><?php echo $articulo['Articulo']['codigobarras']; ?>&nbsp;</td>
		
		
		<td><?php echo $articulo['Articulo']['precio_sin_iva']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($articulo['Familia']['nombre'], array('controller' => 'familias', 'action' => 'view', $articulo['Familia']['id'])); ?>
		</td>

		<td class="actions">
			<?php echo $this->Html->link(__('Ver', true), array('action' => 'view', $articulo['Articulo']['id'])); ?>
			<?php echo $this->Html->link(__('Editar', true), array('action' => 'edit', $articulo['Articulo']['id'])); ?>
			<?php echo $this->Html->link(__('Eliminar', true), array('action' => 'delete', $articulo['Articulo']['id']), null, sprintf(__('¿Desea borrar el artículo %s?', true), $articulo['Articulo']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Página %page% de %pages%, mostrando %current% registros de un total de %count%, empezando en registro %start%, finalizando en el registro %end%', true)
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
	<h3><?php __('Acciones'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Nuevo Artículo', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('Listar Familias', true), array('controller' => 'familias', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nueva Familia', true), array('controller' => 'familias', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Almacenes', true), array('controller' => 'almacenes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Almacén', true), array('controller' => 'almacenes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Ref. Intercambiables', true), array('controller' => 'referenciasintercambiables', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nueva Ref. Intercambiable', true), array('controller' => 'referenciasintercambiables', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Generar Informe', true), array('action' => 'pdf')); ?> </li>		
	</ul>
</div>
