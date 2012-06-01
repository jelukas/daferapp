<div class="centrostrabajos index">
	<h2><?php __('Centros de Trabajo');?></h2>
	<?php
	echo $form->create('', array('action'=>'search'));
	echo $form->input('Buscar', array('type'=>'text'));
	echo $form->end('Buscar');
	?>
	<table cellpadding="0" cellspacing="0">
	<tr>
			
			<th><?php echo $this->Paginator->sort('Centro de Trabajo');?></th>
			
			
			<th><?php echo $this->Paginator->sort('Cliente');?></th>
			
			<th class="actions"><?php __('Acciones');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($centrostrabajos as $centrostrabajo):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		
		<td><?php echo $centrostrabajo['Centrostrabajo']['centrotrabajo']; ?>&nbsp;</td>
		
		<td>
			<?php echo $this->Html->link($centrostrabajo['Cliente']['nombre'], array('controller' => 'clientes', 'action' => 'view', $centrostrabajo['Cliente']['id'])); ?>
		</td>
		
		<td class="actions">
			<?php echo $this->Html->link(__('Ver', true), array('action' => 'view', $centrostrabajo['Centrostrabajo']['id'])); ?>
			<?php echo $this->Html->link(__('Editar', true), array('action' => 'edit', $centrostrabajo['Centrostrabajo']['id'])); ?>
			<?php echo $this->Html->link(__('Eliminar', true), array('action' => 'delete', $centrostrabajo['Centrostrabajo']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $centrostrabajo['Centrostrabajo']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('Nuevo Centro Trabajo', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('Listar clientes', true), array('controller' => 'clientes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo cliente', true), array('controller' => 'clientes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Generar Informe', true), array('action' => 'pdf')); ?> </li>
	</ul>
</div>
