<?php echo $this->Form->create('Otrosrepuesto',array('action' => 'add')); ?>
<fieldset>
    <legend><?php __('Añadir Otros Repuestos'); ?></legend>
    <?php
    echo $this->Autocomplete->replace_select('Articulo', null, true, null);
    echo $this->Form->input('maquina_id', array('type' => 'hidden', 'value' => $maquina_id));
    echo $this->Form->input('cantidad',array('value' => 0));
    echo $this->Form->input('observaciones',array('value' => ''));
    ?>
</fieldset>
<?php echo $this->Ajax->submit(__('Guardar y Nuevo', true), array('url' => array('action' => 'add_ajax', $maquina_id), 'update' => 'dialog-modal')); ?>
<?php echo $this->Form->end(__('Guardar y Cerrar', true)); ?>