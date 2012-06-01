<?php echo $this->Form->create('Tarea'); ?>
<fieldset>
    <legend><?php __('Añadir nueva tarea'); ?></legend>
    <?php
    if (isset($ordene)) {
        echo $this->Form->label('Nº de Orden de Taller');
        echo $ordene['Ordene']['id'] . '<br><br>';
        echo '<input type="hidden" value="' . $ordene['Ordene']['id'] . '" name="ordene_id"/>';
    }
    ?>
    <br/><br/>
    <?php
    echo $this->Form->input('descripcion');
    ?>
</fieldset>
<?php echo $this->Form->end(__('Guardar', true)); ?>