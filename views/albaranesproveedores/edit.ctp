<div class="albaranesproveedores">
    <?php echo $this->Form->create('Albaranesproveedore', array('type' => 'file')); ?>
    <fieldset>
        <legend>
            <?php __('Editar Albaran de proveedor Nº ' . $this->Form->value('Albaranesproveedore.numero')); ?>
            <?php echo $this->Html->link(__('Ver', true), array('action' => 'view', $this->Form->value('Albaranesproveedore.id')), array('class' => 'button_link')); ?>
            <?php echo $this->Html->link(__('Listar', true), array('action' => 'index'), array('class' => 'button_link')); ?>
            <?php echo $this->Html->link(__('Eliminar Albarán de proveedores', true), array('action' => 'delete', $this->Form->value('Albaranesproveedore.id')), array('class' => 'button_link'), sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('Albaranesproveedore.numero'))); ?>
        </legend>
        <table class="view">
            <tr>
                <td colspan="4">
                    <?php echo $this->Form->input('id'); ?>
                    <?php echo $this->Form->input('numero', array('readonly' => true)); ?>
                </td>
            </tr>
            <tr>
                <td>
                    <label><?php echo $this->Html->link('Pedido a Proveedor - ' . $this->Form->value('Albaranesproveedore.pedidosproveedore_id'), array('controller' => 'pedidosproveedores', 'action' => 'view', $this->Form->value('Albaranesproveedore.pedidosproveedore_id'))); ?></label>
                    <?php echo $this->Form->input('pedidosproveedore_id', array('type' => 'hidden')); ?>
                </td>
                <td>
                    <?php echo $this->Form->input('fecha', array('label' => 'Fecha')); ?>
                </td>
                <td>
                    <?php echo $this->Form->input('confirmado', array('label' => 'Confirmado')); ?>
                </td>
            </tr>
            <tr>
                <td colspan="4">
                    <?php echo $this->Form->input('observaciones', array('label' => 'Observaciones')); ?>
                </td>
            </tr>
            <tr>
                <td colspan="4">
                    Albarán escaneado Actual: <?php echo $this->Html->link(__($this->Form->value('Albaranesproveedore.albaranescaneado'), true), '/files/albaranesproveedore/' . $this->Form->value('Albaranesproveedore.albaranescaneado')); ?>
                    <?php echo $this->Form->input('remove_file', array('type' => 'checkbox', 'label' => 'Borrar Documento Escaneado Actual', 'hiddenField' => false)); ?>
                    <?php echo $this->Form->input('file', array('type' => 'file', 'label' => 'Albarán escaneado')); ?>
                </td>
            </tr>
        </table>
    </fieldset>
    <?php echo $this->Form->end(__('Guardar', true)); ?>
</div>