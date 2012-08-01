<div class="albaranesclientes">
    <?php echo $this->Form->create('Albaranescliente', array('type' => 'file')); ?>
    <fieldset>
        <legend><?php __('Nuevo Albaran de Venta Directa'); ?></legend>
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
        echo $this->Form->input('maquina_id', array(
            'label' => 'Máquina',
            'empty' => '--- Seleccione una máquina ---',
            'div' => array(
                'id' => 'MaquinaSelectDiv'
            )
        ));
        echo $this->Form->input('fecha');
        echo $this->Form->input('numero', array('value' => $numero));
        echo $this->Form->input('observaciones');
        echo $this->Form->input('tiposiva_id');
        echo $this->Form->input('almacene_id');
        echo $this->Form->input('file', array('type' => 'file', 'label' => 'Albaran Escaneado'));
        ?>
    </fieldset>
    <?php echo $this->Form->end(__('Guardar', true)); ?>
</div>