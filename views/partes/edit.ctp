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
            echo $this->Form->input('id');
            echo $this->Form->input('numero', array('label' => false));
            ?>
        </td>
        <td><?php echo $this->Form->input('fecha', array('label' => false)); ?></td>
        <td><?php echo $this->Form->input('mecanico_id', array('label' => false, 'style' => 'width: 150px')); ?></td>
        <td><?php echo $this->Form->input('operacion', array('label' => false)); ?></td>
    </tr>
    <tr>
        <th colspan="2">Horas Desplazamiento</th>
        <th>Kilometraje</th>
        <th>Precio Desplazamiento</th>
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
                    <td><?php echo $this->Form->input('horasdesplazamientoinicio', array('label' => false, 'timeFormat' => '24')); ?></td>
                    <td><?php echo $this->Form->input('horasdesplazamientofin', array('label' => false, 'timeFormat' => '24')); ?></td>
                    <td><?php echo $this->Form->input('horasdesplazamientoreales', array('label' => false, 'readonly' => true)); ?></td>
                    <td><?php echo $this->Form->input('horasdesplazamientoimputables', array('label' => false)); ?></td>
                </tr>
            </table>
        </td>
        <td>
            <table>
                <tr>
                    <th>Real</th>
                    <th>Imputable</th>
                </tr>
                <tr>
                    <td><?php echo $this->Form->input('kilometrajereal', array('label' => false)); ?></td>
                    <td><?php echo $this->Form->input('kilometrajeimputable', array('label' => false)); ?></td>
                </tr>
            </table>
        </td>
        <td><?php echo $this->Form->input('preciodesplazamiento', array('label' => false)); ?></td>
    </tr>
    <tr>
        <th colspan="3">Horas de Trabajo</th>
        <th>Dietas</th>
    </tr>
    <tr>
        <td colspan="3">
            <table>
                <tr>
                    <th>Inicio</th>
                    <th>Final</th>
                    <th>Real</th>
                    <th>Imputadas</th>
                </tr>
                <tr>
                    <td><?php echo $this->Form->input('horainicio', array('label' => false, 'timeFormat' => '24')); ?></td>
                    <td><?php echo $this->Form->input('horafinal', array('label' => false, 'timeFormat' => '24')); ?></td>
                    <td><?php echo $this->Form->input('horasreales', array('label' => false, 'readonly' => true)); ?></td>
                    <td><?php echo $this->Form->input('horasimputables', array('label' => false)); ?></td>
                </tr>
            </table>
        </td>
        <td>
            <table>
                <tr>
                    <th>Real</th>
                    <th>Imputadas</th>
                </tr>
                <tr>
                    <td><?php echo $this->Form->input('dietasreales', array('label' => false)); ?></td>
                    <td><?php echo $this->Form->input('dietasimputables', array('label' => false)); ?></td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td colspan="4">
            <?php
            echo 'Parte de Centro de Trabajo Escaneado Actual: ' . $this->Html->link(__($this->Form->value('Parte.parteescaneado'), true), '/files/parte/' . $this->Form->value('Parte.parteescaneado'));
            echo $this->Form->input('remove_file', array('type' => 'checkbox', 'label' => 'Borrar Parte de Centro de Trabajo Escaneado Actual', 'hiddenField' => false));
            echo $this->Form->input('file', array('type' => 'file', 'label' => 'Parte de Centro de Trabajo Escaneado'));
            ?>
        </td>
    </tr>
</table>
<?php echo $this->Form->end(__('Guardar', true)); ?>
<script type="text/javascript">
    $(function(){
        $('#ParteHorasdesplazamientoinicioHour').change(function(){
            calcula_horasreales_desplazamiento();
        });
        $('#ParteHorasdesplazamientoinicioMin').change(function(){
            calcula_horasreales_desplazamiento();
        });;
        $('#ParteHorasdesplazamientofinHour').change(function(){
            calcula_horasreales_desplazamiento();
        });;
        $('#ParteHorasdesplazamientofinMin').change(function(){
            calcula_horasreales_desplazamiento();
        });;


        $('#ParteHorainicioHour').change(function(){
            calcula_horasreales_trabajo();
        });
        $('#ParteHorainicioMin').change(function(){
            calcula_horasreales_trabajo();
        });;
        $('#ParteHorafinalHour').change(function(){
            calcula_horasreales_trabajo();
        });;
        $('#ParteHorafinalMin').change(function(){
            calcula_horasreales_trabajo();
        });;
 
 
        function calcula_horasreales_desplazamiento(){
            var minutos = (parseFloat($('#ParteHorasdesplazamientofinHour').val()) * 60 + parseFloat($('#ParteHorasdesplazamientofinMin').val()))- (parseFloat($('#ParteHorasdesplazamientoinicioHour').val()) * 60 + parseFloat($('#ParteHorasdesplazamientoinicioMin').val())) ;
            var horasreales = minutos / 60 ;
            $('#ParteHorasdesplazamientoreales').val(horasreales)
            $('#ParteHorasdesplazamientoimputables').val(horasreales)
        }
        function calcula_horasreales_trabajo(){
            var minutos = (parseFloat($('#ParteHorafinalHour').val()) * 60 + parseFloat($('#ParteHorafinalMin').val()))- (parseFloat($('#ParteHorainicioHour').val()) * 60 + parseFloat($('#ParteHorainicioMin').val())) ;
            var horasreales = minutos / 60 ;
            $('#ParteHorasreales').val(horasreales)
            $('#ParteHorasimputables').val(horasreales)
        }
    
    });
</script>