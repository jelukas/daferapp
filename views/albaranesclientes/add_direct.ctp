<div class="albaranesclientes">
    <?php echo $this->Form->create('Albaranescliente', array('type' => 'file')); ?>
    <fieldset>
        <legend><?php __('Nuevo Albaran de Venta Directa'); ?></legend>
        <table class="view">
            <tr>
                <td><span><?php __('Número'); ?></span></td>
                <td>
                    <?php
                    echo $this->Form->input('id');
                    echo $this->Form->input('numero', array('label' => False, 'value' => $numero));
                    ?>
                </td>
                <td><span><?php __('Fecha'); ?></span></td>
                <td><?php echo $this->Form->input('fecha', array('label' => False)); ?></td>
                <td><span><?php __('Almacén de los Materiales'); ?></span></td>
                <td><?php echo $this->Form->input('almacene_id', array('label' => False)); ?></td>
                <td><span><?php __('Comercial'); ?></span></td>
                <td><?php echo $this->Form->input('comerciale_id', array('label' => False, 'empty' => ' -- Ninguno --')); ?></td>
            </tr>
            <tr>
                <td><span><?php __('Cliente') ?></span></td>
                <td>
                    <?php
                    echo $this->Autocomplete->replace_select('Cliente', null, true, null);
                    echo $ajax->observeField('AlbaranesclienteClienteId', array(
                        'frequency' => '1',
                        'update' => 'CentrostrabajoSelectDiv',
                        'url' => array(
                            'controller' => 'centrostrabajos',
                            'action' => 'selectAlbaranesclientes'
                            ))
                    );
                    ?>
                </td>
                <td><span><?php __('Centro de Trabajo') ?> </span></td>
                <td>
                    <?php
                    echo $this->Form->input('centrostrabajo_id', array(
                        'label' => 'Centro de Trabajo',
                        'div' => array(
                            'id' => 'CentrostrabajoSelectDiv'
                        ),
                        'empty' => '--- Seleccione un centro de trabajo ---'));
                    echo $ajax->observeField('AlbaranesclienteCentrostrabajoId', array(
                        'frequency' => '1',
                        'update' => 'MaquinaSelectDiv',
                        'url' => array(
                            'controller' => 'maquinas',
                            'action' => 'selectAlbaranesclientes'
                            ))
                    );
                    ?>
                </td>
                <td><span><?php __('Maquina') ?> </span></td>
                <td>
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
                <td><span><?php __('Albarán Escaneado'); ?></span></td>
                <td colspan="5">
                    <?php
                    echo $this->Form->input('file', array('type' => 'file', 'label' => False));
                    ?>
                </td>
                <td><span><?php __('Estado') ?></span></td>
                <td><?php echo $this->Form->input('estadosalbaranescliente_id', array('label' => False)) ?></td>
            </tr>
            <tr>
                <td><span><?php __('Observaciones'); ?></span></td>
                <td colspan="5"><?php echo $this->Form->input('observaciones', array('label' => False)); ?></td>
            </tr>
            <tr>
                <td><span><?php __('Centro de Coste') ?></span></td>
                <td><?php echo $this->Form->input('centrosdecoste_id', array('label' => False)); ?></td>
                <td><span><?php __('Tipo de IVA Aplicado') ?></span></td>
                <td><?php echo $this->Form->input('tiposiva_id', array('label' => False)); ?></td>
                <td><span><?php __('Facturable'); ?></span></td>
                <td><?php echo $this->Form->input('facturable', array('label' => False,'checked' => True)); ?></td>
            </tr>
        </table>
    </fieldset>
    <?php echo $this->Form->end(__('Guardar', true)); ?>
</div>