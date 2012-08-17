<div class="facturasClientes">
    <?php echo $this->Form->create('FacturasCliente', array('type' => 'file'), array('type' => 'file')); ?>
    <fieldset>
        <legend>
            <?php __('Editar Factura de Cliente'); ?>
            <?php echo $this->Html->link(__('Ver', true), array('action' => 'view', $this->Form->value('FacturasCliente.id')), array('class' => 'button_link')); ?>
            <?php echo $this->Html->link(__('Eliminar', true), array('action' => 'delete', $this->Form->value('FacturasCliente.id')), array('class' => 'button_link'), sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('FacturasCliente.id'))); ?>
        </legend>
        <table class="view edit">
            <tr>
                <td class="required"><span>Número</span></td>
                <td><?php echo $this->Form->input('numero', array('label' => False, 'readonly' => false)); ?></td>
                <td class="required"><span>Fecha</span></td>
                <td><?php echo $this->Form->input('fecha', array('label' => False)); ?></td>
                <td class="required"><span>Cliente</span></td>
                <td><?php echo $this->Form->input('cliente_id', array('label' => False, 'class' => 'chzn-select-required')); ?></td>
            </tr>
            <tr>
                <td colspan="4">
                    <?php
                    echo '<span>Factura Escaneada Actual:</span> ' .$this->Html->link(__($this->Form->value('FacturasCliente.facturaescaneada'), true), '/files/facturascliente/' . $this->Form->value('FacturasCliente.facturaescaneada'));
                    echo $this->Form->input('remove_file', array('type' => 'checkbox', 'label' => 'Borrar Factura Escaneada Actual', 'hiddenField' => false));
                    echo $this->Form->input('file', array('type' => 'file', 'label' => false));
                    ?>
                </td>
                <td class="required"><span>Estado</span></td>
                <td><?php echo $this->Form->input('estadosfacturascliente_id', array('label' => False)); ?></td>
            </tr>
            <tr>
                <td><span>Observaciones</span></td>
                <td  colspan="5"><?php echo $this->Form->input('observaciones', array('label' => False)); ?></td>
            </tr>
        </table>
    </fieldset>
    <?php echo $this->Form->end(__('Guardar', true)); ?>
</div>