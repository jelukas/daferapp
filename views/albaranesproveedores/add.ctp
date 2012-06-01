<div class="albaranesproveedores form">
    <?php echo $this->Form->create('Albaranesproveedore', array('type' => 'file')); ?>
    <fieldset>
        <legend><?php __('Nuevo Albaran de proveedor'); ?></legend>
        <?php
        echo $this->Form->input('pedidosproveedore_id', array('label' => 'Pedido de proveedor', 'type' => 'text', 'value' => $pedidosproveedore_id, 'disabled' => 'true'));
        echo $this->Form->input('pedidosproveedore_id', array('type' => 'hidden', 'value' => $pedidosproveedore_id));
        echo $this->Form->input('fecha', array('label' => 'Fecha'));
        echo $this->Form->input('observaciones', array('label' => 'Observaciones'));
        echo $this->Form->input('file', array('type' => 'file', 'label' => 'Albarán escaneado'));
        ?>
        <div class="related" style="margin-top: 30px">
            <h3><?php __('Artículos del Albarán a Proveedor'); ?></h3>
            <?php if (!empty($pedidosproveedore['ArticulosPedidosproveedore'])): ?>
                <table cellpadding = "0" cellspacing = "0">
                    <tr>
                        <th><?php __('Ref'); ?></th>
                        <th><?php __('Nombre'); ?></th>
                        <th><?php __('Cantidad'); ?></th>
                        <th><?php __('Precio Proveedor €'); ?></th>
                        <th><?php __('Descuento %'); ?></th>
                        <th><?php __('Neto €'); ?></th>
                        <th><?php __('Total €'); ?></th>
                        <th><?php __('Validar'); ?></th>
                    </tr>
                    <?php
                    if (!empty($pedidosproveedore['ArticulosPedidosproveedore'])) {
                        $i = 0;
                        $j = 0;
                        foreach ($pedidosproveedore['ArticulosPedidosproveedore'] as $articulo_pedidosproveedore):
                            $class = null;
                            if ($i++ % 2 == 0) {
                                $class = ' class="altrow"';
                            }
                            ?>
                            <tr<?php echo $class; ?>>
                                <td><?php echo $articulo_pedidosproveedore['Articulo']['ref']; ?></td>
                                <td><?php echo $articulo_pedidosproveedore['Articulo']['nombre']; ?></td>
                                <td><?php echo $articulo_pedidosproveedore['cantidad']; ?></td>
                                <td><?php echo $articulo_pedidosproveedore['precio_proveedor']; ?></td>
                                <td><?php echo $articulo_pedidosproveedore['descuento']; ?></td>
                                <td><?php echo $articulo_pedidosproveedore['neto']; ?></td>
                                <td><?php echo $articulo_pedidosproveedore['total']; ?></td>
                                <td><?php echo $this->Form->input('ArticulosPedidosproveedore.' . $i . '.id', array('label' => 'Validar', 'type' => 'checkbox', 'checked' => true, 'value' => $articulo_pedidosproveedore['id'])) ?></td>
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
    <?php echo $this->Form->end(__('Nuevo', true)); ?>
</div>
<div class="actions">
    <h3><?php __('Acciones'); ?></h3>
    <ul>

        <li><?php echo $this->Html->link(__('Listar Albaranes', true), array('action' => 'index')); ?></li>
        <li><?php echo $this->Html->link(__('Listar Pedidos de proveedores', true), array('controller' => 'pedidosproveedores', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('Nuevo Pedido de proveedor', true), array('controller' => 'pedidosproveedores', 'action' => 'add')); ?> </li>
        <li><?php echo $this->Html->link(__('Listar Facturas de proveedores', true), array('controller' => 'facturasproveedores', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('Nueva Factura de proveedor', true), array('controller' => 'facturasproveedores', 'action' => 'add')); ?> </li>
    </ul>
</div>