<div class="presupuestosproveedores form">
    <?php echo $this->Form->create('Presupuestosproveedore', array('type' => 'file')); ?>
    <fieldset>
        <legend><?php __('Añadir Presupuesto de proveedor'); ?></legend>
        <?php
        if (isset($avisorepuesto)) {
            echo $this->Form->label('Nº Aviso de repuesto');
            echo $avisorepuesto['Avisosrepuesto']['id'] . '<br/><br/>';
            echo $this->Form->input('avisosrepuesto_id', array('value' => $avisorepuesto['Avisosrepuesto']['id'], 'type' => 'hidden'));
            echo $this->Form->label('Cliente');
            echo $avisorepuesto['Cliente']['nombre'] . '<br/><br/>';
            echo $this->Form->label('Centro de Trabajo');
            echo $avisorepuesto['Centrostrabajo']['centrotrabajo'] . '<br/><br/>';
            echo $this->Form->label('Máquina');
            echo $avisorepuesto['Maquina']['nombre'];
        } elseif (isset($avisotaller)) {
            echo $this->Form->label('Nº Aviso de taller');
            echo $avisotaller['Avisostallere']['id'] . '<br><br>';
            echo $this->Form->input('avisostallere_id', array('value' => $avisotaller['Avisostallere']['id'], 'type' => 'hidden'));
            echo $this->Form->label('Cliente');
            echo $avisotaller['Cliente']['nombre'] . '<br/><br/>';
            echo $this->Form->label('Centro de Trabajo');
            echo $avisotaller['Centrostrabajo']['centrotrabajo'] . '<br/><br/>';
            echo $this->Form->label('Máquina');
            echo $avisotaller['Maquina']['nombre'] . '<br/><br/>';
        }elseif(isset($ordene)){
            echo $this->Form->label('Orden');
            echo $ordene['Ordene']['id'];
            echo $this->Form->input('ordene_id', array('value' => $ordene['Ordene']['id'], 'type' => 'hidden'));
            echo $this->Form->label('Nº Aviso de taller');
            echo $ordene['Avisostallere']['id'] . '<br><br>';
            echo $this->Form->label('Cliente');
            echo $ordene['Avisostallere']['Cliente']['nombre'] . '<br/><br/>';
            echo $this->Form->label('Centro de Trabajo');
            echo $ordene['Avisostallere']['Centrostrabajo']['centrotrabajo'] . '<br/><br/>';
            echo $this->Form->label('Máquina');
            echo $ordene['Avisostallere']['Maquina']['nombre'] . '<br/><br/>';
            
        }
        echo $this->Autocomplete->replace_select('Proveedore', 'Proveedor', true);
        echo $this->Form->input('almacene_id', array('label' => 'Almacén', 'empty' => '--- Seleccione un almacén ---'));
        echo $this->Form->input('fechaplazo', array('label' => 'Fecha', 'dateFormat' => 'DMY'));
        echo $this->Form->input('observaciones', array('label' => 'Observaciones'));
        echo $this->Form->input('confirmado', array('Confirmado'));
        echo $this->Form->input('file', array('type' => 'file', 'label' => 'Presupuesto escaneado'));
        ?>
    </fieldset>
    <?php echo $this->Form->end(__('Añadir', true)); ?>
</div>
<div class="actions">
    <h3><?php __('Acciones'); ?></h3>
    <ul>

        <li><?php echo $this->Html->link(__('Listar Presupuestos de proveedores', true), array('action' => 'index')); ?></li>
        <li><?php echo $this->Html->link(__('Listar Proveedores', true), array('controller' => 'proveedores', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('Nuevo Proveedor', true), array('controller' => 'proveedores', 'action' => 'add')); ?> </li>
        <li><?php echo $this->Html->link(__('Listar Almacenes', true), array('controller' => 'almacenes', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('Nuevo Almacén', true), array('controller' => 'almacenes', 'action' => 'add')); ?> </li>
    </ul>
</div>
