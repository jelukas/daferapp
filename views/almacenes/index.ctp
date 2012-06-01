<div class="almacenes index">
<h2><?php __('Maestro de Almacenes');?></h2>
<p>
<?php
	echo $form->create('', array('action'=>'search'));
	echo $form->input('Buscar', array('type'=>'text'));
	echo $form->end('Buscar');
	?>
<table cellpadding="0" cellspacing="0">
<tr>
	
	<th><?php echo $paginator->sort('Nombre');?></th>
	<th><?php echo $paginator->sort('Dirección');?></th>
	<th><?php echo $paginator->sort('Teléfono');?></th>
	<th class="actions"><?php __('Acciones');?></th>
</tr>
<?php
$i = 0;
foreach ($almacenes as $almacene):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		
		<td>
			<?php echo $almacene['Almacene']['nombre']; ?>
		</td>
		<td>
			<?php echo $almacene['Almacene']['direccion']; ?>
		</td>
		<td>
			<?php echo $almacene['Almacene']['telefono']; ?>
		</td>
		<td class="actions">
			<?php echo $html->link(__('Editar', true), array('action' => 'edit', $almacene['Almacene']['id'])); ?>
			<?php echo $html->link(__('Eliminar', true), array('action' => 'delete', $almacene['Almacene']['id']), null, sprintf(__('¿Desea borrar el almacén %s?', true), $almacene['Almacene']['id'])); ?>
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
	<?php echo $paginator->prev('<< '.__('Anterior', true), array(), null, array('class'=>'disabled'));?>
 | 	<?php echo $paginator->numbers();?>
	<?php echo $paginator->next(__('Siguiente', true).' >>', array(), null, array('class' => 'disabled'));?>
</div>
</div>
<div class="actions">
	<h3><?php __('Acciones'); ?></h3>
	<ul>
		<li><?php echo $html->link(__('Nuevo Almacén', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('Generar Informe', true), array('action' => 'pdf')); ?> </li>
	</ul>
</div>
