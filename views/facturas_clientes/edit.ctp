<div class="facturasClientes">
    <?php echo $this->Form->create('FacturasCliente', array('type' => 'file'), array('type' => 'file')); ?>
    <fieldset>
        <legend>
            <?php __('Editar Factura de Cliente'); ?>
            <?php echo $this->Html->link(__('Ver', true), array('action' => 'view', $this->Form->value('FacturasCliente.id')), array('class' => 'button_link')); ?>
            <?php echo $this->Html->link(__('Eliminar', true), array('action' => 'delete', $this->Form->value('FacturasCliente.id')), array('class' => 'button_link'), sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('FacturasCliente.id'))); ?>
        </legend>
        <?php
        echo $this->Form->input('numero', array('label' => 'Numero','readonly'=>true));
        echo $this->Form->input('fecha', array('label' => 'Fecha'));
        echo $this->Form->input('cobrado', array('label' => 'Fecha de Cobro'));
        echo $this->Form->input('observaciones', array('label' => 'Observaciones'));
        echo $this->Html->link(__('Factura Escaneada Actual: '.$this->Form->value('FacturasCliente.facturaescaneada'), true),'/files/facturascliente/'.$this->Form->value('FacturasCliente.facturaescaneada'));
        echo $this->Form->input('remove_file', array('type' => 'checkbox', 'label' => 'Borrar Factura Escaneada Actual','hiddenField'=>false));
        echo $this->Form->input('file', array('type' => 'file', 'label' => 'Factura Escaneada'));
        ?>
    </fieldset>
    <?php echo $this->Form->end(__('Guardar', true)); ?>
</div>