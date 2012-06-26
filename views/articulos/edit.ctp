<div class="articulos">
    <?php echo $this->Form->create('Articulo', array('type' => 'file')); ?>
    <fieldset>
        <legend>
            <?php __('Editar Artículo'); ?>
            <?php echo $this->Html->link(__('Ver Artículo', true), array('action' => 'view', $this->Form->value('Articulo.id')), array('class' => 'button_link')); ?>
            <?php echo $this->Html->link(__('Eliminar Artículo', true), array('action' => 'delete', $this->Form->value('Articulo.id')), array('class' => 'button_link')); ?>
            <?php echo $this->Html->link(__('Nuevo Artículo', true), array('action' => 'add'), array('class' => 'button_link')); ?>
            <?php echo $this->Html->link(__('Listar Artículos', true), array('action' => 'index'), array('class' => 'button_link')); ?>
        </legend>
        <table class="edit">
            <tr>
                <td><span>Referencia</span></td>
                <td><?php echo $this->Form->input('ref', array('label' => false)); ?></td>
                <td><span>Código de Barras</span></td>
                <td><?php echo $this->Form->input('codigobarras', array('label' => false)); ?></td>
            </tr>
            <tr>
                <td>Descripción</td>
                <td><?php echo $this->Form->input('nombre', array('label' => false)); ?></td>
                <td>Localización</td>
                <td><?php echo $this->Form->input('localizacion', array('label' => false)); ?></td>
            </tr>
            <tr>
                <td>PVP</td>
                <td><?php echo $this->Form->input('precio_sin_iva', array('label' => false)); ?></td>
                <td>Último Precio de Coste</td>
                <td><?php echo $this->Form->input('ultimopreciocompra', array('label' => false)); ?></td>
            </tr>
            <tr>
                <td>Almacén</td>
                <td colspan="3"><?php echo $this->Form->input('almacene_id', array('label' => false)); ?></td>
            </tr>
            <tr>
                <td>Existencias</td>
                <td><?php echo $this->Form->input('existencias', array('label' => false)); ?></td>
                <td>Stock Mínimo</td>
                <td><?php echo $this->Form->input('stock_minimo', array('label' => false)); ?></td>
            </tr>
            <tr>
                <td><span>Familia</span></td>
                <td><?php echo $this->Form->input('familia_id', array('label' => false)); ?></td>
                <td><span>Imágen Actual</span></td>
                <td>
                    <?php echo $this->Html->link(__($this->Form->value('Articulo.articuloescaneado'), true), '/files/articulo/' . $this->Form->value('Articulo.articuloescaneado')); ?>
                    <?php echo $this->Form->input('remove_file', array('type' => 'checkbox', 'label' => 'Borrar Imágen Actual', 'hiddenField' => false)); ?>
                    <?php echo $this->Form->input('file', array('type' => 'file', 'label' => 'Imágen del Artículo')); ?>
                </td>
            </tr>
            <tr>
                <td><span>Observaciones</span></td>
                <td><?php echo $this->Form->input('observaciones', array('label' => false)); ?></td>
                <td><span>Proveedor habitual</span></td>
                <td><?php echo $this->Form->input('proveedore_id', array('label' => false)); ?></td>
            </tr>
        </table>
    </fieldset>
    <?php echo $this->Form->end(__('Guardar', true)); ?>
</div>