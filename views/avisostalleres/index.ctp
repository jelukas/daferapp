<div class="avisostalleres index">
	<h2><?php __('Avisos de Taller');?></h2>

		<?php
	echo $form->create('', array('action'=>'search'));
	echo $form->input('Buscar', array('type'=>'text'));
	echo $form->end('Buscar');
	?>
	<table cellpadding="0" cellspacing="0">
	<tr>
			
			<th><?php echo $this->Paginator->sort('Fecha de Aviso');?></th>
						
			<th><?php echo $this->Paginator->sort('Cliente');?></th>
			<th><?php echo $this->Paginator->sort('Maquina');?></th>
			<th><?php echo $this->Paginator->sort('Centro de Trabajo');?></th>
			
			<th><?php echo $this->Paginator->sort('Fecha de Aceptación');?></th>
			
			<th class="actions"><?php __('Acciones');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($avisostalleres as $avisostallere):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $avisostallere['Avisostallere']['fechaaviso']; ?>&nbsp;</td>
		
		<td>
			<?php echo $this->Html->link($avisostallere['Cliente']['nombre'], array('controller' => 'clientes', 'action' => 'view', $avisostallere['Cliente']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($avisostallere['Maquina']['nombre'], array('controller' => 'maquinas', 'action' => 'view', $avisostallere['Maquina']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($avisostallere['Centrostrabajo']['centrotrabajo'], array('controller' => 'centrostrabajos', 'action' => 'view', $avisostallere['Centrostrabajo']['id'])); ?>
		</td>
		
		<td><?php echo $avisostallere['Avisostallere']['fechaaceptacion']; ?>&nbsp;</td>
		
		<td class="actions">
                    <?php echo $this->Html->link(__('Ver', true), array('action' => 'view', $avisostallere['Avisostallere']['id'])); ?>
                    <?php echo $this->Html->link(__('Editar', true), array('action' => 'edit', $avisostallere['Avisostallere']['id'])); ?>
                    <?php echo $this->Html->link(__('Eliminar', true), array('action' => 'delete', $avisostallere['Avisostallere']['id']), null, sprintf(__('¿Está seguro que desea eliminar # %s?', true), $avisostallere['Avisostallere']['id'])); ?>
                    <?php echo $this->Html->link(__('Pdf', true), array('action' => 'pdf', $avisostallere['Avisostallere']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('Nuevo Aviso Taller', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('Listar Clientes', true), array('controller' => 'clientes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Cliente', true), array('controller' => 'clientes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Máquinas', true), array('controller' => 'maquinas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nueva Máquina', true), array('controller' => 'maquinas', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Centros Trabajo', true), array('controller' => 'centrostrabajos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Centro Trabajo', true), array('controller' => 'centrostrabajos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Artículos', true), array('controller' => 'articulos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Artículo', true), array('controller' => 'articulos', 'action' => 'add')); ?> </li>
	</ul>
</div>
