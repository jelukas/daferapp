<div class="presupuestosclientes form">
    <?php echo $this->Form->create('Presupuestoscliente'); ?>
    <fieldset>
        <legend><?php __('Add Presupuestoscliente'); ?></legend>
        <?php
        echo $this->Autocomplete->replace_select('Cliente', null, true);
        echo $this->Form->input('Presupuestoscliente.comerciale_id');
        echo $this->Form->input('Presupuestoscliente.fecha');
        echo $this->Form->input('Presupuestoscliente.avisar');
        echo $this->Form->input('Presupuestoscliente.almacene_id');
        echo $this->Form->input('Presupuestoscliente.observaciones');
        echo $this->Form->input('Presupuestoscliente.tiposiva_id');
        if (!empty($avisosrepuesto['Avisosrepuesto']['id']))
            echo $this->Form->input('Presupuestoscliente.avisosrepuesto_id', array('type' => 'text', 'value' => $avisosrepuesto['Avisosrepuesto']['id'], 'readonly' => true));
        if (!empty($ordene['Ordene']['id']))
            echo $this->Form->input('Presupuestoscliente.ordene_id', array('type' => 'text', 'value' => $ordene['Ordene']['id'], 'readonly' => true));
        if (!empty($presupuestosproveedore['Presupuestosproveedore']['id'])) {
            echo $this->Form->input('Presupuestoscliente.presupuestosproveedore_id', array('type' => 'text', 'value' => $presupuestosproveedore['Presupuestosproveedore']['id'], 'readonly' => true));
            echo $this->Form->input('Presupuestoscliente.avisosrepuesto_id', array('type' => 'hidden', 'value' => $presupuestosproveedore['Presupuestosproveedore']['avisosrepuesto_id'], 'readonly' => true));
            echo $this->Form->input('Presupuestoscliente.ordene_id', array('type' => 'hidden', 'value' => $presupuestosproveedore['Presupuestosproveedore']['ordene_id'], 'readonly' => true));
            echo $this->Form->input('Presupuestoscliente.avisostallere_id', array('type' => 'hidden', 'value' => $presupuestosproveedore['Presupuestosproveedore']['avisostallere_id'], 'readonly' => true));
            echo $this->Html->para(null,'Los articulos del presupuesto a proveedor marcados pasaran automaticamente al presupuesto de cliente en una tarea llamada <em>Presupuesto Material Original</em>');
        }
        if (!empty($avisostallere['Avisostallere']['id']))
            echo $this->Form->input('Presupuestoscliente.avisostallere_id', array('type' => 'text', 'value' => $avisostallere['Avisostallere']['id'], 'readonly' => true));
        ?>
    </fieldset>
    <?php echo $this->Form->end(__('Submit', true)); ?>
</div>
<div class="actions">
    <h3><?php __('Actions'); ?></h3>
    <ul>
        <li><?php echo $this->Html->link(__('Listar Presupuestos a clientes', true), array('action' => 'index')); ?></li>
    </ul>
</div>