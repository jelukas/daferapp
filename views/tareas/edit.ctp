<div class="tareas form">
    <?php echo $this->Form->create('Tarea'); ?>
    <fieldset>
        <legend><?php __('Editar Tarea de Taller'); ?></legend>
        <?php
        echo $this->Form->input('id', array('type' => 'text', 'disabled' => true));
        echo $this->Form->input('id', array('type' => 'hidden'));
        $options = array('taller' => 'En taller', 'centro' => 'En el Centro de Trabajo');
        echo $this->Form->select('tipo', $options);
        echo $this->Form->input('ordene_id', array('type' => 'text', 'disabled' => true));
        echo $this->Form->input('descripcion');
        ?>
    </fieldset>
    <fieldset id="add_articulo">
        <legend>Artículos para la Tarea</legend>
        <div>  
            <input type="text" class="autocomplete_input" id="autocomplete-tarea" value="Inserta el nombre o referencia del artículo"/>
        </div>
        <div>
            <table id="articulos_autotable">
                <thead><tr><td>Articulo</td><td>Cantidad</td><td>Eliminar</td></tr></thead>
                <?php if (!empty($this->data['ArticulosTarea'])): ?>
                    <?php foreach ($this->data['ArticulosTarea'] as $key => $articulo_tarea): ?>
                        <tr>
                            <td>Ref.<?php echo $articulo_tarea['Articulo']['ref'] ?> ····· <?php echo $articulo_tarea['Articulo']['nombre'] ?><input type="hidden" name="data[ArticulosTarea][<?php echo $key ?>][articulo_id]" class="articulo_id" value="<?php echo $articulo_tarea['articulo_id'] ?>"></td>
                            <td><input type="hidden" name="data[ArticulosTarea][<?php echo $key ?>][id]" value="<?php echo $articulo_tarea['id'] ?>" /><input type="text" class="cantidad" style="width: 50px" name="data[ArticulosTarea][<?php echo $key ?>][cantidad]" value="<?php echo $articulo_tarea['cantidad'] ?>"/><input type="hidden" name="data[ArticulosTarea][<?php echo $key ?>][tarea_id]" value="<?php echo $articulo_tarea['tarea_id'] ?>" /></td>
                            <td>
                                <?php echo $this->Html->link($this->Html->image("delete.png", array("alt" => "Eliminar")), array('controller' => 'articulos_tareas', 'action' => 'delete', $articulo_tarea['id'], $articulo_tarea['tarea_id']), array('escape' => false), sprintf(__('Are you sure you want to delete # %s?', true), $articulo_tarea['Articulo']['nombre'])); ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </table>
            <?php echo isset($key) ? '<input type="hidden" id="auto2" value="' . $key . '" />' : ''; ?>
        </div>
    </fieldset>
    <?php echo $this->Form->end(__('Submit', true)); ?>
</div>
<div class="actions">
    <h3><?php __('Acciones'); ?></h3>
    <ul>
        <li><?php echo $this->Html->link(__('Eliminar', true), array('action' => 'delete', $this->Form->value('Tarea.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('Tarea.id'))); ?></li>
        <li><?php echo $this->Html->link(__('Listar Ordenes', true), array('controller' => 'ordenes', 'action' => 'index')); ?> </li>
    </ul>
</div>