<div class="articulosReferenciasintercambiables index">
	<h2><?php __('Articulos Referenciasintercambiables');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('articulo_id');?></th>
			<th><?php echo $this->Paginator->sort('referenciasintercambiable_id');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($articulosReferenciasintercambiables as $articulosReferenciasintercambiable):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $this->Html->link($articulosReferenciasintercambiable['Articulo']['nombre'], array('controller' => 'articulos', 'action' => 'view', $articulosReferenciasintercambiable['Articulo']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($articulosReferenciasintercambiable['Referenciasintercambiable']['id'], array('controller' => 'referenciasintercambiables', 'action' => 'view', $articulosReferenciasintercambiable['Referenciasintercambiable']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $articulosReferenciasintercambiable['ArticulosReferenciasintercambiable']['articulo_id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $articulosReferenciasintercambiable['ArticulosReferenciasintercambiable']['articulo_id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $articulosReferenciasintercambiable['ArticulosReferenciasintercambiable']['articulo_id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $articulosReferenciasintercambiable['ArticulosReferenciasintercambiable']['articulo_id'])); ?>
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
		<?php echo $this->Paginator->prev('<< ' . __('previous', true), array(), null, array('class'=>'disabled'));?>
	 | 	<?php echo $this->Paginator->numbers();?>
 |
		<?php echo $this->Paginator->next(__('next', true) . ' >>', array(), null, array('class' => 'disabled'));?>
	</div>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Articulos Referenciasintercambiable', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Articulos', true), array('controller' => 'articulos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Articulo', true), array('controller' => 'articulos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Referenciasintercambiables', true), array('controller' => 'referenciasintercambiables', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Referenciasintercambiable', true), array('controller' => 'referenciasintercambiables', 'action' => 'add')); ?> </li>
	</ul>
</div>