<div class="facturasproveedores form">
    <?php echo $this->Form->create('Facturasproveedore', array('type' => 'file')); ?>
    <fieldset>
        <legend><?php __('Añadir Factura de proveedor desde el Pedido ' . $albaranesproveedore_id); ?></legend>
        <?php
        echo $this->Form->input('fechafactura', array('label' => 'Fecha'));
        echo $this->Form->input('albaranesproveedore_id', array('type' => 'hidden', 'value' => $albaranesproveedore_id));
        echo $this->Form->input('tiposiva_id', array('label' => 'Tipo de IVA'));
        echo $this->Form->input('observaciones', array('label' => 'Observaciones'));
        echo $this->Form->input('fechalimitepago', array('label' => 'Feche Límite de pago'));
        echo $this->Form->input('fechapagada', array('label' => 'Fecha de pago'));
        echo $this->Form->input('file', array('type' => 'file', 'label' => 'Factura Escaneada'));
        ?>
        <div class="related" style="margin-top: 30px">
            <h3><?php __('Validar Artículos para la Factura de Proveedor'); ?></h3>
            <?php if (!empty($albaranesproveedore['ArticulosAlbaranesproveedore'])): ?>
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
                    if (!empty($albaranesproveedore['ArticulosAlbaranesproveedore'])) {
                        $i = 0;
                        $j = 0;
                        foreach ($albaranesproveedore['ArticulosAlbaranesproveedore'] as $articulo_albaranesproveedore):
                            $class = null;
                            if ($i++ % 2 == 0) {
                                $class = ' class="altrow"';
                            }
                            ?>
                            <tr<?php echo $class; ?>>
                                <td><?php echo $articulo_albaranesproveedore['Articulo']['ref']; ?></td>
                                <td><?php echo $articulo_albaranesproveedore['Articulo']['nombre']; ?></td>
                                <td><?php echo $articulo_albaranesproveedore['cantidad']; ?></td>
                                <td><?php echo $articulo_albaranesproveedore['precio_proveedor']; ?></td>
                                <td><?php echo $articulo_albaranesproveedore['descuento']; ?></td>
                                <td><?php echo $articulo_albaranesproveedore['neto']; ?></td>
                                <td><?php echo $articulo_albaranesproveedore['total']; ?></td>
                                <td><?php echo $this->Form->input('ArticulosAlbaranesproveedore.' . $i . '.id', array('label' => 'Validar', 'type' => 'checkbox', 'checked' => true, 'value' => $articulo_albaranesproveedore['id'])) ?></td>
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
<div class="actions">
    <h3><?php __('Acciones'); ?></h3>
    <ul>
        <li><?php echo $this->Html->link(__('Listar Facturas de proveedores', true), array('action' => 'index')); ?></li>
        <li><?php echo $this->Html->link(__('Listar Albaranes de Proveedores', true), array('controller' => 'albaranesproveedores', 'action' => 'index')); ?> </li>
    </ul>
</div>