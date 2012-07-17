<div class="pedidosclientes">
    <?php echo $this->Form->create('Pedidoscliente', array('type' => 'file')); ?>
    <fieldset>
        <legend>
            <?php __('Editar Pedido cliente Nº ' . $this->Form->value('Pedidoscliente.numero')); ?>
            <?php echo $this->Html->link(__('Ver', true), array('action' => 'view', $this->Form->value('Pedidoscliente.id')), array('class' => 'button_link')); ?>
            <?php echo $this->Html->link(__('Elminar', true), array('action' => 'delete', $this->Form->value('Pedidoscliente.id')), array('class' => 'button_link'), sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('Pedidoscliente.id'))); ?>
            <?php echo $this->Html->link(__('Listar Pedidos de Clientes', true), array('action' => 'index'), array('class' => 'button_link')); ?>
            <?php echo $this->Html->link(__('Nuevo Presupuesto a Proveedor', true), array('controller' => 'presupuestosproveedores', 'action' => 'add', $this->Form->value('Pedidoscliente.presupuestoscliente_id')),array('class' => 'button_link')); ?>
        </legend>
        <?php echo $this->Form->input('id'); ?>
        <table class="edit">
            <tr>
                <td><span><?php __('Número'); ?></span></td>
                <td><?php echo $this->Form->input('numero', array('label' => false)); ?></td>
                <td><span><?php __('Fecha'); ?></span></td>
                <td><?php echo $this->Form->input('fecha', array('label' => false)); ?></td>
            </tr>
            <tr>
                <td><span><?php __('Confirmado'); ?></span></td>
                <td><?php echo $this->Form->input('confirmado', array('label' => false)); ?></td>
                <td colspan="4"></td>
                <td><span><?php __('Nº Aceptación aportado por el cliente'); ?></span></td>
                <td><?php echo $this->Form->input('numero_aceptacion_aportado', array('label' => false)); ?></td>
            </tr>
            <tr>
                <td  colspan="6">
                    <?php
                    echo $this->Html->link(__('Pedido Escaneado Actual: ' . $this->Form->value('Pedidoscliente.pedidoescaneado'), true), '/files/pedidoscliente/' . $this->Form->value('Pedidoscliente.pedidoescaneado'));
                    echo $this->Form->input('remove_file', array('type' => 'checkbox', 'label' => 'Borrar Pedido Escaneado Actual', 'hiddenField' => false));
                    echo $this->Form->input('file', array('type' => 'file', 'label' => 'Pedido Escaneado'));
                    ?>
                </td>
                <td><span><?php __('Recepcion'); ?></span></td>
                <td><?php echo $this->Form->input('recepcion', array('label' => false)); ?></td>
            </tr>
            <tr>
                <td><span><?php __('Observaciones'); ?></span></td>
                <td  colspan="5"><?php echo $this->Form->input('observaciones', array('label' => false)); ?></td>
                <td><span><?php __('Plazo de Entrega'); ?></span></td>
                <td><?php echo $this->Form->input('fecha_plazo', array('label' => false)); ?></td>
            </tr>
        </table>
    </fieldset>
    <?php echo $this->Form->end(__('Guardar', true)); ?>
    <div class="actions">
        <ul>
            <li><?php echo $this->Html->link(__('Nuevo Presupuesto a Proveedor', true), array('controller' => 'presupuestosproveedores', 'action' => 'add', $this->Form->value('Pedidoscliente.presupuestoscliente_id'))); ?></li>
        </ul>
    </div>
</div>