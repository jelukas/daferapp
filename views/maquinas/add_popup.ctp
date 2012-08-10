<?php echo $this->Form->create('Maquina', array('type' => 'file')); ?>
<table class="edit">
    <tr>
        <td class="required"><span>Código Máquina</span></td>
        <td><?php echo $this->Form->input('codigo', array('label' => false)); ?></td>
        <td class="required"><span>Cliente</span></td>
        <td>
            <?php
            echo $this->Form->input('cliente_id', array('label' => false, 'data-placeholder' => "Elije un Cliente...", 'empty' => '', 'style' => 'width: 300px;', 'class' => 'chzn-select-required'));
            echo $ajax->observeField('MaquinaClienteId', array(
                'frequency' => '1',
                'update' => 'CentrostrabajoMaquinaSelectDiv',
                'url' => array(
                    'controller' => 'centrostrabajos',
                    'action' => 'selectMaquinaAdd'
                    ))
            );
            ?>
        </td>
        <td class="required"><span>Centro de Trabajo</span></td>
        <td>
            <?php
            echo $this->Form->input('centrostrabajo_id', array(
                'label' => false,
                'div' => array(
                    'id' => 'CentrostrabajoMaquinaSelectDiv'
                ),
                'style' => 'width: 300px;',
                'class' => 'chzn-select-required', 'data-placeholder' => "Elije un Centro de Trabajo...", 'empty' => ''));
            ?>
        </td>
    </tr>
    <tr>
        <td class="required"><span>Modelo</span></td>
        <td><?php echo $this->Form->input('nombre', array('label' => false)); ?></td>
        <td><span>Observaciones</span></td>
        <td colspan="3"><?php echo $this->Form->input('observaciones', array('label' => false)); ?></td>
    </tr>
    <tr>
        <td class="required"><span>Serie Máquina</span></td>
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
        <td class="required"><span>Horas de la Máquina</span></td>
        <td><?php echo $this->Form->input('horas', array('label' => false)); ?></td>
        <td colspan="4">
            <?php echo $this->Form->input('file', array('type' => 'file', 'label' => 'Adjuntar Archivo')); ?>
        </td>
    </tr>
</table>
<?php echo $this->Form->end(__('Guardar', true)); ?>
<script type="text/javascript">
    $(".chzn-select-required").chosen();
</script>