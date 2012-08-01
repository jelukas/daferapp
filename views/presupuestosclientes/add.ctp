<div class="presupuestosclientes">
    <?php echo $this->Form->create('Presupuestoscliente'); ?>
    <fieldset>
        <legend>
            <?php __('Nuevo Presupuesto a Cliente'); ?>
            <?php echo $this->Html->link(__('Listar Presupuestos a clientes', true), array('action' => 'index'), array('class' => 'button_link')); ?>
        </legend>
        <table class="edit">
            <tr>
                <td><span><?php __('Número'); ?></span></td>
                <td><?php echo $this->Form->input('numero', array('label' => false, 'readonly' => false, 'value' => $numero)); ?></td>
                <td><span><?php __('Fecha'); ?></span></td>
                <td><?php echo $this->Form->input('fecha', array('label' => false)); ?></td>
                <td><span><?php __('Almacén de los Materiales'); ?></span></td>
                <td><?php echo $this->Form->input('almacene_id', array('label' => false)); ?></td>
                <td><span><?php __('Confirmado'); ?></span></td>
                <td><?php echo $this->Form->input('confirmado', array('label' => false)); ?></td>
                <td><span><?php __('Comercial'); ?></span></td>
                <td><?php echo $this->Form->input('comerciale_id', array('label' => false)); ?></td>
            </tr>
            <tr>
                <td colspan="2">
                    <?php echo $this->Autocomplete->replace_select('Cliente', null, true, null); ?>
                </td>
                <?php
                echo $ajax->observeField('PresupuestosclienteClienteId', array(
                    'frequency' => '1',
                    'update' => 'CentrostrabajoSelectDiv',
                    'url' => array(
                        'controller' => 'centrostrabajos',
                        'action' => 'selectPresupuestoscliente'
                        ))
                );
                ?>
                <td colspan="3">
                    <?php
                    echo $this->Form->input('centrostrabajo_id', array(
                        'label' => 'Centro de Trabajo',
                        'div' => array(
                            'id' => 'CentrostrabajoSelectDiv'
                        ),
                        'empty' => '--- Seleccione un centro de trabajo ---'));
                     echo $ajax->observeField('PresupuestosclienteCentrostrabajoId', array(
                        'frequency' => '1',
                        'update' => 'MaquinaSelectDiv',
                        'url' => array(
                            'controller' => 'maquinas',
                            'action' => 'selectPresupuestosclientes'
                            ))
                    );
                    ?>
                </td>
                <td colspan="2">
                    <?php
                    echo $this->Form->input('maquina_id', array(
                        'label' => 'Máquina',
                        'empty' => '--- Seleccione una máquina ---',
                        'div' => array(
                            'id' => 'MaquinaSelectDiv'
                        )
                    ));
                    ?>
                </td>
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
    <?php echo $this->Form->end(__('Guardar Nuevo Presupuesto a Cliente', true)); ?>
</div>