<div class="facturasproveedores">
    <?php echo $this->Form->create('Facturasproveedore', array('type' => 'file')); ?>
    <fieldset>
        <legend>
            <?php __('Editar Factura de proveedor'); ?>
            <?php echo $this->Html->link(__('Ver', true), array('action' => 'view', $this->Form->value('Facturasproveedore.id')), array('class' => 'button_link')); ?>
            <?php echo $this->Html->link(__('Listar', true), array('action' => 'index'), array('class' => 'button_link')); ?>
            <?php echo $this->Html->link(__('Eliminar Factura de proveedor', true), array('action' => 'delete', $this->Form->value('Facturasproveedore.id')), array('class' => 'button_link'), sprintf(__('Are you sure you want to delete Nº %s?', true), $this->Form->value('Facturasproveedore.numero'))); ?>

        </legend>
        <table class="view">
            <tr>
                <td colspan="3">
                    <?php echo $this->Form->input('id'); ?>
                    <?php echo $this->Form->input('numero', array('readonly' => true)); ?>
                </td>
                <td>
                    <?php echo $this->Form->input('estadosfacturasproveedore_id', array('label'=>'Estado')); ?>
                </td>
            </tr>
            <tr>
                <td>
                    <span>Proveedor</span>
                    <?php echo $this->Form->value('Proveedore.nombre'); ?>
                </td>
                <td>
                    <?php echo $this->Form->input('fechafactura', array('label' => 'Fecha')); ?>
                </td>
                <td>
                    <?php echo $this->Form->input('fechapagada', array('label' => 'Fecha de pago','empty' => '--')); ?>
                </td>
                <td>
                    <?php echo $this->Form->input('fechalimitepago', array('label' => 'Feche Límite de pago','empty' => '--')); ?>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <?php echo $this->Form->input('baseimponible', array('label' => 'Base Imponible', 'readonly' => true)); ?>
                </td>
                <td colspan="2">
                    <?php echo $this->Form->input('tiposiva_id', array('label' => 'Tipo de IVA')); ?>
                </td>
            </tr>
            <tr>
                <td colspan="4">
                    <?php echo $this->Form->input('observaciones', array('label' => 'Observaciones')); ?>
                </td>
            </tr>
            <tr>
                <td colspan="4">
                    Factura escaneada Actual: <?php echo $this->Html->link(__($this->Form->value('Facturasproveedore.facturaescaneada'), true), '/files/facturasproveedore/' . $this->Form->value('Facturasproveedore.facturaescaneada')); ?>
                    <?php echo $this->Form->input('remove_file', array('type' => 'checkbox', 'label' => 'Borrar Documento Escaneado Actual', 'hiddenField' => false)); ?>
                    <?php echo $this->Form->input('file', array('type' => 'file', 'label' => 'Factura escaneada')); ?>
                </td>
            </tr>
        </table>
    </fieldset>
    <?php echo $this->Form->end(__('Guardar', true)); ?>
</div>
