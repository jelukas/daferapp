<div class="maquinas">
    <?php echo $this->Form->create('Maquina'); ?>
    <fieldset>
        <legend>
            <?php __('Nueva Máquina'); ?>
            <?php echo $this->Html->link(__('Listar', true), array('action' => 'index'), array('class' => 'button_link')); ?>		
            <?php echo $this->Html->link(__('Nueva Máquina', true), array('action' => 'add'), array('class' => 'button_link')); ?>	
        </legend>
        <table class="edit">
            <tr>
                <td><span>Código Máquina</span></td>
                <td><?php echo $this->Form->input('codigo', array('label' => false)); ?></td>
                <td><span>Cliente</span></td>
                <td><?php
            echo $this->Form->input('cliente_id', array('label' => false, 'empty' => '--- Seleccione un cliente ---', 'style' => 'width: 300px;'));
            echo $ajax->observeField('MaquinaClienteId', array(
                'frequency' => '1',
                'update' => 'CentrostrabajoSelectDiv',
                'url' => array(
                    'controller' => 'centrostrabajos',
                    'action' => 'selectMaquina'
                    ))
            );
            ?></td>
                <td><span>Centro de Trabajo</span></td>
                <td><?php
                    echo $this->Form->input('centrostrabajo_id', array(
                        'label' => false,
                        'div' => array(
                            'id' => 'CentrostrabajoSelectDiv'
                        ),
                        'empty' => '--- Seleccione un centro de trabajo ---'));
            ?></td>
            </tr>
            <tr>
                <td><span>Modelo</span></td>
                <td><?php echo $this->Form->input('nombre', array('label' => false)); ?></td>
                <td><span>Observaciones</span></td>
                <td colspan="3"><?php echo $this->Form->input('observaciones', array('label' => false)); ?></td>
            </tr>
            <tr>
                <td><span>Serie Máquina</span></td>
                <td><?php echo $this->Form->input('serie_maquina', array('label' => false)); ?></td>
                <td><span>Modelo Motor</span></td>
                <td><?php echo $this->Form->input('modelo_motor', array('label' => false)); ?></td>
                <td><span>Serie Motor</span></td>
                <td><?php echo $this->Form->input('serie_motor', array('label' => false)); ?></td>
            </tr>
            <tr>
                <td><span>Modelo Transmisión</span></td>
                <td><?php echo $this->Form->input('modelo_transmision', array('label' => false)); ?></td>
                <td><span>Serie Transmisión</span></td>
                <td><?php echo $this->Form->input('serie_transmision', array('label' => false)); ?></td>
                <td><span>Año Fabricación</span></td>
                <td><?php echo $this->Form->input('anio_fabricacion', array('label' => false)); ?></td>
            </tr>
            <tr>
                <td><span>Horas de la Máquina</span></td>
                <td><?php echo $this->Form->input('horas', array('label' => false)); ?></td>
            </tr>
        </table>
    </fieldset>
<?php echo $this->Form->end(__('Guardar', true)); ?>
</div>