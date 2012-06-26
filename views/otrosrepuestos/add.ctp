<?php echo $this->Form->create('Otrosrepuesto'); ?>
<fieldset>
    <legend><?php __('Add Otrosrepuesto'); ?></legend>
    <?php
    echo $this->Autocomplete->replace_select('Articulo', null, true, null);
    echo $this->Form->input('maquina_id', array('type' => 'hidden', 'value' => $maquina_id));
    echo $this->Form->input('cantidad');
    ?>
</fieldset>
<?php echo $this->Form->end(__('Guardar', true)); ?>