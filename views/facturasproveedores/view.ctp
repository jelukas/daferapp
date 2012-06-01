<div class="facturasproveedores view">
    <h2><?php __('Factura de proveedor'); ?></h2>
    <dl>
        <dt><?php __('Id'); ?></dt>
        <dd>
            <?php echo $facturasproveedore['Facturasproveedore']['id']; ?>
            &nbsp;
        </dd>
        <dt><?php __('Fecha de factura'); ?></dt>
        <dd>
            <?php echo $facturasproveedore['Facturasproveedore']['fechafactura']; ?>
            &nbsp;
        </dd>
        <dt><?php __('Base imponible'); ?></dt>
        <dd>
            <?php echo $facturasproveedore['Facturasproveedore']['baseimponible']; ?>
            &nbsp;
        </dd>
        <dt><?php __('Tipo de iva'); ?></dt>
        <dd>
            <?php echo $this->Html->link($facturasproveedore['Tiposiva']['tipoiva'], array('controller' => 'tiposivas', 'action' => 'view', $facturasproveedore['Tiposiva']['id'])); ?>
            &nbsp;
        </dd>
        <dt><?php __('Observaciones'); ?></dt>
        <dd>
            <?php echo $facturasproveedore['Facturasproveedore']['observaciones']; ?>
            &nbsp;
        </dd>
        <dt><?php __('Fecha límite de pago'); ?></dt>
        <dd>
            <?php echo $facturasproveedore['Facturasproveedore']['fechalimitepago']; ?>
            &nbsp;
        </dd>
        <dt><?php __('Fecha de pago'); ?></dt>
        <dd>
            <?php echo $facturasproveedore['Facturasproveedore']['fechapagada']; ?>
            &nbsp;
        </dd>
        <dt><?php __('Factura escaneada'); ?></dt>
        <dd>
            <?php echo $facturasproveedore['Facturasproveedore']['facturaescaneada']; ?>
            &nbsp;
        </dd>
    </dl>
    <div><!-- Albaran de Proveedor -->
            <h3><?php echo $this->Html->link('Albaran a Proveedor ' . $facturasproveedore['Albaranesproveedore']['id'], array('controller' => 'albaranesproveedores', 'action' => 'view', $facturasproveedore['Albaranesproveedore']['id'])); ?></h3>
            <dl>
                <dt>Fecha</dt>
                <dd><?php echo $facturasproveedore['Albaranesproveedore']['fecha'] ?>&nbsp;</dd>
                <dt>Observaciones</dt>
                <dd><?php echo $facturasproveedore['Albaranesproveedore']['observaciones'] ?>&nbsp;</dd>
                <dt>Albarán escaneado</dt>
                <dd><?php echo $facturasproveedore['Albaranesproveedore']['albaranescaneado']; ?>&nbsp;</dd>
            </dl>
    </div>
    <div><!-- Pedido de Proveedor -->
            <h3><?php echo $this->Html->link('Pedido a Proveedor ' . $pedidosproveedore['Pedidosproveedore']['id'], array('controller' => 'pedidosproveedores', 'action' => 'view', $pedidosproveedore['Pedidosproveedore']['id'])); ?></h3>
            <dl>
                <dt>Fecha</dt>
                <dd><?php echo $pedidosproveedore['Pedidosproveedore']['fecha'] ?>&nbsp;</dd>
                <dt>Observaciones</dt>
                <dd><?php echo $pedidosproveedore['Pedidosproveedore']['observaciones'] ?>&nbsp;</dd>
                <dt>Fecha de Recepción</dt>
                <dd><?php echo $pedidosproveedore['Pedidosproveedore']['fecharecepcion'] ?>&nbsp;</dd>
            </dl>
    </div>
    <div>
        <!-- Presupuesto -->
        <h3><?php echo $this->Html->link('Presupuesto de Proveedor ' . $presupuestosproveedore['Presupuestosproveedore']['id'], array('controller' => 'presupuestosproveedores', 'action' => 'view', $presupuestosproveedore['Presupuestosproveedore']['id'])); ?></h3>
        <dl>
            <dt>Proveedor</dt>
            <dd><?php echo $presupuestosproveedore['Proveedore']['nombre'] ?>&nbsp;</dd>
            <dt>Almacén</dt>
            <dd><?php echo $presupuestosproveedore['Almacene']['nombre'] ?>&nbsp;</dd>
            <dt>Fecha Plazo</dt>
            <dd><?php echo $presupuestosproveedore['Presupuestosproveedore']['fechaplazo'] ?>&nbsp;</dd>
            <dt>Observaciones</dt>
            <dd><?php echo $presupuestosproveedore['Presupuestosproveedore']['observaciones'] ?>&nbsp;</dd>
            <dt>Pedido de Cliente Relacionado (Opcional)</dt>
            <dd><?php echo $presupuestosproveedore['Presupuestosproveedore']['pedidoscliente_id'] ?>&nbsp;</dd>
            <?php if (!empty($presupuestosproveedore['Presupuestosproveedore']['avisosrepuesto_id'])): ?>
                <dt>Aviso de Repuesto Relacionado</dt>
                <dd><?php echo $this->Html->link($presupuestosproveedore['Presupuestosproveedore']['avisosrepuesto_id'], array('controller' => 'avisosrepuestos', 'action' => 'view', $presupuestosproveedore['Presupuestosproveedore']['avisosrepuesto_id'])); ?>&nbsp;</dd>
            <?php endif; ?>
            <?php if (!empty($presupuestosproveedore['Presupuestosproveedore']['ordene_id'])): ?>
                <dt>Orden Relacionada</dt>
                <dd><?php echo $this->Html->link($presupuestosproveedore['Presupuestosproveedore']['ordene_id'], array('controller' => 'ordenes', 'action' => 'view', $presupuestosproveedore['Presupuestosproveedore']['ordene_id'])); ?>&nbsp;</dd>
            <?php endif; ?>
        </dl>
    </div>
    <div class="related">
        <h3><?php __('Artículos en la Factura de Proveedor ' . $facturasproveedore['Facturasproveedore']['id']) ?></h3>
        <div class="actions">
            <ul>   
                <li><?php echo $this->Html->link(__('Añadir Artículo a la Factura de Proveedor', true), array('controller' => 'articulos_facturasproveedores', 'action' => 'add', $facturasproveedore['Facturasproveedore']['id']), array('class' => 'popup')); ?> </li>
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
                            <td><?php echo $articulo_facturasproveedore['ArticulosFacturasproveedore']['total'] ?></td>
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
        <?php endif; ?>
    </div>
</div>
<div class="actions">
    <h3><?php __('Acciones'); ?></h3>
    <ul>
        <li><?php echo $this->Html->link(__('Editar Factura de proveedor', true), array('action' => 'edit', $facturasproveedore['Facturasproveedore']['id'])); ?> </li>
        <li><?php echo $this->Html->link(__('Eliminar Factura de proveedor', true), array('action' => 'delete', $facturasproveedore['Facturasproveedore']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $facturasproveedore['Facturasproveedore']['id'])); ?> </li>
        <li><?php echo $this->Html->link(__('Listar Facturas de proveedores', true), array('action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('Listar Albaranes de proveedores', true), array('controller' => 'albaranesproveedores', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('Descargar en Pdf', true), array('action' => 'pdf', $facturasproveedore['Facturasproveedore']['id'])); ?></li>
    </ul>
</div>
<script>$("dd:odd").css("background-color", "#F4F4F4"); $("dt:odd").css("background-color", "#F4F4F4");</script>