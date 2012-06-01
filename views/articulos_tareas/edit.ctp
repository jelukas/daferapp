<div class="articulosTareas form">
    <?php echo $this->Form->create('ArticulosTarea'); ?>
    <fieldset>
        <legend><?php __('Edit Articulos Tarea'); ?></legend>
        <?php
        echo $this->Form->input('id');
        ?>
        <div class="input required">
            <label for="ArticulosTareaArticuloId">Articulo</label>
            <?php echo $this->Html->link($this->data['Articulo']['nombre'], array('controller' => 'articulos', 'action' => 'view', $this->data['ArticulosTarea']['articulo_id'])) ?>
            <input type="text" id="autocomplete-articulotarea" value="<?php echo $this->data['Articulo']['nombre']; ?>"/>
            <input type="hidden" name="data[ArticulosTarea][articulo_id]" id="ArticulosTareaArticuloId" value="<?php echo $this->data['ArticulosTarea']['articulo_id']; ?>"/>
        </div>
        <?php
        echo $this->Form->input('tarea_id');
        echo $this->Form->input('cantidad');
        ?>
    </fieldset>
    <?php echo $this->Form->end(__('Submit', true)); ?>
</div>
<div class="actions">
    <h3><?php __('Actions'); ?></h3>
    <ul>

        <li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('ArticulosTarea.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('ArticulosTarea.id'))); ?></li>
        <li><?php echo $this->Html->link(__('List Articulos Tareas', true), array('action' => 'index')); ?></li>
        <li><?php echo $this->Html->link(__('List Articulos', true), array('controller' => 'articulos', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Articulo', true), array('controller' => 'articulos', 'action' => 'add')); ?> </li>
        <li><?php echo $this->Html->link(__('List Tareas', true), array('controller' => 'tareas', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Tarea', true), array('controller' => 'tareas', 'action' => 'add')); ?> </li>
    </ul>
</div>