<div class="presupuestosproveedores">
    <?php echo $this->Form->create('Presupuestosproveedore', array('type' => 'file')); ?>
    <fieldset>
        <legend><?php __('Añadir Presupuesto de proveedor'); ?></legend>
        <table class="view">
            <tr>
                <td>
                    <?php echo $this->Form->input('numero', array('label' => 'Número', 'value' => $numero)); ?>
                </td>
            </tr>
            <tr>
                <td>
                    <?php echo $this->Autocomplete->replace_select('Proveedore', 'Proveedor', true); ?>
                </td>
                <td colspan="2">
                    <?php echo $this->Form->input('fecha', array('label' => 'Fecha', 'dateFormat' => 'DMY', 'timeFormat' => '24')); ?>
                </td>
                <td>
                    <?php echo $this->Form->input('almacene_id', array('label' => 'Almacén')); ?>
                </td>
            </tr>
            <tr>
                <td colspan="4">
                    <?php echo $this->Form->input('observaciones', array('label' => 'Observaciones')); ?>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <?php echo $this->Form->input('file', array('type' => 'file', 'label' => 'Presupuesto escaneado')); ?>
                </td>
                <td>
                    <?php echo $this->Form->input('estadospresupuestosproveedore_id', array('label' => 'Estado del Presupuesto')); ?>
                </td>
                <td>
                    <?php echo $this->Form->input('fechaplazo', array('label' => 'Plazo de Entrega', 'dateFormat' => 'DMY', 'empty' => '--')); ?>
                </td>
            </tr>
        </table>
        <input type="hidden" name="data[paraalmacen]" value="1" />
        <div class="related">
            <h3>Artículos para el Presupuesto del Proveedor</h3>
            <?php if (!empty($articulos)): ?>
                <table cellpadding = "0" cellspacing = "0">
                    <tr>
                        <th><?php __('Ref'); ?></th>
                        <th><?php __('Descripcion'); ?></th>
                        <th><?php __('Cantidad'); ?></th>
                    </tr>
                    <?php
                    if (!empty($articulos)) {
                        $i = 0;
                        $j = 0;
                        foreach ($articulos as $articulo):
                            $class = null;
                            if ($i++ % 2 == 0) {
                                $class = ' class="altrow"';
                            }
                            ?>
                            <tr<?php echo $class; ?>>
                                <td><?php echo $articulo['Articulo']['ref']; ?> <input type="hidden" name="data[articulos][]" value="<?php echo $articulo['Articulo']['id']; ?>" /></td>
                                <td><?php echo $articulo['Articulo']['nombre']; ?></td>
                                <td><?php echo $articulo['Articulo']['stock_maximo'] - $articulo['Articulo']['existencias']; ?></td>
                            </tr>
                            <?php
                            $j++;
                        endforeach;
                    }
                    ?>
                </table>
            <?php endif; ?>
        </div>
    </fieldset>
    <?php echo $this->Form->end(__('Guardar', true)); ?>
</div>
