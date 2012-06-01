<?php echo $this->Form->create('ArticulosAvisosrepuesto'); ?>
<fieldset>
    <legend><?php __('Añadir Articulo al Aviso de Repuesto ' . $avisosrepuesto_id); ?></legend>
    <?php
    echo $this->Autocomplete->replace_select('Articulo', null, true, $avisosrepuesto['Avisosrepuesto']['almacene_id']);
    echo $this->Form->input('avisosrepuesto_id', array('type' => 'text', 'disabled' => true, 'value' => $avisosrepuesto_id));
    echo $this->Form->input('avisosrepuesto_id', array('type' => 'hidden', 'value' => $avisosrepuesto_id));
    echo $this->Form->input('cantidad');
    ?>
</fieldset>
<?php echo $this->Form->end(__('Submit', true)); ?>
<script type="text/javascript" src="/daferapp/js/dafer-script.js"></script>