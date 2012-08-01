<?php echo $this->Form->create('TareaspedidosclientesOtrosservicio'); ?>
<fieldset>
    <?php echo $this->Form->input('tareaspedidoscliente_id', array('type' => 'hidden', 'value' => $tarea_id)); ?>
    <legend><?php __('Añadir Otros Conceptos'); ?></legend>
    <table class="view edit">
        <tr>
            <td><span>Precio Fijo Desplazamiento</span></td>
            <?php if (isset($centrostrabajo) && $centrostrabajo['modofacturacion'] == 'preciofijio'): ?>
                <td><p class="success">El Centro de Trabajo factura por Precio fijo de Desplazamiento</p><?php echo $this->Form->input('desplazamiento', array('label' => false, 'readonly' => True, 'default' => $centrostrabajo['preciofijodesplazamiento'])); ?></td>
            <?php elseif (isset($centrostrabajo) && $centrostrabajo['modofacturacion'] == 'preciokm'): ?>
                <td><p class="success">El Centro de Trabajo factura por Kilometraje</p><?php echo $this->Form->input('desplazamiento', array('label' => false, 'disabled' => True, 'default' => 0)); ?></td>
            <?php else: ?>
                <td><?php echo $this->Form->input('desplazamiento', array('label' => false, 'default' => 0)); ?></td>
            <?php endif; ?>
        </tr>
        <tr>
            <?php if (isset($centrostrabajo) && $centrostrabajo['modofacturacion'] == 'preciokm'): ?>
                <td>Precio Hora <input type="text" id="precio_hora_desplazamiento"  value="<?php echo!empty($centrostrabajo['preciohoradesplazamiento']) ? $centrostrabajo['preciohoradesplazamiento'] : 0 ?>"/></td>
                <td>Cantidad Horas <input type="text" id="cantidad_horas_desplazamiento"  value="<?php echo!empty($centrostrabajo['tiempodesplazamiento']) ? $centrostrabajo['tiempodesplazamiento'] : 0 ?>"/></td>
                <td><span>Precio Horas desplazamiento</span></td>
                <td><?php echo $this->Form->input('manoobradesplazamiento', array('label' => false, 'default' => $centrostrabajo['tiempodesplazamiento'] * $centrostrabajo['preciohoradesplazamiento'])); ?></td>
            <?php elseif (isset($centrostrabajo) && $centrostrabajo['modofacturacion'] == 'preciofijio'): ?>
                <td>Precio Hora <input type="text" id="precio_hora_desplazamiento"  value="0" disabled="disabled" /></td>
                <td>Cantidad Horas <input type="text" id="cantidad_horas_desplazamiento"  value="0" disabled="disabled"/></td>
                <td><span>Precio Horas desplazamiento</span></td>
                <td><?php echo $this->Form->input('manoobradesplazamiento', array('label' => false, 'default' => 0, 'disabled' => True)); ?></td>
            <?php else: ?>
                <td>Precio Hora <input type="text" id="precio_hora_desplazamiento"  value="<?php echo!empty($centrostrabajo['preciohoradesplazamiento']) ? $centrostrabajo['preciohoradesplazamiento'] : 0 ?>"/></td>
                <td>Cantidad Horas <input type="text" id="cantidad_horas_desplazamiento"  value="<?php echo!empty($centrostrabajo['tiempodesplazamiento']) ? $centrostrabajo['tiempodesplazamiento'] : 0 ?>"/></td>
                <td><span>Precio Horas desplazamiento</span></td>
                <td><?php echo $this->Form->input('manoobradesplazamiento', array('label' => false, 'default' => 0)); ?></td>
            <?php endif; ?>
        </tr>
        <tr>
            <?php if (isset($centrostrabajo) && $centrostrabajo['modofacturacion'] == 'preciokm'): ?>
                <td>Precio Km <input type="text" id="precio_km_desplazamiento"  value="<?php echo!empty($centrostrabajo['preciokm']) ? $centrostrabajo['preciokm'] : 0 ?>"/></td>
                <td>Cantidad Km <input type="text" id="cantidad_km_desplazamiento"  value="<?php echo!empty($centrostrabajo['distancia']) ? $centrostrabajo['distancia'] : 0 ?>"/></td>
                <td><span>Precio Kilometraje desplazamiento</span></td>
                <td><?php echo $this->Form->input('kilometraje', array('label' => false, 'default' => $centrostrabajo['preciokm'] * $centrostrabajo['distancia'])); ?></td>
            <?php elseif (isset($centrostrabajo) && $centrostrabajo['modofacturacion'] == 'preciofijio'): ?>
                <td>Precio Km <input type="text" id="precio_km_desplazamiento"  value="0" disabled="disabled"/></td>
                <td>Cantidad Km <input type="text" id="cantidad_km_desplazamiento"  value="0" disabled="disabled"/></td>
                <td><span>Precio Kilometraje desplazamiento</span></td>
                <td><?php echo $this->Form->input('kilometraje', array('label' => false, 'default' => 0, 'disabled' => True)); ?></td>
            <?php else: ?>
                <td>Precio Km <input type="text" id="precio_km_desplazamiento"  value="<?php echo!empty($centrostrabajo['preciokm']) ? $centrostrabajo['preciokm'] : 0 ?>"/></td>
                <td>Cantidad Km <input type="text" id="cantidad_km_desplazamiento"  value="<?php echo!empty($centrostrabajo['distancia']) ? $centrostrabajo['distancia'] : 0 ?>"/></td>
                <td><span>Precio Kilometraje desplazamiento</span></td>
                <td><?php echo $this->Form->input('kilometraje', array('label' => false, 'default' => 0)); ?></td>
            <?php endif; ?>
        </tr>
        <tr>
            <td><span>Dietas</span></td>
            <?php if (isset($centrostrabajo)): ?>
                <td><?php echo $this->Form->input('dietas', array('label' => false, 'default' => $centrostrabajo['dietas'])); ?></td>
            <?php else: ?>
                <td><?php echo $this->Form->input('dietas', array('label' => false, 'default' => 0)); ?></td>
            <?php endif; ?>
        </tr>
        <tr>
            <td><span>Otros Servicios</span></td>
            <td><?php echo $this->Form->input('varios', array('label' => false, 'default' => 0)); ?></td>
            <td colspan="2" rowspan="2">
                <?php echo $this->Form->input('varios_descripcion', array('label' => 'Otros Servicios Descripción')); ?>
            </td>
        </tr>
        <tr>
            <td><span>Total</span></td>
            <td><?php echo $this->Form->input('total', array('label' => false, 'readonly' => True, 'default' => 0)); ?></td>
        </tr>
    </table>
