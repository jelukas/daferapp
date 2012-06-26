<?php echo $this->Form->create('Articulosparamantenimiento'); ?>
<fieldset>
    <legend><?php __('Add Articulosparamantenimiento'); ?></legend>
    <?php
    echo $this->Autocomplete->replace_select('Articulo', null, true, null);
    echo $this->Form->input('maquina_id', array('type' => 'hidden', 'value' => $maquina_id));
    echo $this->Form->input('cantidad');
    ?>
</fieldset>
<?php echo $this->Form->end(__('Submit', true)); ?>