<div class="facturasproveedores form">
    <?php echo $this->Form->create('Facturasproveedore', array('type' => 'file')); ?>
    <fieldset>
        <legend><?php __('Editar Factura de proveedor'); ?></legend>
        <?php
        echo $this->Form->input('id');
        echo $this->Form->input('fechafactura', array('label' => 'Fecha'));
        echo $this->Form->input('tiposiva_id', array('label' => 'Tipo de IVA'));
        echo $this->Form->input('observaciones', array('label' => 'Observaciones'));
        echo $this->Form->input('fechalimitepago', array('label' => 'Feche Límite de pago'));
        echo $this->Form->input('fechapagada', array('label' => 'Fecha de pago'));
        echo $this->Form->input('albaranesproveedore_id', array('type' => 'hidden'));
        echo $this->Form->input('file', array('type' => 'file', 'label' => 'Factura Escaneada'));
        ?>
        <div class="related">
            <h3><?php __('Artículos en la Factura de Proveedor ' . $this->Form->value('Facturasproveedore.id')) ?></h3>
            <div class="actions">
                <ul>   
                    <li><?php echo $this->Html->link(__('Añadir Artículo a la Factura de Proveedor', true), array('controller' => 'articulos_facturasproveedores', 'action' => 'add', $this->Form->value('Facturasproveedore.id')), array('class' => 'popup')); ?> </li>
                </ul>
            </div>
            <?php if (!empty($articulos_facturasproveedore)): ?>
                <table cellpadding = "0" cellspacing = "0">
                    <tr>
                        <th><?php __('Ref'); ?></th>
                        <th><?php __('Nombre'); ?></th>
                        <th><?php __('Cantidad'); ?></th>
                        <th><?php __('Precio Proveedor €'); ?></th>
                        <th><?php __('Descuento %'); ?></th>
                        <th><?php __('Neto €'); ?></th>
                        <th><?php __('Total €'); ?></th>
                        <th class="actions"><?php __('Acciones'); ?></th>
                    </tr>
                    <?php
                    if (!empty($articulos_facturasproveedore)) {
                        $i = 0;
                        foreach ($articulos_facturasproveedore as $articulo_facturasproveedore):
                            $class = null;
                            if ($i++ % 2 == 0) {
                                $class = ' class="altrow"';
                            }
                            ?>
                            <tr<?php echo $class; ?>>
                                <td><?php echo $articulo_facturasproveedore['Articulo']['ref']; ?></td>
                                <td><?php echo $articulo_facturasproveedore['Articulo']['nombre']; ?></td>
                                <td><?php echo $articulo_facturasproveedore['ArticulosFacturasproveedore']['cantidad']; ?></td>
                                <td><?php echo $articulo_facturasproveedore['ArticulosFacturasproveedore']['precio_proveedor']; ?></td>
                                <td><?php echo $articulo_facturasproveedore['ArticulosFacturasproveedore']['descuento']; ?></td>
                                <td><?php echo $articulo_facturasproveedore['ArticulosFacturasproveedore']['neto']; ?></td>
                                <td><?php echo $articulo_facturasproveedore['ArticulosFacturasproveedore']['total']; ?></td>
                                <td class="actions">
                                    <?php echo $this->Html->link(__('Editar', true), array('controller' => 'articulos_facturasproveedores', 'action' => 'edit', $articulo_facturasproveedore['ArticulosFacturasproveedore']['id']),array('class'=>'popup')); ?>
                                    <?php echo $this->Html->link(__('Eliminar', true), array('controller' => 'articulos_facturasproveedores', 'action' => 'delete', $articulo_facturasproveedore['ArticulosFacturasproveedore']['id']), null, sprintf(__('Seguro que quieres borrar el Artículo de la Factura de Proveedor # %s?', true), $articulo_facturasproveedore['ArticulosFacturasproveedore']['id'])); ?>
                                </td>
                            </tr>
                            <?php
                        endforeach;
                    }
                    ?>
                </table>
                <p>* Precios sin IVA</p>
            <?php endif; ?>
        </div>
    </fieldset>
    <?php echo $this->Form->end(__('Guardar', true)); ?>
</div>
<div class="actions">
    <h3><?php __('Acciones'); ?></h3>
    <ul>

        <li><?php echo $this->Html->link(__('Eliminar', true), array('action' => 'delete', $this->Form->value('Facturasproveedore.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('Facturasproveedore.id'))); ?></li>
        <li><?php echo $this->Html->link(__('Listar Facturas de proveedores', true), array('action' => 'index')); ?></li>
        <li><?php echo $this->Html->link(__('Listar Proveedores', true), array('controller' => 'proveedores', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('Nuevo Proveedor', true), array('controller' => 'proveedores', 'action' => 'add')); ?> </li>
        <li><?php echo $this->Html->link(__('Nuevo Tipo de iva', true), array('controller' => 'tiposivas', 'action' => 'add')); ?> </li>
        <li><?php echo $this->Html->link(__('Listar Albaranes de proveedores', true), array('controller' => 'albaranesproveedores', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('Nuevo Albarán de proveedor', true), array('controller' => 'albaranesproveedores', 'action' => 'add')); ?> </li>
    </ul>
</div>