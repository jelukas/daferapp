<div class="presupuestosproveedores">
    <?php echo $this->Form->create('Presupuestosproveedore', array('type' => 'file')); ?>
    <fieldset>
        <legend><?php __('Añadir Presupuesto de proveedor'); ?></legend>
        <table class="view">
            <tr>
                <td>
                    <?php echo $this->Form->input('numero', array('label' => 'Número', 'value' => $numero)); ?>
                </td>
            </tr>
            <tr>
                <td>
                    <?php echo $this->Autocomplete->replace_select('Proveedore', 'Proveedor', true); ?>
                </td>
                <td>
                    <?php echo $this->Form->input('fecha', array('label' => 'Fecha', 'dateFormat' => 'DMY', 'timeFormat' => '24')); ?>
                </td>
                <td>
                    <?php echo $this->Form->input('almacene_id', array('label' => 'Almacén')); ?>
                </td>
                <td>
                    <?php echo $this->Form->input('confirmado', array('Confirmado')); ?>
                </td>
            </tr>
            <tr>
                <td colspan="4">
                    <?php echo $this->Form->input('observaciones', array('label' => 'Observaciones')); ?>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <?php echo $this->Form->input('file', array('type' => 'file', 'label' => 'Presupuesto escaneado')); ?>
                </td>
                <td>
                    <?php echo $this->Form->input('fechaplazo', array('label' => 'Plazo de Entrega', 'dateFormat' => 'DMY','empty'=>'--')); ?>
                </td>
                <td style="background-color: #FFE773">
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
                    } elseif (isset($ordene)) {
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
                    ?>
                </td>
            </tr>
        </table>
    </fieldset>
    <?php echo $this->Form->end(__('Guardar', true)); ?>
</div>
