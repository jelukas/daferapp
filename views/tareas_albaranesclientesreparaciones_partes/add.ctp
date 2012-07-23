<?php echo $this->Form->create('TareasAlbaranesclientesreparacionesParte', array('type' => 'file', 'style' => 'width: 100%; margin-left: 0;')); ?>
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
            echo $this->Form->input('tareas_albaranesclientesreparacione_id', array('type' => 'hidden', 'value' => $tareas_albaranesclientesreparacione_id));
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
                    <td><?php echo $this->Form->input('horasdesplazamientoinicio_ida', array('label' => false, 'timeFormat' => '24')); ?></td>
                    <td><?php echo $this->Form->input('horasdesplazamientofin_ida', array('label' => false, 'timeFormat' => '24')); ?></td>
                    <td><?php echo $this->Form->input('horasdesplazamientoreales_ida', array('label' => false, 'readonly' => true, 'value' => 0)); ?></td>
                    <td><?php echo $this->Form->input('horasdesplazamientoimputables_ida', array('label' => false, 'value' => 0)); ?></td>
                </tr>
                <tr>
                    <td><?php echo $this->Form->input('horasdesplazamientoinicio_vuelta', array('label' => false, 'timeFormat' => '24')); ?></td>
                    <td><?php echo $this->Form->input('horasdesplazamientofin_vuelta', array('label' => false, 'timeFormat' => '24')); ?></td>
                    <td><?php echo $this->Form->input('horasdesplazamientoreales_vuelta', array('label' => false, 'readonly' => true, 'value' => 0)); ?></td>
                    <td><?php echo $this->Form->input('horasdesplazamientoimputables_vuelta', array('label' => false, 'value' => 0)); ?></td>
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
                    <td><?php echo $this->Form->input('kilometrajereal_ida', array('label' => false, 'value' => $tarea['Albaranesclientesreparacione']['Centrostrabajo']['distancia'])); ?></td>
                    <td><?php echo $this->Form->input('kilometrajeimputable_ida', array('label' => false, 'value' => $tarea['Albaranesclientesreparacione']['Centrostrabajo']['distancia'])); ?></td>
                </tr>
                <tr>
                    <td><?php echo $this->Form->input('kilometrajereal_vuelta', array('label' => false, 'value' => $tarea['Albaranesclientesreparacione']['Centrostrabajo']['distancia'])); ?></td>
                    <td><?php echo $this->Form->input('kilometrajeimputable_vuelta', array('label' => false, 'value' => $tarea['Albaranesclientesreparacione']['Centrostrabajo']['distancia'])); ?></td>
                </tr>
            </table>
        </td>
        <td><?php echo $this->Form->input('preciodesplazamiento', array('label' => false, 'value' => $tarea['Albaranesclientesreparacione']['Centrostrabajo']['preciofijodesplazamiento'])); ?></td>
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
                    <td><?php echo $this->Form->input('horasreales', array('label' => false, 'readonly' => true, 'value' => 0)); ?></td>
                    <td><?php echo $this->Form->input('horasimputables', array('label' => false, 'value' => 0)); ?></td>
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
                    <td><?php echo $this->Form->input('dietasreales', array('label' => false, 'value' => $tarea['Albaranesclientesreparacione']['Centrostrabajo']['dietas'])); ?></td>
                    <td><?php echo $this->Form->input('dietasimputables', array('label' => false, 'value' => $tarea['Albaranesclientesreparacione']['Centrostrabajo']['dietas'])); ?></td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td colspan="2">
            <?php echo $this->Form->input('file', array('type' => 'file', 'label' => 'Parte de Centro de Trabajo Escaneado')); ?>
        </td>
        <td colspan="2">
            <table>
                <tr><td colspan="2">Otros Servicios</td></tr>
                <tr>
                    <th>Real</th>
                    <th>Imputable</th>
                </tr>
                <tr>
                    <td><?php echo $this->Form->input('otrosservicios_real', array('label' => false, 'value' => 0)); ?></td>
                    <td><?php echo $this->Form->input('otrosservicios_imputable', array('label' => false, 'value' => 0)); ?></td>
                </tr>
            </table>
        </td>
    </tr>
