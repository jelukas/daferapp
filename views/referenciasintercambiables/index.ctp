<div class="referenciasintercambiables index">
	<h2><?php __('Referencias Intercambiables');?></h2>

	<?php
	echo $form->create('', array('action'=>'search'));
	echo $form->input('Buscar', array('type'=>'text'));
	echo $form->end('Buscar');
	?>

	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('articulo_id');?></th>
			<th class="actions"><?php __('Acciones');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($referenciasintercambiables as $referenciasintercambiable):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $referenciasintercambiable['Referenciasintercambiable']['id']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($referenciasintercambiable['Articulo']['nombre'], array('controller' => 'articulos', 'action' => 'view', $referenciasintercambiable['Articulo']['id'])); ?>
		</td>
		<td class="actions">
			
			<?php echo $this->Html->link(__('Editar', true), array('action' => 'edit', $referenciasintercambiable['Referenciasintercambiable']['id'])); ?>
			<?php echo $this->Html->link(__('Eliminar', true), array('action' => 'delete', $referenciasintercambiable['Referenciasintercambiable']['id']), null, sprintf(__('¿Está seguro que quiere eliminar # %s?', true), $referenciasintercambiable['Referenciasintercambiable']['id'])); ?>
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
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Nueva Ref. Intercambiable', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('Listar Artículos', true), array('controller' => 'articulos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Artículo', true), array('controller' => 'articulos', 'action' => 'add')); ?> </li>
	</ul>
</div>
