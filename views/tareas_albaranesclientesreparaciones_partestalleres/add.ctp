<?php echo $this->Form->create('TareasAlbaranesclientesreparacionesPartestallere', array('type' => 'file', array('action' => 'add'))); ?>
<fieldset style=" width: 100%;">
    <legend><?php __('Añadir Parte de Taller'); ?></legend>
    <table class="view" style="font-size: 75%;">
        <tr>
            <th>Número</th>
            <th>Fecha</th>
            <th>Mecánico</th>
        </tr>
        <tr>
            <td>
                <?php
                echo $this->Form->hidden('tareas_albaranesclientesreparacione_id', array('value' => $tareas_albaranesclientesreparacione_id));
                echo $this->Form->input('numero', array('label' => false));
                ?>
            </td>
            <td>
                <?php echo $this->Form->input('fecha', array('label' => false, 'dateFormat' => 'DMY')); ?>
            </td>
            <td>
                <?php echo $this->Form->input('mecanico_id',array('label' => false, 'data-placeholder' => 'Selecione el Mecánico...', 'empty' => '', 'class' => 'chzn-select-required')); ?>
            </td>

        </tr>
        <tr>
            <th>Horas de Trabajo</th>
            <th colspan="2">Descripción de Operaciones</th>
        </tr>
        <tr>
            <td>
                <table>
                    <tr>
                        <th>Inicio</th>
                        <th>Final</th>
                        <th>Real</th>
                        <th>Imputable</th>
                    </tr>
                    <tr>
                        <td><?php echo $this->Form->input('horainicio', array('label' => false, 'timeFormat' => '24')); ?></td>
                        <td><?php echo $this->Form->input('horafinal', array('label' => false, 'timeFormat' => '24')); ?></td>
                        <td><?php echo $this->Form->input('horasreales', array('label' => false, 'value' => 0, 'readonly' => true)); ?></td>
                        <td><?php echo $this->Form->input('horasimputables', array('label' => false, 'value' => 0)); ?></td>
                    </tr>
                </table>
            </td>
            <td colspan="2">
                <?php echo $this->Form->input('operacion', array('label' => false)); ?>
                <p><span>Observaciones</span></p>
                <?php echo $this->Form->input('observaciones', array('label' => false)); ?>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <?php
                echo $this->Form->input('file', array('type' => 'file', 'label' => 'Adjunto'));
                ?>
            </td>
            <td colspan="3">
                <table>
                    <tr><th colspan="2">Otros Servicios</th></tr>
                    <tr><td colspan="2">Descripción</td></tr>
                    <tr><td colspan="2"><?php echo $this->Form->input('varios_descripcion', array('label' => false)); ?></td></tr>
                    <tr>
                        <td>Real</td>
                        <td>Imputable</td>
                    </tr>
                    <tr>
                        <td><?php echo $this->Form->input('otrosservicios_real', array('label' => false, 'value' => 0)); ?></td>
                        <td><?php echo $this->Form->input('otrosservicios_imputable', array('label' => false, 'value' => 0)); ?></td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</fieldset>
<?php echo $this->Form->end(__('Guardar', true)); ?>
<script type="text/javascript">
    $(function(){
        $('#TareasAlbaranesclientesreparacionesPartestallereHorainicioHour').change(function(){
            calcula_horasreales();
        });
        $('#TareasAlbaranesclientesreparacionesPartestallereHorainicioMin').change(function(){
            calcula_horasreales();
        });;
        $('#TareasAlbaranesclientesreparacionesPartestallereHorafinalHour').change(function(){
            calcula_horasreales();
        });;
        $('#TareasAlbaranesclientesreparacionesPartestallereHorafinalMin').change(function(){
            calcula_horasreales();
        });;
    })
    function calcula_horasreales(){
        var minutos = (parseFloat($('#TareasAlbaranesclientesreparacionesPartestallereHorafinalHour').val()) * 60 + parseFloat($('#TareasAlbaranesclientesreparacionesPartestallereHorafinalMin').val()))- (parseFloat($('#TareasAlbaranesclientesreparacionesPartestallereHorainicioHour').val()) * 60 + parseFloat($('#TareasAlbaranesclientesreparacionesPartestallereHorainicioMin').val())) ;
        var horasreales = minutos / 60 ;
        horasreales =Math.round(horasreales *100)/100 ;
        $('#TareasAlbaranesclientesreparacionesPartestallereHorasreales').val(horasreales)
        $('#TareasAlbaranesclientesreparacionesPartestallereHorasimputables').val(horasreales)
    }
</script>