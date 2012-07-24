<?php echo $this->Form->create('TareaspresupuestoclientesOtrosservicio'); ?>
<fieldset>
    <?php echo $this->Form->input('tareaspresupuestocliente_id', array('type' => 'hidden', 'value' => $tarea_id)); ?>
    <legend><?php __('Añadir Otros Conceptos'); ?></legend>
    <table class="view edit">
        <tr>
            <td><span>Precio Fijo Desplazamiento</span></td>
            <td><?php echo $this->Form->input('desplazamiento', array('label' => false, 'default' => $centrostrabajo['preciofijodesplazamiento'])); ?></td>
        </tr>
        <tr>
            <td>Precio Hora <input type="text" id="precio_hora_desplazamiento"  value="<?php echo $centrostrabajo['preciohoradesplazamiento'] ?>"/></td>
            <td>Cantidad Horas <input type="text" id="cantidad_horas_desplazamiento"  value="<?php echo $centrostrabajo['tiempodesplazamiento'] ?>"/></td>
            <td><span>Precio Horas desplazamiento</span></td>
            <td><?php echo $this->Form->input('manoobradesplazamiento', array('label' => false, 'default' => $centrostrabajo['tiempodesplazamiento'] * $centrostrabajo['preciohoradesplazamiento'])); ?></td>
        </tr>
        <tr>
            <td>Precio Km <input type="text" id="precio_km_desplazamiento"  value="<?php echo $centrostrabajo['preciokm'] ?>"/></td>
            <td>Cantidad Km <input type="text" id="cantidad_km_desplazamiento"  value="<?php echo $centrostrabajo['distancia'] ?>"/></td>
            <td><span>Precio Kilometraje desplazamiento</span></td>
            <td><?php echo $this->Form->input('kilometraje', array('label' => false, 'default' => $centrostrabajo['preciokm'] * $centrostrabajo['distancia'])); ?></td>
        </tr>
        <tr>
            <td><span>Dietas</span></td>
            <td><?php echo $this->Form->input('dietas', array('label' => false, 'default' => $centrostrabajo['dietas'])); ?></td>
        </tr>
        <tr>
            <td><span>Otros Servicios</span></td>
            <td><?php echo $this->Form->input('varios', array('label' => false, 'default' => 0)); ?></td>
        </tr>
    </table>
</fieldset>
<?php echo $this->Form->end(__('Guardar', true)); ?>
<script type="text/javascript">
    function recalcular_totales(){
        desplazamiento = $('#TareaspresupuestoclientesOtrosservicioDesplazamiento').val();
        precio_desplazamiento_manoobra = $('#TareaspresupuestoclientesOtrosservicioManoobradesplazamiento').val($('#precio_hora_desplazamiento').val() * $('#cantidad_horas_desplazamiento').val() );
        precio_kilometraje = $('#TareaspresupuestoclientesOtrosservicioKilometraje').val($('#precio_km_desplazamiento').val() * $('#cantidad_km_desplazamiento').val());
        precio_dietas = $('#TareaspresupuestoclientesOtrosservicioDietas').val();
        precio_varios = $('#TareaspresupuestoclientesOtrosservicioVarios').val();
    }
    $('input').keyup(recalcular_totales);
</script>