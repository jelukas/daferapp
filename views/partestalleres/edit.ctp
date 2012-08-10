<?php echo $this->Form->create('Partestallere', array('type' => 'file', array('action' => 'edit'))); ?>
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
                echo $this->Form->hidden('tarea_id', array('type' => 'hidden'));
                echo $this->Form->input('numero', array('label' => false));
                ?>
            </td>
            <td>
                <?php echo $this->Form->input('fecha', array('label' => false, 'dateFormat' => 'DMY')); ?>
            </td>
            <td>
                <?php echo $this->Form->input('mecanico_id', array('label' => false, 'data-placeholder' => 'Selecione el Mecánico...', 'empty' => '', 'class' => 'chzn-select-required')); ?>
            </td>
        </tr>
        <tr>
            <th>Horas de Trabajo</th>
            <th colspan="2">Descripción de Operaciónes</th>
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
                        <td><?php echo $this->Form->input('horasreales', array('label' => false, 'readonly' => true)); ?></td>
                        <td><?php echo $this->Form->input('horasimputables', array('label' => false)); ?></td>
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
                echo 'Adjunto Actual: ' . $this->Html->link(__($this->Form->value('Partestallere.parteescaneado'), true), '/files/partestallere/' . $this->Form->value('Partestallere.parteescaneado'));
                echo $this->Form->input('remove_file', array('type' => 'checkbox', 'label' => 'Borrar Parte de Taller Escaneado Actual', 'hiddenField' => false));
                echo $this->Form->input('file', array('type' => 'file', 'label' => 'Parte de Taller Escaneado'));
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
                        <td><?php echo $this->Form->input('otrosservicios_real', array('label' => false)); ?></td>
                        <td><?php echo $this->Form->input('otrosservicios_imputable', array('label' => false)); ?></td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</fieldset>
<?php echo $this->Form->end(__('Guardar', true)); ?>
<script type="text/javascript">
    $(function(){
        $('#PartestallereHorainicioHour').change(function(){
            calcula_horasreales();
        });
        $('#PartestallereHorainicioMin').change(function(){
            calcula_horasreales();
        });;
        $('#PartestallereHorafinalHour').change(function(){
            calcula_horasreales();
        });;
        $('#PartestallereHorafinalMin').change(function(){
            calcula_horasreales();
        });;
    })
    function calcula_horasreales(){
        var minutos = (parseFloat($('#PartestallereHorafinalHour').val()) * 60 + parseFloat($('#PartestallereHorafinalMin').val()))- (parseFloat($('#PartestallereHorainicioHour').val()) * 60 + parseFloat($('#PartestallereHorainicioMin').val())) ;
        var horasreales = minutos / 60 ;
        horasreales =Math.round(horasreales *100)/100 ;
        $('#PartestallereHorasreales').val(horasreales)
        $('#PartestallereHorasimputables').val(horasreales)
    }
</script>