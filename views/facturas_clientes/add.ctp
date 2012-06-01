<div class="facturasClientes form">
    <?php echo $this->Form->create('FacturasCliente', array('type' => 'file')); ?>
    <fieldset>
        <legend><?php __('Añadir Factura de Cliente'); ?></legend>
        <?php
        echo $this->Form->input('cliente_id', array('label' => 'Cliente'));
        echo $this->Form->input('numero', array('label' => 'Numero'));
        echo $this->Form->input('fecha', array('label' => 'Fecha'));
        echo $this->Form->input('cobrado', array('label' => 'Fecha de Cobro'));
        echo $this->Form->input('observaciones', array('label' => 'Observaciones'));
        echo $this->Form->input('file', array('type' => 'file', 'label' => 'Factura Escaneada'));
        ?>
    </fieldset>
    <?php echo $this->Form->end(__('Añadir', true)); ?>
</div>
<div class="actions">
    <h3><?php __('Acciones'); ?></h3>
    <ul>
        <li><?php echo $this->Html->link(__('Listar Facturas de Clientes', true), array('action' => 'index')); ?></li>
        <li><?php echo $this->Html->link(__('Listar Clientes', true), array('controller' => 'clientes', 'action' => 'index')); ?> </li>
    </ul>
</div>