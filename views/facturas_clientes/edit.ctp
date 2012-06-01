<div class="facturasClientes form">
    <?php echo $this->Form->create('FacturasCliente', array('type' => 'file')); ?>
    <fieldset>
        <legend><?php __('Editar Factura de Cliente'); ?><?php echo $this->Html->link(__('Ver', true), array('action' => 'view', $this->Form->value('FacturasCliente.id')), null); ?></legend>
        <?php
        echo $this->Form->input('id');
        echo $this->Form->input('numero', array('label' => 'Numero'));
        echo $this->Form->input('fecha', array('label' => 'Fecha'));
        echo $this->Form->input('cobrado', array('label' => 'Fecha de Cobro'));
        echo $this->Form->input('observaciones', array('label' => 'Observaciones'));
        echo $this->Form->input('file', array('type' => 'file', 'label' => 'Factura Escaneada'));
        ?>
    </fieldset>
    <?php echo $this->Form->end(__('Guardar', true)); ?>
</div>
<div class="actions">
    <h3><?php __('Acciones'); ?></h3>
    <ul>
        <li><?php echo $this->Html->link(__('Eliminar', true), array('action' => 'delete', $this->Form->value('FacturasCliente.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('FacturasCliente.id'))); ?></li>
    </ul>
</div>
