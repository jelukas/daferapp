<div class="presupuestosclientes">
    <?php echo $this->Form->create('Presupuestoscliente'); ?>
    <fieldset>
        <legend>
            <?php __('Nuevo Presupuesto a Cliente desde el Aviso de Taller '); ?>
            <?php echo $this->Html->link(__('Listar Presupuestos a clientes', true), array('action' => 'index'), array('class' => 'button_link')); ?>
        </legend>
        <table class="edit">
            <tr>
                <td><span><?php __('Número'); ?></span></td>
                <td><?php echo $this->Form->input('numero', array('label' => false, 'readonly' => false, 'value' => $numero)); ?></td>
                <td><span><?php __('Fecha'); ?></span></td>
                <td><?php echo $this->Form->input('fecha', array('label' => false)); ?></td>
                <td><span><?php __('Almacén de los Materiales'); ?></span></td>
                <td>
                    <?php
                    echo $this->Form->input('Presupuestoscliente.almacene_id', array('label' => false));
                    ?>
                </td>
                <td><span><?php __('Confirmado'); ?></span></td>
                <td><?php echo $this->Form->input('confirmado', array('label' => false)); ?></td>
                <td><span><?php __('Comercial'); ?></span></td>
                <td><?php echo $this->Form->input('comerciale_id', array('label' => false)); ?></td>
            </tr>
            <tr>
                <td><span><?php __('Cliente'); ?></span></td>
                <td colspan="9">
                    <?php
                    echo $this->Html->link($avisostallere['Cliente']['nombre'], array('controller' => 'clientes', 'action' => 'view', $avisostallere['Cliente']['id']));
                    echo $this->Form->input('Presupuestoscliente.cliente_id', array('type' => 'hidden', 'value' => $avisostallere['Avisostallere']['cliente_id']));
                    ?>
                </td>
                <td colspan="2"><span><?php __('Centro de Trabajo'); ?></span></td>
                <td colspan="2">
                    <?php
                    echo $this->Html->link($avisostallere['Centrostrabajo']['centrotrabajo'], array('controller' => 'centrostrabajos', 'action' => 'view', $avisostallere['Centrostrabajo']['id']));
                    echo $this->Form->input('Presupuestoscliente.centrostrabajo_id', array('type' => 'hidden', 'value' => $avisostallere['Avisostallere']['centrostrabajo_id']));
                    ?>
                </td>
            </tr>
            <tr>
                <td><h4><?php __('Nº Aviso de Taller'); ?></h4></td>
                <td><?php echo $avisostallere['Avisostallere']['numero'] ?><?php echo $this->Form->input('Presupuestoscliente.avisostallere_id', array('type' => 'hidden', 'value' => $avisostallere['Avisostallere']['id'], 'readonly' => true)); ?></td>
                <td><span><?php __('Centro de Trabajo'); ?></span></td>
                <td><?php echo $avisostallere['Centrostrabajo']['centrotrabajo']; ?></td>
                <td><span><?php __('Máquina'); ?></span></td>
                <td>
                    <?php
                    echo $this->Html->link($avisostallere['Maquina']['nombre'], array('controller' => 'maquinas', 'action' => 'view', $avisostallere['Maquina']['id']));
                    echo $this->Form->input('Presupuestoscliente.maquina_id', array('type' => 'hidden', 'value' => $avisostallere['Maquina']['id']));
                    ?>
                </td>
                <td><span><?php __('Nº Serie Máquina'); ?></span></td>
                <td>
                    <?php echo $avisostallere['Maquina']['serie_maquina']; ?>
                </td>
                <td><span><?php __('Horas'); ?></span></td>
                <td><?php echo $avisostallere['Avisostallere']['horas_maquina']; ?></td>
            </tr>
            <tr>
                <td><span><?php __('Mensaje'); ?></span></td>
                <td colspan="9"><?php echo $this->Form->input('mensajesinformativo_id', array('label' => false, 'empty' => '-- Sin Mensaje --')); ?></td>
            </tr>
            <tr>
                <td><span><?php __('Observaciones'); ?></span></td>
                <td colspan="7"><?php echo $this->Form->input('observaciones', array('label' => false)); ?></td>
                <td><span><?php __('Avisar'); ?></span></td>
                <td><?php echo $this->Form->input('avisar', array('label' => false)); ?></td>
            </tr>
            <tr>
                <td colspan="2"><span><?php __('Presupuesto Enviado Fecha'); ?></span></td>
                <td colspan="3"><?php echo $this->Form->input('fecha_enviado', array('label' => false, 'empty' => '--')); ?></td>
                <td><span><?php __('Tipo de IVA') ?></span></td>
                <td><?php echo $this->Form->input('tiposiva_id', array('label' => false)); ?></td>
            </tr>
        </table>
    </fieldset>
    <?php echo $this->Form->end(__('Guardar', true)); ?>
</div>