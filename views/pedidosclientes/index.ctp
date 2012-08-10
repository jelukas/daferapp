<div class="pedidosclientes">
    <h2>
        <?php __('Pedidos cliente'); ?>
        <?php echo $this->Html->link(__('Listar Pedidos de Clientes', true), array('action' => 'index'), array('class' => 'button_link')); ?> 
        <?php echo $this->Html->link(__('Imprimir', true), 'javascript:window.print(); void 0;', array('class' => 'button_link')); ?> 
    </h2>

    <?php echo $this->Form->create('Pedidoscliente', array('type' => 'get', 'action' => 'index')); ?>
    <?php echo $this->Form->input('buscar', array('type' => 'text')); ?>
    <?php echo $this->Form->end(__('Buscar', true)); ?>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <td colspan="9"></td>
            <th colspan="5">Presupuesto a Cliente</th>
        </tr>
        <tr>
            <th><?php echo $this->Paginator->sort('Nº Pedido', 'numero'); ?></th>
            <th><?php echo $this->Paginator->sort('Cliente', 'Presupuestoscliente.cliente_id'); ?></th>
            <th><?php echo $this->Paginator->sort('fecha'); ?></th>
            <th><?php echo $this->Paginator->sort('Estado','estadospedidoscliente_id'); ?></th>
            <th><?php echo $this->Paginator->sort('observaciones'); ?></th>
            <th><?php echo $this->Paginator->sort('precio_mat'); ?></th>
            <th><?php echo $this->Paginator->sort('precio_obra'); ?></th>
            <th><?php echo $this->Paginator->sort('Precio Sin Impuestos','precio'); ?></th>
            <th><?php echo $this->Paginator->sort('impuestos'); ?></th>	
            <th><?php echo $this->Paginator->sort('Presupuesto Cliente.', 'Presupuestoscliente.numero'); ?></th>	
            <th><?php echo $this->Paginator->sort('Aviso Repuesto', 'Presupuestoscliente.Avisosrepuesto.numero'); ?></th>	
            <th><?php echo $this->Paginator->sort('Aviso Taller', 'Presupuestoscliente.Avisostallere.numero'); ?></th>	
            <th><?php echo $this->Paginator->sort('Orden', 'Presupuestoscliente.Ordene.numero'); ?></th>	
            <th><?php echo $this->Paginator->sort('Presupuesto Prov.', 'Presupuestoscliente.Presupuestosproveedore.numero'); ?></th>	
            <th class="actions"><?php __('Acciones'); ?></th>
        </tr>
        <?php
        $i = 0;
        foreach ($pedidosclientes as $pedidoscliente):
            $class = null;
            if ($i++ % 2 == 0) {
                $class = ' class="altrow"';
            }
            ?>
            <tr<?php echo $class; ?>>
                <td><?php echo $pedidoscliente['Pedidoscliente']['numero']; ?>&nbsp;</td>
                <td><?php echo @$this->Html->link($pedidoscliente['Presupuestoscliente']['Cliente']['nombre'],array('controller' => 'clientes','action' => 'view',$pedidoscliente['Presupuestoscliente']['Cliente']['id'])); ?>&nbsp;</td>
                <td style="width: 100px;"><?php echo $this->Time->format('d-m-Y', $pedidoscliente['Pedidoscliente']['fecha']); ?>&nbsp;</td>
                <td><?php echo $pedidoscliente['Estadospedidoscliente']['estado']; ?>&nbsp;</td>
                <td><?php echo $pedidoscliente['Pedidoscliente']['observaciones']; ?>&nbsp;</td>
                <td><?php echo $pedidoscliente['Pedidoscliente']['precio_mat']; ?>&nbsp;</td>
                <td><?php echo $pedidoscliente['Pedidoscliente']['precio_obra']; ?>&nbsp;</td>
                <td><?php echo $pedidoscliente['Pedidoscliente']['precio']; ?>&nbsp;</td>
                <td><?php echo $pedidoscliente['Pedidoscliente']['impuestos']; ?>&nbsp;</td>
                <td><?php echo $this->Html->link($pedidoscliente['Presupuestoscliente']['numero'], array('controller' => 'presupuestosclientes', 'action' => 'view', $pedidoscliente['Presupuestoscliente']['id'])); ?>&nbsp;</td>
                <td><?php echo @$this->Html->link($pedidoscliente['Presupuestoscliente']['Avisosrepuesto']['numero'], array('controller' => 'avisosrepuestos', 'action' => 'view', $pedidoscliente['Presupuestoscliente']['Avisosrepuesto']['id'])); ?>&nbsp;</td>
                <td><?php echo @$this->Html->link($pedidoscliente['Presupuestoscliente']['Avisostallere']['numero'], array('controller' => 'avisostalleres', 'action' => 'view', $pedidoscliente['Presupuestoscliente']['Avisostallere']['id'])); ?>&nbsp;</td>
                <td><?php echo @$this->Html->link($pedidoscliente['Presupuestoscliente']['Ordene']['numero'], array('controller' => 'ordenes', 'action' => 'view', $pedidoscliente['Presupuestoscliente']['Ordene']['id'])); ?>&nbsp;</td>
                <td><?php echo @$this->Html->link($pedidoscliente['Presupuestoscliente']['Presupuestosproveedore']['numero'], array('controller' => 'presupuestosproveedores', 'action' => 'view', $pedidoscliente['Presupuestoscliente']['Presupuestosproveedore']['id'])); ?>&nbsp;</td>
                <td class="actions">
                    <?php echo $this->Html->link(__('Ver', true), array('action' => 'view', $pedidoscliente['Pedidoscliente']['id'])); ?>
                    <?php echo $this->Html->link(__('Eliminar', true), array('action' => 'delete', $pedidoscliente['Pedidoscliente']['id']),null, sprintf(__('Seguro que deseas borrar el pedido # %s?', true), $pedidoscliente['Pedidoscliente']['numero'])); ?> 
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
    <p>
        <?php
        echo $this->Paginator->counter(array(
            'format' => __('Página %page% de %pages%, mostrando %current% filas de %count% total, starting on record %start%, finalizando en %end%', true)
        ));
        ?>	
    </p>

    <div class="paging">
        <?php echo $this->Paginator->prev('<< ' . __('Anterior', true), array(), null, array('class' => 'disabled')); ?>
        | 	<?php echo $this->Paginator->numbers(); ?>
        |
        <?php echo $this->Paginator->next(__('Siguiente', true) . ' >>', array(), null, array('class' => 'disabled')); ?>
    </div>
</div>