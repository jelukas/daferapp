<div class="mecanicos index">
	<h2><?php __('Mecánicos');?></h2>

	<?php
	echo $form->create('', array('action'=>'search'));
	echo $form->input('Buscar', array('type'=>'text'));
	echo $form->end('Buscar');
	?>
	<table cellpadding="0" cellspacing="0">
	<tr>
			
			<th><?php echo $this->Paginator->sort('DNI');?></th>
			<th><?php echo $this->Paginator->sort('Nombre');?></th>
			<th><?php echo $this->Paginator->sort('Coste Hora');?></th>
			<th><?php echo $this->Paginator->sort('Coste Hora Extra');?></th>
			
			<th class="actions"><?php __('Acciones');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($mecanicos as $mecanico):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		
		<td><?php echo $mecanico['Mecanico']['dni']; ?>&nbsp;</td>
		<td><?php echo $mecanico['Mecanico']['nombre']; ?>&nbsp;</td>
		<td><?php echo $mecanico['Mecanico']['costehora']; ?>&nbsp;</td>
		<td><?php echo $mecanico['Mecanico']['costehoraextra']; ?>&nbsp;</td>
		
		<td class="actions">
			<?php echo $this->Html->link(__('Ver', true), array('action' => 'view', $mecanico['Mecanico']['id'])); ?>
			<?php echo $this->Html->link(__('Editar', true), array('action' => 'edit', $mecanico['Mecanico']['id'])); ?>
			<?php echo $this->Html->link(__('Eliminar', true), array('action' => 'delete', $mecanico['Mecanico']['id']), null, sprintf(__('¿Está seguro que desea eliminar # %s?', true), $mecanico['Mecanico']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('Nuevo Mecánico', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('Generar Informe', true), array('action' => 'pdf')); ?> </li>
	</ul>
</div>
