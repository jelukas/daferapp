<?php echo $this->Form->create('TareaspresupuestoclientesOtrosservicio'); ?>
<fieldset>
    <?php     echo $this->Form->input('tareaspresupuestocliente_id', array('type' => 'hidden', 'value' => $tarea_id)); ?>
    <legend><?php __('Añadir Otros Conceptos'); ?></legend>
    <table class="view edit">
        <tr>
            <td>Precio Fijo Desplazamiento</td>
            <td><?php echo $this->Form->input('desplazamiento',array('label' =>false,'default'=>0)); ?></td>
        </tr>
        <tr>
            <td>Precio Hora <?php echo '€ hora al centro' ?></td>
            <td>Precio Hora <?php echo 'Cantidad horas' ?></td>
            <td>Precio Horas desplazamiento</td>
            <td><?php echo $this->Form->input('manoobradesplazamiento',array('label' => false,'default'=>0)); ?></td>
        </tr>
        <tr>
            <td>Precio Hora <?php echo '€ km al centro' ?></td>
            <td>Precio Hora <?php echo 'Cantidad km' ?></td>
            <td>Precio Kilometraje desplazamiento</td>
            <td><?php echo $this->Form->input('kilometraje',array('label' => false,'default'=>0)); ?></td>
        </tr>
        <tr>
            <td>Dietas</td>
            <td><?php echo $this->Form->input('dietas',array('label' =>false,'default'=>$otrosservicios['dietas'])); ?></td>
        </tr>
        <tr>
            <td>Otros Servicios</td>
            <td><?php echo $this->Form->input('varios',array('label' =>false,'default'=>0)); ?></td>
        </tr>
        <tr>
            <td colspan="4"><?php echo $this->Form->input('total',array('readonly'=>true,'default'=>0)); ?></td> 
        </tr>
    </table>
</fieldset>
<?php echo $this->Form->end(__('Guardar', true));?>