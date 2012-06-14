<?php echo $this->Form->create('Parte', array('type' => 'file', 'style' => 'width: 100%; margin-left: 0;')); ?>
<table class="view" style="font-size: 75%; width: 100%">
    <tr>
        <th>Nº Parte</th>
        <th style="width: 200px">Fecha</th>
        <th style="width: 150px">Mecánico</th>
        <th>Descripción Operación</th>
        
    </tr>
    <tr>
        <td>
            <?php
            echo $this->Form->input('numero', array('label' => false));
            echo $this->Form->input('tarea_id', array('type' => 'hidden', 'value' => $tarea_id));
            ?>
        </td>
        <td>
            <?php echo $this->Form->input('fecha', array('label' => false)); ?>
        </td>
        <td>
            <?php echo $this->Form->input('mecanico_id', array('label' => false, 'style' => 'width: 150px')); ?>
        </td>
        <td>
            <?php echo $this->Form->input('operacion', array('label' => false)); ?>
        </td>

    </tr>
    <tr>
        <th colspan="2">Horas Desplazamiento</th>
        <th colspan="2">Kilometraje</th>
    </tr>
    <tr>
        <td colspan="2">
            <table>
                <tr>
                    <th>Inicio</th>
                    <th>Final</th>
                    <th>Real</th>
                    <th>Imputable</th>
                </tr>
                <tr>
                    <td><?php echo $this->Form->input('horainicio', array('label' => false)); ?></td>
                    <td><?php echo $this->Form->input('horafinal', array('label' => false)); ?></td>
                    <td><?php echo $this->Form->input('horasreales', array('label' => false,'readonly' => true ,'value' => 0)); ?></td>
                    <td><?php echo $this->Form->input('horasimputables', array('label' => false,'value' => 0)); ?></td>
                </tr>
            </table>
        </td>
        <td colspan="2">
            <table>
                <tr>
                    <th>Real</th>
                    <th>Imputable</th>
                </tr>
                <tr>
                    <td><?php echo $this->Form->input('kilometrajereal', array('label' => false,'value' => 0)); ?></td>
                    <td><?php echo $this->Form->input('kilometrajeimputable', array('label' => false,'value' => 0)); ?></td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td colspan="4">
            <?php echo $this->Form->input('centrostrabajo_id', array('options' => $centrostrabajos)); ?>
        </td>
    </tr>
    <tr>
        <td colspan="4">
            <?php echo $this->Form->input('file', array('type' => 'file', 'label' => 'Parte de Centro de Trabajo Escaneado')); ?>
        </td>
    </tr>
</table>
<?php echo $this->Form->end(__('Submit', true)); ?>
