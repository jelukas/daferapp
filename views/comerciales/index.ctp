<div class="comerciales index">
<h2><?php __('Comerciales');?></h2>
<?php
	echo $form->create('', array('action'=>'search'));
	echo $form->input('Buscar', array('type'=>'text'));
	echo $form->end('Buscar');
?>
<table cellpadding="0" cellspacing="0">
<tr>

	<th><?php echo $paginator->sort('Nombre');?></th>
	<th><?php echo $paginator->sort('Apellidos');?></th>
	<th><?php echo $paginator->sort('Teléfono');?></th>
	
	
	<th><?php echo $paginator->sort('Porcentaje comisión');?></th>
	
	<th class="actions"><?php __('Acciones');?></th>
</tr>
<?php
$i = 0;
foreach ($comerciales as $comerciale):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		
		<td>
			<?php echo $comerciale['Comerciale']['nombre']; ?>
		</td>
		<td>
			<?php echo $comerciale['Comerciale']['apellidos']; ?>
		</td>
		<td>
			<?php echo $comerciale['Comerciale']['telefono']; ?>
		</td>
		
		
		<td>
			<?php echo $comerciale['Comerciale']['porcentaje_comision']; ?>
		</td>
		
		<td class="actions">
			<?php echo $html->link(__('Ver', true), array('action' => 'view', $comerciale['Comerciale']['id'])); ?>
			<?php echo $html->link(__('Editar', true), array('action' => 'edit', $comerciale['Comerciale']['id'])); ?>
			<?php echo $html->link(__('Eliminar', true), array('action' => 'delete', $comerciale['Comerciale']['id']), null, sprintf(__('¿Desea eliminar el comercial %s?', true), $comerciale['Comerciale']['id'])); ?>
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
		<li><?php echo $html->link(__('Nuevo Comercial', true), array('action' => 'add')); ?></li>
		<li><?php echo $html->link(__('Listar Clientes', true), array('controller' => 'clientes', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('Nuevo Cliente', true), array('controller' => 'clientes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Generar Informe', true), array('action' => 'pdf')); ?> </li>
	</ul>
</div>
