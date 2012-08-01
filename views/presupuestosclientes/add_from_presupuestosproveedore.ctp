<div class="presupuestosclientes">
    <?php echo $this->Form->create('Presupuestoscliente'); ?>
    <fieldset>
        <legend>
            <?php __('Nuevo Presupuesto a Cliente desde el Presupuesto de Proveedor '); ?>
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
                    echo $this->Html->link($presupuestosproveedore['Almacene']['nombre'], array('controller' => 'almacenes', 'action' => 'view', $presupuestosproveedore['Almacene']['id']));
                    echo $this->Form->input('Presupuestoscliente.almacene_id', array('type' => 'hidden', 'value' => $presupuestosproveedore['Presupuestosproveedore']['almacene_id']));
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
                    echo $this->Html->link($cliente['Cliente']['nombre'], array('controller' => 'clientes', 'action' => 'view', $cliente['Cliente']['id']));
                    echo $this->Form->input('Presupuestoscliente.cliente_id', array('type' => 'hidden', 'value' => $cliente['Cliente']['id']));
                    ?>
                </td>
                <?php
                if (!empty($presupuestosproveedore['Avisostallere']['Centrostrabajo'])) {
                    $centrostrabajo = $presupuestosproveedore['Avisostallere']['Centrostrabajo'];
                } elseif (!empty($presupuestosproveedore['Avisosrepuesto']['Centrostrabajo'])) {
                    $centrostrabajo = $presupuestosproveedore['Avisosrepuesto']['Centrostrabajo'];
                } elseif (!empty($presupuestosproveedore['Ordene']['Avisostallere']['Centrostrabajo'])) {
                    $centrostrabajo = $presupuestosproveedore['Ordene']['Avisostallere']['Centrostrabajo'];
                }
                ?>
                <?php if (isset($centrostrabajo)): ?>
                    <td><span><?php __('Centro de Trabajo'); ?></span></td>
                    <td>
                        <?php
                        echo $this->Html->link($centrostrabajo['centrotrabajo'], array('controller' => 'centrostrabajos', 'action' => 'view', $centrostrabajo['id']));
                        echo $this->Form->input('Presupuestoscliente.centrostrabajo_id', array('type' => 'hidden', 'value' => $centrostrabajo['id']));
                        ?>
                    </td>
                <?php endif; ?>
                <?php
                if (!empty($presupuestosproveedore['Avisostallere']['Maquina'])) {
                    $maquina = $presupuestosproveedore['Avisostallere']['Maquina'];
                } elseif (!empty($presupuestosproveedore['Avisosrepuesto']['Maquina'])) {
                    $maquina = $presupuestosproveedore['Avisosrepuesto']['Maquina'];
                } elseif (!empty($presupuestosproveedore['Ordene']['Avisostallere']['Maquina'])) {
                    $maquina = $presupuestosproveedore['Ordene']['Avisostallere']['Maquina'];
                }
                ?>
                <?php if (isset($maquina)): ?>
                    <td><span><?php __('Maquina'); ?></span></td>
                    <td>
                        <?php
                        echo $this->Html->link($maquina['nombre'], array('controller' => 'maquinas', 'action' => 'view', $maquina['id']));
                        echo $this->Form->input('Presupuestoscliente.maquina_id', array('type' => 'hidden', 'value' => $maquina['id']));
                        ?>
                    </td>
                <?php endif; ?>
            </tr>
            <tr>
                <td><h4><?php __('Nº Presupuesto Proveedor'); ?></h4></td>
                <td><?php echo $presupuestosproveedore['Presupuestosproveedore']['numero'] ?><?php echo $this->Form->input('Presupuestoscliente.presupuestosproveedore_id', array('type' => 'hidden', 'value' => $presupuestosproveedore['Presupuestosproveedore']['id'], 'readonly' => true)); ?></td>
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