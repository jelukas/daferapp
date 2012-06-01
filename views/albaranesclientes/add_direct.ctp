<div class="albaranesclientes form">
    <?php echo $this->Form->create('Albaranescliente'); ?>
    <fieldset>
        <legend><?php __('Nuevo Albaran de Venta Directa'); ?></legend>
        <?php
        echo $this->Autocomplete->replace_select('Cliente', null, true, null);
        echo $this->Form->input('fecha');
        echo $this->Form->input('numeroalbaran');
        echo $this->Form->input('observaciones');
        echo $this->Form->input('albaranescaneado');
        echo $this->Form->input('tiposiva_id');
        echo $this->Form->input('almacene_id');
        echo $this->Form->input('facturable');
        ?>
    </fieldset>
    <?php echo $this->Form->end(__('Guardar', true)); ?>
</div>
<div class="actions">
    <h3><?php __('Actions'); ?></h3>
    <ul>
        <li><?php echo $this->Html->link(__('List Albaranesclientes', true), array('action' => 'index')); ?></li>
    </ul>
</div>