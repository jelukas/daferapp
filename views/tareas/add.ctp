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
        <label>Tipo de Tarea</label>
    <?php
    $options = array('taller' => 'En taller', 'centro' => 'En el Centro de Trabajo');
    echo $this->Form->select('tipo', $options);
    ?>
    <br/><br/>
    <?php
    echo $this->Form->input('descripcion');
    ?>
</fieldset>
<?php echo $this->Form->end(__('Guardar', true)); ?>