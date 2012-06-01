<div class="transportistas index">
<h2><?php __('Transportistas');?></h2>
	<?php
	echo $form->create('', array('action'=>'search'));
	echo $form->input('Buscar', array('type'=>'text'));
	echo $form->end('Buscar');
	?>
<table cellpadding="0" cellspacing="0">
<tr>
	
	<th><?php echo $paginator->sort('nombre');?></th>
	<th><?php echo $paginator->sort('telefono');?></th>
	<th><?php echo $paginator->sort('codigocliente');?></th>
	
	<th class="actions"><?php __('Acciones');?></th>
</tr>
<?php
$i = 0;
foreach ($transportistas as $transportista):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $transportista['Transportista']['id']; ?>
		</td>
		<td>
			<?php echo $transportista['Transportista']['nombre']; ?>
		</td>
		<td>
			<?php echo $transportista['Transportista']['telefono']; ?>
		</td>
		<td>
			<?php echo $transportista['Transportista']['codigocliente']; ?>
		</td>
		<td>
			<?php echo $transportista['Transportista']['descripcion']; ?>
		</td>
		<td>
			<?php echo $transportista['Transportista']['observaciones']; ?>
		</td>
		<td class="actions">
			<?php echo $html->link(__('Ver', true), array('action' => 'view', $transportista['Transportista']['id'])); ?>
			<?php echo $html->link(__('Editar', true), array('action' => 'edit', $transportista['Transportista']['id'])); ?>
			<?php echo $html->link(__('Eliminar', true), array('action' => 'delete', $transportista['Transportista']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $transportista['Transportista']['id'])); ?>
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
	<ul>
		<li><?php echo $html->link(__('Nuevo Transportista', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('Generar Informe', true), array('action' => 'pdf')); ?> </li>
	</ul>
</div>
