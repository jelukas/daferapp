<?php $cliente_id = null; ?>
<div class="presupuestosproveedores">
    <?php echo $this->Form->create('Presupuestosproveedore', array('type' => 'file')); ?>
    <fieldset>
        <legend>
            <?php __('Presupuesto de Proveedor Nº '.$this->Form->value('Presupuestosproveedore.numero')); ?>
            <?php echo $this->Html->link(__('Ver', true), array('action' => 'view',$this->Form->value('Presupuestosproveedore.id')), array('class' => 'button_link')); ?>
            <?php echo $this->Html->link(__('Listar', true), array('action' => 'index'), array('class' => 'button_link')); ?>
            <?php echo $this->Html->link(__('Nuevo (Directo)', true), array('action' => 'add'), array('class' => 'button_link')); ?>
        </legend>
        <?php echo $this->Form->input('id'); ?>
        <table class="view">
            <tr>
                <td>
                    <div class="input select required">
                        <label for="PresupuestosproveedoreProveedoreId">Proveedor</label>
                        <?php echo $this->Html->para(null, $this->Html->link('Proveedor ' . $this->data['Proveedore']['nombre'], array('controller' => 'proveedores', 'action' => 'view', $this->data['Proveedore']['id']))); ?>
                        <?php echo $this->Form->input('proveedore_id', array('type' => 'hidden')); ?>
                        <p><input id="autocomplete-proveedores" type="text" value="" /></p>
                    </div>
                </td>
                <td>
                    <?php echo $this->Form->input('fecha', array('label' => 'Fecha', 'dateFormat' => 'DMY', 'timeFormat' => '24')); ?>
                </td>
                <td>
                    <?php echo $this->Form->input('almacene_id', array('label' => 'Almacén')); ?>
                </td>
                <td>
                    <?php echo $this->Form->input('confirmado', array('Confirmado')); ?>
                </td>
            </tr>
            <tr>
                <td colspan="4">
                    <?php echo $this->Form->input('observaciones', array('label' => 'Observaciones')); ?>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    Presupuesto escaneado Actual: <?php echo $this->Html->link(__($this->Form->value('Presupuestosproveedore.presupuestoescaneado'), true), '/files/presupuestosproveedore/' . $this->Form->value('Presupuestosproveedore.presupuestoescaneado')); ?>
                    <?php echo $this->Form->input('remove_file', array('type' => 'checkbox', 'label' => 'Borrar Documento Escaneado Actual', 'hiddenField' => false)); ?>
                    <?php echo $this->Form->input('file', array('type' => 'file', 'label' => 'Presupuesto escaneado')); ?>
                </td>
                <td colspan="2">
                    <?php echo $this->Form->input('fechaplazo', array('label' => 'Plazo de Entrega', 'dateFormat' => 'DMY', 'empty' => '--')); ?>
                </td>
            </tr>
        </table>
        <div class="related">
            <h3>Artículos del Presupuesto del Proveedor</h3>
            <div class="actions">
                <ul>   
                    <li><?php echo $this->Html->link(__('Añadir Artículo', true), array('controller' => 'articulos_presupuestosproveedores', 'action' => 'add', $this->Form->value('Presupuestosproveedore.id')), array('class' => 'popup')); ?> </li>
                </ul>
            </div>
            <?php if (!empty($articulos_presupuestosproveedore)): ?>
                <table cellpadding = "0" cellspacing = "0">
                    <tr>
                        <th><?php __('Ref'); ?></th>
                        <th><?php __('Nombre'); ?></th>
                        <th><?php __('Cantidad'); ?></th>
                        <th><?php __('Precio Proveedor€'); ?></th>
                        <th><?php __('Descuento %'); ?></th>
                        <th><?php __('Neto €'); ?></th>
                        <th><?php __('Total €'); ?></th>
                        <th class="actions"><?php __('Acciones'); ?></th>
                    </tr>
                    <?php
                    if (!empty($articulos_presupuestosproveedore)) {
                        $i = 0;
                        $j = 0;
                        foreach ($articulos_presupuestosproveedore as $articulo_presupuestosproveedor):
                            $class = null;
                            if ($i++ % 2 == 0) {
                                $class = ' class="altrow"';
                            }
                            ?>
                            <tr<?php echo $class; ?>>
                                <td><?php echo $articulo_presupuestosproveedor['Articulo']['ref']; ?><?php echo $this->Form->input('ArticulosPresupuestosproveedore.' . $j . '.id', array('value' => $articulo_presupuestosproveedor['ArticulosPresupuestosproveedore']['id'])); ?>   </td>
                                <td><?php echo $articulo_presupuestosproveedor['Articulo']['nombre']; ?></td>
                                <td><?php echo $articulo_presupuestosproveedor['ArticulosPresupuestosproveedore']['cantidad']; ?></td>
                                <td><?php echo $articulo_presupuestosproveedor['ArticulosPresupuestosproveedore']['precio_proveedor']; ?></td>
                                <td><?php echo $articulo_presupuestosproveedor['ArticulosPresupuestosproveedore']['descuento']; ?></td>
                                <td><?php echo $articulo_presupuestosproveedor['ArticulosPresupuestosproveedore']['neto']; ?></td>
                                <td><?php echo $articulo_presupuestosproveedor['ArticulosPresupuestosproveedore']['total']; ?></td>
                                <td class="actions">
                                    <?php echo $this->Html->link(__('Editar', true), array('controller' => 'articulos_presupuestosproveedores', 'action' => 'edit', $articulo_presupuestosproveedor['ArticulosPresupuestosproveedore']['id']), array('class' => 'popup')); ?>
                                    <?php echo $this->Html->link(__('Eliminar', true), array('controller' => 'articulos_presupuestosproveedores', 'action' => 'delete', $articulo_presupuestosproveedor['ArticulosPresupuestosproveedore']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $articulo_presupuestosproveedor['ArticulosPresupuestosproveedore']['id'])); ?>
                                </td>
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