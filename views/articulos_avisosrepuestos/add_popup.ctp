<?php echo $this->Form->create('ArticulosAvisosrepuesto', array('action' => 'add_popup')); ?>
<fieldset>
    <legend><?php __('Añadir Articulo al Aviso de Repuesto ' . $avisosrepuesto_id); ?></legend>
    <?php
    echo $this->Autocomplete->replace_select('Articulo', null, true, $avisosrepuesto['Avisosrepuesto']['almacene_id']);
    echo $this->Form->input('avisosrepuesto_id', array('type' => 'hidden', 'value' => $avisosrepuesto_id));
    echo $this->Form->input('cantidad',array('default'=>0));
    ?>
</fieldset>
<?php echo $this->Ajax->submit(__('Guardar y Nuevo', true), array('url' => array('controller'=>'articulos_avisosrepuestos','action' => 'add_ajax', $avisosrepuesto_id), 'update' => 'dialog-modal')); ?>
<?php echo $this->Form->end(__('Guardar y Cerrar', true)); ?>
<script type="text/javascript" src="/daferapp/js/dafer-script.js"></script>