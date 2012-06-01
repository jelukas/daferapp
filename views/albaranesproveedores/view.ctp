<div class="albaranesproveedores view">
    <h2><?php __('Albarán de proveedor'); ?></h2>
    <dl>
        <dt><?php __('Id'); ?></dt>
        <dd>
            <?php echo $albaranesproveedore['Albaranesproveedore']['id']; ?>
            &nbsp;
        </dd>
        <dt><?php __('Pedido proveedor'); ?></dt>
        <dd>
            <?php echo $this->Html->link($albaranesproveedore['Pedidosproveedore']['id'], array('controller' => 'pedidosproveedores', 'action' => 'view', $albaranesproveedore['Pedidosproveedore']['id'])); ?>
            &nbsp;
        </dd>
        <dt><?php __('Fecha'); ?></dt>
        <dd>
            <?php echo $albaranesproveedore['Albaranesproveedore']['fecha']; ?>
            &nbsp;
        </dd>
        <dt><?php __('Observaciones'); ?></dt>
        <dd>
            <?php echo $albaranesproveedore['Albaranesproveedore']['observaciones']; ?>
            &nbsp;
        </dd>
        <dt><?php __('Albarán Escaneado'); ?></dt>
        <dd>
            <?php echo $albaranesproveedore['Albaranesproveedore']['albaranescaneado']; ?>
            &nbsp;
        </dd>
    </dl>
    <div>
        <!-- Pedido -->
        <h3><?php echo $this->Html->link('Pedido a Proveedor ' . $albaranesproveedore['Pedidosproveedore']['id'], array('controller' => 'pedidosproveedores', 'action' => 'view', $albaranesproveedore['Pedidosproveedore']['id'])); ?></h3>
        <dl>
            <dt>Fecha</dt>
            <dd><?php echo $albaranesproveedore['Pedidosproveedore']['fecha'] ?>&nbsp;</dd>
            <dt>Observaciones</dt>
            <dd><?php echo $albaranesproveedore['Pedidosproveedore']['observaciones'] ?>&nbsp;</dd>
            <dt>Fecha de Recepción</dt>
            <dd><?php echo $albaranesproveedore['Pedidosproveedore']['fecharecepcion'] ?>&nbsp;</dd>
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
    <div class="related" style="margin-top: 30px">
        <h3><?php __('Artículos del Albarán a Proveedor'); ?></h3>
        <div class="actions">
            <ul>   
                <li><?php echo $this->Html->link(__('Añadir Artículo al Albaran', true), array('controller' => 'articulos_albaranesproveedores', 'action' => 'add', $albaranesproveedore['Albaranesproveedore']['id']), array('class' => 'popup')); ?> </li>
            </ul>
        </div>
        <?php if (!empty($articulos_albaranesproveedore)): ?>
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
                if (!empty($articulos_albaranesproveedore)) {
                    $i = 0;
                    foreach ($articulos_albaranesproveedore as $articulo_albaranesproveedore):
                        $class = null;
                        if ($i++ % 2 == 0) {
                            $class = ' class="altrow"';
                        }
                        ?>
                        <tr<?php echo $class; ?>>
                            <td><?php echo $articulo_albaranesproveedore['Articulo']['ref']; ?></td>
                            <td><?php echo $articulo_albaranesproveedore['Articulo']['nombre']; ?></td>
                            <td><?php echo $articulo_albaranesproveedore['ArticulosAlbaranesproveedore']['cantidad']; ?></td>
                            <td><?php echo $articulo_albaranesproveedore['ArticulosAlbaranesproveedore']['precio_proveedor']; ?></td>
                            <td><?php echo $articulo_albaranesproveedore['ArticulosAlbaranesproveedore']['descuento']; ?></td>
                            <td><?php echo $articulo_albaranesproveedore['ArticulosAlbaranesproveedore']['neto']; ?></td>
                            <td><?php echo $articulo_albaranesproveedore['ArticulosAlbaranesproveedore']['total'] ?></td>
                            <td class="actions">
                                            <?php echo $this->Html->link(__('Editar', true), array('controller' => 'articulos_albaranesproveedores', 'action' => 'edit', $articulo_albaranesproveedore['ArticulosAlbaranesproveedore']['id']), array('class' => 'popup')); ?>
                                <?php echo $this->Html->link(__('Eliminar', true), array('controller' => 'articulos_albaranesproveedores', 'action' => 'delete', $articulo_albaranesproveedore['ArticulosAlbaranesproveedore']['id']), null, sprintf(__('Seguro que quieres borrar el Artículo del Albarán # %s?', true), $articulo_albaranesproveedore['ArticulosAlbaranesproveedore']['id'])); ?>
                            </td>
                        </tr>
                        <?php
                    endforeach;
                }
                ?>
            </table>
        <?php endif; ?>
    </div>
    <div class="actions">
        <ul>   
            <li><?php echo $this->Html->link(__('Nueva Factura de Proveedores', true), array('controller' => 'facturasproveedores', 'action' => 'add', $albaranesproveedore['Albaranesproveedore']['id']), array('style' => 'background: -webkit-gradient(linear, left top, left bottom, from(#FFA54F), to(#EEECA9));')); ?> </li>
        </ul>
        <ul>   
            <li><?php echo $this->Html->link(__('Nueva Devolución', true), array('controller' => 'pedidosproveedores', 'action' => 'devolucion', $albaranesproveedore['Albaranesproveedore']['id'],$presupuestosproveedore['Presupuestosproveedore']['id']), array('style' => 'background: -webkit-gradient(linear, left top, left bottom, from(#FFA54F), to(#EEECA9));')); ?> </li>
        </ul>
    </div>
</div>
<div class="actions">
    <h3><?php __('Accciones'); ?></h3>
    <ul>
        <li><?php echo $this->Html->link(__('Editar Albarán de proveedor', true), array('action' => 'edit', $albaranesproveedore['Albaranesproveedore']['id'])); ?> </li>
        <li><?php echo $this->Html->link(__('Eliminar Albarán de proveedor', true), array('action' => 'delete', $albaranesproveedore['Albaranesproveedore']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $albaranesproveedore['Albaranesproveedore']['id'])); ?> </li>
        <li><?php echo $this->Html->link(__('Listar Albarán de proveedor', true), array('action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('Nuevo Albarán de proveedor', true), array('action' => 'add')); ?> </li>
        <li><?php echo $this->Html->link(__('Listar Pedidos de proveedores', true), array('controller' => 'pedidosproveedores', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('Nuevo Pedido de proveedor', true), array('controller' => 'pedidosproveedores', 'action' => 'add')); ?> </li>
        <li><?php echo $this->Html->link(__('Listar Facturas de proveedores', true), array('controller' => 'facturasproveedores', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('Nueva Factura de proveedor', true), array('controller' => 'facturasproveedores', 'action' => 'add')); ?> </li>
    </ul>
</div>
<script>$("dd:odd").css("background-color", "#F4F4F4"); $("dt:odd").css("background-color", "#F4F4F4");</script>