</table>
<?php echo $this->Form->end(__('Guardar', true)); ?>
<script type="text/javascript">
    $(function(){
        // Ida
        $('#TareasAlbaranesclientesreparacionesParteHorasdesplazamientoinicioIdaHour').change(function(){
            calcula_horasreales_desplazamiento_ida();
        });
        $('#TareasAlbaranesclientesreparacionesParteHorasdesplazamientoinicioIdaMin').change(function(){
            calcula_horasreales_desplazamiento_ida();
        });;
        $('#TareasAlbaranesclientesreparacionesParteHorasdesplazamientofinIdaHour').change(function(){
            calcula_horasreales_desplazamiento_ida();
        });;
        $('#TareasAlbaranesclientesreparacionesParteHorasdesplazamientofinIdaMin').change(function(){
            calcula_horasreales_desplazamiento_ida();
        });;
        // Vuelta
        $('#TareasAlbaranesclientesreparacionesParteHorasdesplazamientoinicioVueltaHour').change(function(){
            calcula_horasreales_desplazamiento_vuelta();
        });
        $('#TareasAlbaranesclientesreparacionesParteHorasdesplazamientoinicioVueltaMin').change(function(){
            calcula_horasreales_desplazamiento_vuelta();
        });;
        $('#TareasAlbaranesclientesreparacionesParteHorasdesplazamientofinVueltaHour').change(function(){
            calcula_horasreales_desplazamiento_vuelta();
        });;
        $('#TareasAlbaranesclientesreparacionesParteHorasdesplazamientofinVueltaMin').change(function(){
            calcula_horasreales_desplazamiento_vuelta();
        });;


        $('#TareasAlbaranesclientesreparacionesParteHorainicioHour').change(function(){
            calcula_horasreales_trabajo();
        });
        $('#TareasAlbaranesclientesreparacionesParteHorainicioMin').change(function(){
            calcula_horasreales_trabajo();
        });;
        $('#TareasAlbaranesclientesreparacionesParteHorafinalHour').change(function(){
            calcula_horasreales_trabajo();
        });;
        $('#TareasAlbaranesclientesreparacionesParteHorafinalMin').change(function(){
            calcula_horasreales_trabajo();
        });;
 
 
        function calcula_horasreales_desplazamiento_ida(){
            var minutos = (parseFloat($('#TareasAlbaranesclientesreparacionesParteHorasdesplazamientofinIdaHour').val()) * 60 + parseFloat($('#TareasAlbaranesclientesreparacionesParteHorasdesplazamientofinIdaMin').val()))- (parseFloat($('#TareasAlbaranesclientesreparacionesParteHorasdesplazamientoinicioIdaHour').val()) * 60 + parseFloat($('#TareasAlbaranesclientesreparacionesParteHorasdesplazamientoinicioIdaMin').val())) ;
            var horasreales = minutos / 60 ;
            $('#TareasAlbaranesclientesreparacionesParteHorasdesplazamientorealesIda').val(horasreales)
            $('#TareasAlbaranesclientesreparacionesParteHorasdesplazamientoimputablesIda').val(horasreales)
        }
        function calcula_horasreales_desplazamiento_vuelta(){
            var minutos = (parseFloat($('#TareasAlbaranesclientesreparacionesParteHorasdesplazamientofinVueltaHour').val()) * 60 + parseFloat($('#TareasAlbaranesclientesreparacionesParteHorasdesplazamientofinVueltaMin').val()))- (parseFloat($('#TareasAlbaranesclientesreparacionesParteHorasdesplazamientoinicioVueltaHour').val()) * 60 + parseFloat($('#TareasAlbaranesclientesreparacionesParteHorasdesplazamientoinicioVueltaMin').val())) ;
            var horasreales = minutos / 60 ;
            $('#TareasAlbaranesclientesreparacionesParteHorasdesplazamientorealesVuelta').val(horasreales)
            $('#TareasAlbaranesclientesreparacionesParteHorasdesplazamientoimputablesVuelta').val(horasreales)
        }
        function calcula_horasreales_trabajo(){
            var minutos = (parseFloat($('#TareasAlbaranesclientesreparacionesParteHorafinalHour').val()) * 60 + parseFloat($('#TareasAlbaranesclientesreparacionesParteHorafinalMin').val()))- (parseFloat($('#TareasAlbaranesclientesreparacionesParteHorainicioHour').val()) * 60 + parseFloat($('#TareasAlbaranesclientesreparacionesParteHorainicioMin').val())) ;
            var horasreales = minutos / 60 ;
            $('#TareasAlbaranesclientesreparacionesParteHorasreales').val(horasreales)
            $('#TareasAlbaranesclientesreparacionesParteHorasimputables').val(horasreales)
        }
    });
</script>