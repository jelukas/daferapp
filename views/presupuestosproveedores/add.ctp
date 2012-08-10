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
                <td colspan="2">
                    <?php echo $this->Form->input('fecha', array('label' => 'Fecha', 'dateFormat' => 'DMY', 'timeFormat' => '24')); ?>
                </td>
                <td>
                    <?php echo $this->Form->input('almacene_id', array('label' => 'Almacén')); ?>
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
                    <?php echo $this->Form->input('estadospresupuestosproveedore_id', array('label' => 'Estado del Presupuesto')); ?>
                </td>
                <td>
                    <?php echo $this->Form->input('fechaplazo', array('label' => 'Plazo de Entrega', 'dateFormat' => 'DMY', 'empty' => '--','maxYear'=>date('Y'),'minYear'=>date('Y', strtotime('+7 years')), 'orderYear' => 'asc')); ?>
                </td>
            </tr>
            <tr>
                <td colspan="4">
                    <table>
                        <tr>
                            <?php
                            if (isset($avisorepuesto)) {
                                echo '<td><span>' . $this->Form->label('Nº Aviso de repuesto') . '</span></td>';
                                echo '<td>' . $avisorepuesto['Avisosrepuesto']['id'];
                                echo $this->Form->input('avisosrepuesto_id', array('value' => $avisorepuesto['Avisosrepuesto']['id'], 'type' => 'hidden')) . '</td>';
                                echo '<td><span>' . $this->Form->label('Cliente') . '</span></td>';
                                echo '<td>' . $avisorepuesto['Cliente']['nombre'] . '</td>';
                                echo '<td><span>' . $this->Form->label('Centro de Trabajo') . '</span></td>';
                                echo '<td>' . $avisorepuesto['Centrostrabajo']['centrotrabajo'] . '</td>';
                                echo '<td><span>' . $this->Form->label('Máquina') . '</span></td>';
                                echo '<td>' . $avisorepuesto['Maquina']['nombre'] . '</td>';
                            } elseif (isset($avisotaller)) {
                                echo '<td><span>' . $this->Form->label('Nº Aviso de taller') . '</span></td>';
                                echo $avisotaller['Avisostallere']['id'] . '</td>';
                                echo $this->Form->input('avisostallere_id', array('value' => $avisotaller['Avisostallere']['id'], 'type' => 'hidden')) . '</td>';
                                echo '<td><span>' . $this->Form->label('Cliente') . '</span></td>';
                                echo $avisotaller['Cliente']['nombre'] . '</td>';
                                echo '<td><span>' . $this->Form->label('Centro de Trabajo') . '</span></td>';
                                echo $avisotaller['Centrostrabajo']['centrotrabajo'] . '<br/><br/>';
                                echo '<td><span>' . $this->Form->label('Máquina') . '</span></td>';
                                echo $avisotaller['Maquina']['nombre'] . '</td>';
                            } elseif (isset($ordene)) {
                                echo '<td><span>' . $this->Form->label('Orden') . '</span></td>';
                                echo $ordene['Ordene']['id'];
                                echo $this->Form->input('ordene_id', array('value' => $ordene['Ordene']['id'], 'type' => 'hidden')) . '</td>';
                                echo '<td><span>' . $this->Form->label('Nº Aviso de taller') . '</span></td>';
                                echo $ordene['Avisostallere']['id'] . '<br><br>';
                                echo '<td><span>' . $this->Form->label('Cliente') . '</span></td>';
                                echo $ordene['Avisostallere']['Cliente']['nombre'] . '</td>';
                                echo '<td><span>' . $this->Form->label('Centro de Trabajo') . '</span></td>';
                                echo $ordene['Avisostallere']['Centrostrabajo']['centrotrabajo'] . '</td>';
                                echo '<td><span>' . $this->Form->label('Máquina') . '</span></td>';
                                echo $ordene['Avisostallere']['Maquina']['nombre'] . '</td>';
                            }
                            ?>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </fieldset>
    <?php echo $this->Form->end(__('Guardar', true)); ?>
</div>