</fieldset>
<?php echo $this->Form->end(__('Guardar', true)); ?>
<script type="text/javascript">
    
    function recalcular_total_final(){
        total = 0;
        if($('#TareaspedidosclientesOtrosservicioDesplazamiento').length != 0 ){
            total += parseFloat($('#TareaspedidosclientesOtrosservicioDesplazamiento').val());
        }
        if($('#TareaspedidosclientesOtrosservicioKilometraje').length != 0 ){
            total += parseFloat($('#TareaspedidosclientesOtrosservicioManoobradesplazamiento').val());
            total += parseFloat($('#TareaspedidosclientesOtrosservicioKilometraje').val());
        }
        total += parseFloat($('#TareaspedidosclientesOtrosservicioDietas').val());
        total += parseFloat($('#TareaspedidosclientesOtrosservicioVarios').val());
        $('#TareaspedidosclientesOtrosservicioTotal').val(total);
    }
    function recalcular_totales(){
        desplazamiento = $('#TareaspedidosclientesOtrosservicioDesplazamiento').val();
        precio_desplazamiento_manoobra = $('#TareaspedidosclientesOtrosservicioManoobradesplazamiento').val($('#precio_hora_desplazamiento').val() * $('#cantidad_horas_desplazamiento').val() );
        precio_kilometraje = $('#TareaspedidosclientesOtrosservicioKilometraje').val($('#precio_km_desplazamiento').val() * $('#cantidad_km_desplazamiento').val());
        recalcular_total_final();
    }
    recalcular_total_final();
    $('input').keyup(recalcular_totales);
</script>