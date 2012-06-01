<div class="pedidosclientes index">
	<h2><?php __('Pedidos cliente');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('fecha_plazo');?></th>
			<th><?php echo $this->Paginator->sort('confirmado');?></th>
			<th><?php echo $this->Paginator->sort('presupuestoscliente_id');?></th>
			<th><?php echo $this->Paginator->sort('recepcion');?></th>
			<th><?php echo $this->Paginator->sort('pedidoescaneado');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($pedidosclientes as $pedidoscliente):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $pedidoscliente['Pedidoscliente']['id']; ?>&nbsp;</td>
		<td><?php echo $pedidoscliente['Pedidoscliente']['fecha_plazo']; ?>&nbsp;</td>
		<td><?php echo $pedidoscliente['Pedidoscliente']['confirmado']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($pedidoscliente['Presupuestoscliente']['id'], array('controller' => 'presupuestosclientes', 'action' => 'view', $pedidoscliente['Presupuestoscliente']['id'])); ?>
		</td>
		<td><?php echo $pedidoscliente['Pedidoscliente']['recepcion']; ?>&nbsp;</td>
		<td><?php echo $this->Html->link($pedidoscliente['Pedidoscliente']['pedidoescaneado'],array('action' => 'downloadFile', $pedidoscliente['Pedidoscliente']['id'])) ?>&nbsp;</td>
		
		<td class="actions">
			<?php echo $this->Html->link(__('Ver', true), array('action' => 'view', $pedidoscliente['Pedidoscliente']['id'])); ?>
			<?php echo $this->Html->link(__('Editar', true), array('action' => 'edit', $pedidoscliente['Pedidoscliente']['id'])); ?>
			<?php echo $this->Html->link(__('Eliminar', true), array('action' => 'delete', $pedidoscliente['Pedidoscliente']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $pedidoscliente['Pedidoscliente']['id'])); ?>
                        <?php echo $this->Html->link(__('Pdf', true), array('action' => 'pdf', $pedidoscliente['Pedidoscliente']['id'])); ?>
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
	<h3><?php __('Acciones'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Listar Presupuestos Cliente', true), array('controller' => 'presupuestos_clientes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Avisos de repuestos', true), array('controller' => 'avisosrepuestos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Aviso de repuesto', true), array('controller' => 'avisosrepuestos', 'action' => 'add')); ?> </li>
                <li><?php echo $this->Html->link(__('Listar Avisos de taller', true), array('controller' => 'avisostalleres', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Aviso de taller', true), array('controller' => 'avisostalleres', 'action' => 'add')); ?> </li>
	</ul>
        <?php echo $this->Form->create('Pedidoscliente', array('type' => 'get', 'action' => 'index')); ?>
        <fieldset>
            <legend><?php __('Buscar') ?></legend>
            <?php
            echo $this->Form->input('Cliente', array('label' => 'Cliente','name' => 'cliente_id', 'empty' => '- Seleccione Cliente -', 'style' => 'width: 220px;'));
            
            echo $this->Form->label('Fecha de Plazo ');
            echo $this->Form->label('Desde:');
            echo $this->Form->day('day_pedido_f', isset($this->params['url']['day_pedido_f']) ? $this->params['url']['day_pedido_f'] : 1, array('name' => 'day_pedido_f', 'empty' => false));
            echo $this->Form->month('month_pedido_f', isset($this->params['url']['month_pedido_f']) ? $this->params['url']['month_pedido_f'] : 1, array('name' => 'month_pedido_f', 'empty' => false));
            echo $this->Form->year('year_pedido_f', date('Y') - 5, date('Y'), isset($this->params['url']['year_pedido_f']) ? $this->params['url']['year_pedido_f'] : date('Y') - 5, array('name' => 'year_pedido_f', 'empty' => false));
            echo $this->Form->label('Hasta:');
            echo $this->Form->day('day_pedido_t', isset($this->params['url']['day_pedido_t']) ? $this->params['url']['day_pedido_t'] : date('D'), array('name' => 'day_pedido_t', 'empty' => false));
            echo $this->Form->month('month_pedido_t', isset($this->params['url']['month_pedido_t']) ? $this->params['url']['month_pedido_t'] : date('m'), array('name' => 'month_pedido_t', 'empty' => false));
            echo $this->Form->year('year_pedido_t', date('Y') - 5, date('Y'), isset($this->params['url']['year_pedido_t']) ? $this->params['url']['year_pedido_t'] : date('Y'), array('name' => 'year_pedido_t', 'empty' => false));

            ?>
            <?php echo $this->Form->submit('Ver informe PDF', array('name' => 'pdf')); ?>
            <?php echo $this->Form->end(__('Buscar', true)); ?>
        </fieldset>
</div>