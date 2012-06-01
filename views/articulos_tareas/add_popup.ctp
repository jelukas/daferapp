<?php echo $this->Form->create('ArticulosTarea'); ?>
<fieldset>
    <legend><?php __('Añadir Articulo a la Tarea '.$tarea_id); ?></legend>
    <div class="input required">
        <label for="ArticulosTareaArticuloId">Articulo</label>
        <input type="text" id="autocomplete-articulotarea" />
        <input type="hidden" name="data[ArticulosTarea][articulo_id]" id="ArticulosTareaArticuloId" />
    </div>
    <?php
    echo $this->Form->input('tarea_id', array('type' => 'text', 'disabled' => true, 'value' => $tarea_id));
    echo $this->Form->input('tarea_id', array('type' => 'hidden', 'value' => $tarea_id));
    echo $this->Form->input('cantidad');
    ?>
</fieldset>
<?php echo $this->Form->end(__('Submit', true)); ?>
<script type="text/javascript" src="/daferapp/js/dafer-script.js"></script>