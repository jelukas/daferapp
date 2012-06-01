<div class="pedidosclientes form">
    <?php echo $this->Form->create('Pedidoscliente', array('type' => 'file')); ?>
    <fieldset>
        <legend><?php __('Editar Pedido cliente'); ?></legend>
        <?php
        echo $this->Form->input('id');
        echo $this->Form->input('fecha_plazo');
        echo $this->Form->input('confirmado');
        echo $this->Form->input('presupuestoscliente_id', array('type' => 'text', 'readonly' => true));
        echo $this->Form->input('recepcion');
        echo $this->Html->link(__('Pedido Escaneado Actual: ' . $this->Form->value('Pedidoscliente.pedidoescaneado'), true), '/files/pedidoscliente/' . $this->Form->value('Pedidoscliente.pedidoescaneado'));
        echo $this->Form->input('remove_file', array('type' => 'checkbox', 'label' => 'Borrar Pedido Escaneado Actual', 'hiddenField' => false));
        echo $this->Form->input('file', array('type' => 'file', 'label' => 'Pedido Escaneado'));
        ?>
    </fieldset>
    <?php echo $this->Form->end(__('Guardar', true)); ?>
    <div class="actions">
        <ul>
            <li><?php echo $this->Html->link(__('Nuevo Presupuesto a Proveedor', true), array('controller' => 'presupuestosproveedores', 'action' => 'add', $this->Form->value('Pedidoscliente.presupuestoscliente_id'))); ?></li>
        </ul>
    </div>
</div>
<div class="actions">
    <h3><?php __('Actions'); ?></h3>
    <ul>
        <li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('Pedidoscliente.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('Pedidoscliente.id'))); ?></li>
        <li><?php echo $this->Html->link(__('List Pedidosclientes', true), array('action' => 'index')); ?></li>
        <li><?php echo $this->Html->link(__('View Pedidosclientes', true), array('action' => 'view',$this->Form->value('Pedidoscliente.id'))); ?></li>
    </ul>
</div>