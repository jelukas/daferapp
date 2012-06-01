<?php $cliente_id = null; ?>
<div class="presupuestosproveedores form">
    <?php echo $this->Form->create('Presupuestosproveedore', array('type' => 'file')); ?>
    <fieldset>
        <legend><?php __('Editar Presupuesto de Proveedor Directo ( De Almacen )'); ?></legend>
        <?php
        echo '<h3>Id de Presupuesto ' . $this->data['Presupuestosproveedore']['id'] . '</h3>';
        echo $this->Form->input('id');
        ?>
        <div class="input select required">
            <label for="PresupuestosproveedoreProveedoreId">Proveedor</label>
            <?php echo $this->Html->para(null, $this->Html->link('Proveedor ' . $this->data['Proveedore']['nombre'], array('controller' => 'proveedores', 'action' => 'view', $this->data['Proveedore']['id']))); ?>
            <?php echo $this->Form->input('proveedore_id', array('type' => 'hidden')); ?>
            <p><input id="autocomplete-proveedores" type="text" value="" /></p>
        </div>
        <?php
        echo $this->Form->input('almacene_id', array('label' => 'Almacén', 'empty' => '--- Seleccione un almacén ---'));
        echo $this->Form->input('fechaplazo', array('label' => 'Fecha', 'dateFormat' => 'DMY'));
        echo $this->Form->input('observaciones', array('label' => 'Observaciones'));
        echo $this->Form->input('confirmado', array('Confirmado'));
        echo $this->Form->input('file', array('type' => 'file', 'label' => 'Presupuesto escaneado'));
        ?>
        <div class="related">
            <h3>Artículos del Presupuesto del Proveedor</h3>
            <div class="actions">
                <ul>   
                    <li><?php echo $this->Html->link(__('Añadir Artículo', true), array('controller' => 'articulos_presupuestosproveedores', 'action' => 'add', $this->Form->value('Presupuestosproveedore.id')), array('class' => 'popup')); ?> </li>
                </ul>
            </div>
            <?php if (!empty($articulos_presupuestosproveedore)): ?>
                <table cellpadding = "0" cellspacing = "0" id="articulos-presupuestoproveedor-directo">
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
                                    <?php echo $this->Html->link(__('Eliminar', true), array('controller' => 'articulos_presupuestosproveedores', 'action' => 'delete', $articulo_presupuestosproveedor['ArticulosPresupuestosproveedore']['id'], $articulo_presupuestosproveedor['ArticulosPresupuestosproveedore']['presupuestosproveedore_id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $articulo_presupuestosproveedor['ArticulosPresupuestosproveedore']['id'])); ?>
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

    <div class="actions">
        <ul>   
            <li><?php echo $this->Html->link(__('Nuevo Pedido de Proveedor', true), array('controller' => 'pedidosproveedores', 'action' => 'add', $this->Form->value('Presupuestosproveedore.id')), array('style' => 'background: -webkit-gradient(linear, left top, left bottom, from(#FFA54F), to(#EEECA9));')); ?> </li>
        </ul>
    </div>
</div>
<div class="actions">
    <h3><?php __('Acciones'); ?></h3>
    <ul>
        <li><?php echo $this->Html->link(__('Nuevo Pedido a proveedores', true), array('controller' => 'pedidosproveedores', 'action' => 'add', $this->Form->value('Presupuestosproveedore.id')), array('style' => 'background: -webkit-gradient(linear, left top, left bottom, from(#FFA54F), to(#EEECA9));')); ?> </li>
        <li><?php echo $this->Html->link(__('Ver', true), array('action' => 'view', $this->Form->value('Presupuestosproveedore.id'))); ?></li>
        <li><?php echo $this->Html->link(__('Listar Presupuestos de proveedores', true), array('action' => 'index')); ?></li>
        <li><?php echo $this->Html->link(__('Listar Proveedores', true), array('controller' => 'proveedores', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('Nuevo Proveedor', true), array('controller' => 'proveedores', 'action' => 'add')); ?> </li>
        <li style="margin-top: 40px;"><?php echo $this->Html->link(__('Nuevo Presupuesto a Clientes', true), array('controller' => 'presupuestosclientes', 'action' => 'add')); ?></li>
    </ul>
</div>