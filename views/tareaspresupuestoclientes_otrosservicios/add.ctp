<?php echo $this->Form->create('TareaspresupuestoclientesOtrosservicio'); ?>
<fieldset>
    <legend><?php __('Añadir Otros Servicios'); ?></legend>
    <?php
    echo $this->Form->input('tareaspresupuestocliente_id', array('type' => 'hidden', 'value' => $tarea_id));
    echo $this->Form->input('desplazamiento',array('default'=>$otrosservicios['desplazamiento']));
    echo $this->Form->input('manoobradesplazamiento',array('default'=>$otrosservicios['manoobradesplazamiento']));
    echo $this->Form->input('kilometraje',array('default'=>$otrosservicios['kilometraje']));
    echo $this->Form->input('dietas',array('default'=>$otrosservicios['dietas']));
    echo $this->Form->input('varios',array('default'=>0));
    echo $this->Form->input('total',array('readonly'=>true,'default'=>$otrosservicios['total']));
    ?>
</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>