<div class="ordenes">
    <?php echo $this->Form->create('Ordene'); ?>
    <fieldset>
        <legend>
            <?php __('Nueva Orden Nº ' . $numero); ?>
        </legend>
        <table class="view">
            <tr>
                <td style="font-size: 120%;">
                    <span>Número</span>
                    <?php
                    echo $this->Form->input('numero', array('label' => false,'value' => $numero));
                    ?>
                </td>
                <td colspan="2">
                    <span>Comercial</span>
                    <?php
                    echo $this->Form->input('comerciale_id', array('label' => false));
                    ?>
                </td>
                <td>
                    <span>Aviso de Taller</span>
                    <?php echo $this->Form->input('avisostallere_id', array('type' => 'hidden','value' => $avisotallere['Avisostallere']['id'])); ?>
                    <?php echo $avisotallere['Avisostallere']['numero']; ?>
                </td>
            </tr>
            <tr>
                <td>
                    <span>Fecha</span>
                    <?php echo $this->Form->input('fecha', array('label' => false)); ?>
                </td>
                <td colspan="2">
                    <span>Estado</span>
                    <?php echo $this->Form->input('estadosordene_id', array('label' => false)); ?>
                </td>
                <td>
                    <span>Reparación Prevista</span>
                    <?php echo $this->Form->input('fecha_prevista_reparacion', array('label' => false)); ?>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <span>Fecha de Aceptación del Aviso</span>
                    <?php echo $avisotallere['Avisostallere']['fechaaceptacion'] ?>
                </td>
                <td colspan="2">
                    <span>Urgente</span>
                    <?php echo $this->Form->input('urgente', array('label' => false)); ?>
                </td>
            </tr>
            <tr>
                <td>
                    <span>Cliente</span>
                    <?php echo $avisotallere['Cliente']['nombre']?>
                    <?php echo $this->Form->input('cliente_id', array('type' => 'hidden','value' => $avisotallere['Cliente']['id'])); ?>
                </td>
                <td>
                    <span>Centro</span>
                    <?php echo $avisotallere['Centrostrabajo']['centrotrabajo'] ?>
                    <?php echo $this->Form->input('centrostrabajo_id', array('type' => 'hidden','value' => $avisotallere['Centrostrabajo']['id'])); ?>
                </td>
                <td>
                    <p>
                        <span>Máquina</span>
                        <?php echo $avisotallere['Maquina']['nombre']?>
                        <?php echo $this->Form->input('maquina_id', array('type' => 'hidden','value' => $avisotallere['Maquina']['id'])); ?>
                    </p>
                    <p>
                        <span>Horas Maquina</span>
                        <?php echo $avisotallere['Avisostallere']['horas_maquina'] ?>
                    </p>
                </td>
                <td>
                    <p>
                        <span>Nº Serie Máquina</span> 
                        <?php echo $avisotallere['Maquina']['serie_maquina']  ?>
                    </p>
                    <p>
                        <span>Nº Serie Motor</span> 
                        <?php echo $avisotallere['Maquina']['serie_motor'] ?>
                    </p>
                    <p>
                        <span>Nº Serie Transmisión</span>
                        <?php echo  $avisotallere['Maquina']['serie_transmision'] ?>
                    </p>
                </td>
            </tr>
            <tr>
                <td colspan="4">
                    <span>Descripción</span> 
                    <?php echo $this->Form->input('descripcion', array('label' => false,'value' => $avisotallere['Avisostallere']['descripcion'])); ?>
                </td>
            </tr>
            <tr>
                <td colspan="4">
                    <span>Observaciones</span> 
                    <?php echo $this->Form->input('observaciones', array('label' => false,'value' => $avisotallere['Avisostallere']['observaciones'])); ?>
                </td>
            </tr>
        </table>
    </fieldset>
    <?php echo $this->Form->end(__('Guardar', true)); ?>
</div>





