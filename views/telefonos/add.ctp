<?php echo $this->Form->create('Telefono', array('action' => 'add')); ?>
<fieldset>
    <legend><?php __('Añadir Teléfono'); ?></legend>
    <?php
    echo $this->Form->input('telefono');
    if (!empty($transportista_id))
        echo $this->Form->input('transportista_id', array('type' => 'hidden', 'value' => $transportista_id));
    if (!empty($centrostrabajo_id))
        echo $this->Form->input('centrostrabajo_id', array('type' => 'hidden', 'value' => $centrostrabajo_id));
    if (!empty($cliente_id))
        echo $this->Form->input('cliente_id', array('type' => 'hidden', 'value' => $cliente_id));
    if (!empty($proveedore_id))
        echo $this->Form->input('proveedore_id', array('type' => 'hidden', 'value' => $proveedore_id));
    ?>
</fieldset>
<?php echo $this->Form->end(__('Guardar', true)); ?>