<?php $cliente_id = null; ?>
<div class="presupuestosproveedores view">
    <h2><?php __('Presupuesto de proveedor'); ?></h2>
    <dl>
        <dt><?php __('Id'); ?></dt>
        <dd>
            <?php echo $presupuestosproveedore['Presupuestosproveedore']['id']; ?>
        </dd>
        <?php if ($presupuestosproveedore['Avisosrepuesto']['id'] != null && $presupuestosproveedore['Avisosrepuesto']['id'] >= 0) { ?>
            <dt><?php __('Nº Aviso de repuesto'); ?></dt>
            <dd>
                <?php echo $this->Html->link($presupuestosproveedore['Avisosrepuesto']['id'], array('controller' => 'avisosrepuestos', 'action' => 'view', $presupuestosproveedore['Avisosrepuesto']['id'])); ?>
            </dd>
            <dt><?php __('Cliente'); ?></dt>
            <dd>
                <?php $cliente_id = $presupuestosproveedore['Avisosrepuesto']['Cliente']['id'] ?>
                <?php echo $presupuestosproveedore['Avisosrepuesto']['Cliente']['nombre'];
                $cliente_id = $presupuestosproveedore['Avisosrepuesto']['Cliente']['id']
                ?>&nbsp;
            </dd>
            <dt><?php __('Centro de Trabajo'); ?></dt>
            <dd>
    <?php echo $presupuestosproveedore['Avisosrepuesto']['Centrostrabajo']['centrotrabajo']; ?>&nbsp;
            </dd>
            <dt><?php __('Máquina'); ?></dt>
            <dd>
            <?php echo $presupuestosproveedore['Avisosrepuesto']['Maquina']['nombre']; ?>&nbsp;
            </dd>
            <?php
        } elseif ($presupuestosproveedore['Avisostallere']['id'] != null) {
            ?>
            <dt><?php __('Nº Aviso de taller'); ?></dt>
            <dd>
    <?php echo $this->Html->link($presupuestosproveedore['Avisostallere']['id'], array('controller' => 'avisostalleres', 'action' => 'view', $presupuestosproveedore['Avisostallere']['id'])); ?>
            </dd>
            <dt><?php __('Cliente'); ?></dt>
            <dd>
                <?php $cliente_id = $presupuestosproveedore['Avisostallere']['Cliente']['id'] ?>
    <?php echo $this->Html->link($presupuestosproveedore['Avisostallere']['Cliente']['nombre'], array('controller' => 'clientes', 'action' => 'view', $presupuestosproveedore['Avisostallere']['Cliente']['id'])) ?>&nbsp;
            </dd>
            <dt><?php __('Centro de Trabajo'); ?></dt>
            <dd>
    <?php echo $this->Html->link($presupuestosproveedore['Avisostallere']['Centrostrabajo']['centrotrabajo'], array('controller' => 'centrostrabajos', 'action' => 'view', $presupuestosproveedore['Avisostallere']['Centrostrabajo']['id'])); ?>&nbsp;
            </dd>
            <dt><?php __('Máquina'); ?></dt>
            <dd>
            <?php echo $this->Html->link($presupuestosproveedore['Avisostallere']['Maquina']['nombre'], array('controller' => 'maquinas', 'action' => 'view', $presupuestosproveedore['Avisostallere']['Maquina']['id'])); ?>&nbsp;
            </dd>
<?php } elseif ($presupuestosproveedore['Ordene']['id'] != null) { ?>
            <dt><?php __('Nº Orden'); ?></dt>
            <dd>
    <?php echo $this->Html->link($presupuestosproveedore['Ordene']['id'], array('controller' => 'ordenes', 'action' => 'view', $presupuestosproveedore['Ordene']['id'])); ?>
            </dd>
            <dt><?php __('Cliente'); ?></dt>
            <dd>
                <?php $cliente_id = $presupuestosproveedore['Ordene']['Avisostallere']['Cliente']['id'] ?>
    <?php echo $this->Html->link($presupuestosproveedore['Ordene']['Avisostallere']['Cliente']['nombre'], array('controller' => 'clientes', 'action' => 'view', $presupuestosproveedore['Ordene']['Avisostallere']['Cliente']['id'])) ?>&nbsp;
            </dd>
            <dt><?php __('Centro de Trabajo'); ?></dt>
            <dd>
    <?php echo $this->Html->link($presupuestosproveedore['Ordene']['Avisostallere']['Centrostrabajo']['centrotrabajo'], array('controller' => 'centrostrabajos', 'action' => 'view', $presupuestosproveedore['Ordene']['Avisostallere']['Centrostrabajo']['id'])); ?>&nbsp;
            </dd>
            <dt><?php __('Máquina'); ?></dt>
            <dd>
            <?php echo $this->Html->link($presupuestosproveedore['Ordene']['Avisostallere']['Maquina']['nombre'], array('controller' => 'maquinas', 'action' => 'view', $presupuestosproveedore['Ordene']['Avisostallere']['Maquina']['id'])); ?>&nbsp;
            </dd>
<?php } ?>
        <dt><?php __('Proveedor'); ?></dt>
        <dd>
<?php echo $this->Html->link($presupuestosproveedore['Proveedore']['id'] . ' --- ' . $presupuestosproveedore['Proveedore']['nombre'], array('controller' => 'proveedores', 'action' => 'view', $presupuestosproveedore['Proveedore']['id'])); ?>&nbsp;
        </dd>
        <dt><?php __('Almacén'); ?></dt>
        <dd>
<?php echo $this->Html->link($presupuestosproveedore['Almacene']['nombre'], array('controller' => 'almacenes', 'action' => 'view', $presupuestosproveedore['Almacene']['id'])); ?>
        </dd>
        <dt><?php __('Fecha de plazo'); ?></dt>
        <dd>
<?php echo $presupuestosproveedore['Presupuestosproveedore']['fechaplazo']; ?>&nbsp;
        </dd>
        <dt><?php __('Observaciones'); ?></dt>
        <dd>
<?php echo $presupuestosproveedore['Presupuestosproveedore']['observaciones']; ?>&nbsp;
        </dd>
        <dt><?php __('Confirmado'); ?></dt>
        <dd>
<?php echo $presupuestosproveedore['Presupuestosproveedore']['confirmado']; ?>&nbsp;
        </dd>
        <dt><?php __('Presupuesto escaneado'); ?></dt>
        <dd>
<?php echo $presupuestosproveedore['Presupuestosproveedore']['presupuestoescaneado']; ?>&nbsp;
        </dd>
    </dl>
    <h3 style="margin-top: 20px;"><?php __('Artículos para el Presupuesto de Proveedor'); ?></h3>
    <div class="actions">
        <ul>   
            <li><?php echo $this->Html->link(__('Añadir Artículo', true), array('controller' => 'articulos_presupuestosproveedores', 'action' => 'add', $presupuestosproveedore['Presupuestosproveedore']['id']), array('class' => 'popup')); ?> </li>
        </ul>
    </div>
    <div style="clear:both;"></div>
<?php if (!empty($articulos_presupuestosproveedore)): ?>
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
            if (!empty($articulos_presupuestosproveedore)) {
                $i = 0;
                foreach ($articulos_presupuestosproveedore as $articulo_presupuestosproveedor):
                    $class = null;
                    if ($i++ % 2 == 0) {
                        $class = ' class="altrow"';
                    }
                    ?>
                    <tr<?php echo $class; ?>>
                        <td><?php echo $articulo_presupuestosproveedor['Articulo']['ref']; ?></td>
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
                endforeach;
            }
            ?>
        </table>
    <?php endif; ?>
    <h3 style="margin-top: 20px;"><?php __('Pedidos relacionados con el Presupuesto de Proveedor'); ?></h3>
<?php if (!empty($presupuestosproveedore['Pedidosproveedore'])): ?>
        <table cellpadding = "0" cellspacing = "0">
            <tr>
                <th><?php __('Id Pedido Proveedor'); ?></th>
                <th><?php __('Fecha'); ?></th>
                <th><?php __('Fecha Recepción'); ?></th>
                <th><?php __('Observaciones'); ?></th>
                <th class="actions"><?php __('Acciones'); ?></th>
            </tr>
            <?php
            if (!empty($presupuestosproveedore['Pedidosproveedore'])) {
                $i = 0;
                foreach ($presupuestosproveedore['Pedidosproveedore'] as $pedidosproveedore):
                    $class = null;
                    if ($i++ % 2 == 0) {
                        $class = ' class="altrow"';
                    }
                    ?>
                    <tr<?php echo $class; ?>>
                        <td><?php echo $pedidosproveedore['id']; ?></td>
                        <td><?php echo $pedidosproveedore['fecha']; ?></td>
                        <td><?php echo $pedidosproveedore['fecharecepcion']; ?></td>
                        <td><?php echo $pedidosproveedore['observaciones']; ?></td>
                        <td class="actions">
                            <?php echo $this->Html->link(__('Ver', true), array('controller' => 'pedidosproveedores', 'action' => 'view', $pedidosproveedore['id'], $presupuestosproveedore['Presupuestosproveedore']['id'])); ?>
            <?php echo $this->Html->link(__('Eliminar', true), array('controller' => 'pedidosproveedores', 'action' => 'delete', $pedidosproveedore['id'], $presupuestosproveedore['Presupuestosproveedore']['id']), null, sprintf(__('Seguro que queires borrar el Pedido a Proveedor # %s CUIDADO: Esto borrarra tambien los Albaranes Relacionados!!?', true), $pedidosproveedore['id'])); ?>
                        </td>
                    </tr>
                    <?php
                endforeach;
            }
            ?>
        </table>
<?php endif; ?>
    <div class="actions">
        <ul>   
            <li><?php echo $this->Html->link(__('Nuevo Pedido a proveedores', true), array('controller' => 'pedidosproveedores', 'action' => 'add', $presupuestosproveedore['Presupuestosproveedore']['id']), array('style' => 'background: -webkit-gradient(linear, left top, left bottom, from(#FFA54F), to(#EEECA9));')); ?> </li>
            <li><?php echo $this->Html->link(__('Nuevo Presupuesto a Clientes', true), array('controller' => 'presupuestosclientes', 'action' => 'add', 'presupuestosproveedore', $presupuestosproveedore['Presupuestosproveedore']['id'], $cliente_id), array('style' => 'background: -webkit-gradient(linear, left top, left bottom, from(#FFA54F), to(#EEECA9));')); ?></li>
        </ul>
    </div>
</div>
<div class="actions">
    <h3><?php __('Acciones'); ?></h3>
    <ul>    
<?php if (!empty($presupuestosproveedore['Avisosrepuesto']['id'])): ?>
            <li><?php echo $this->Html->link(__('Volver a Avisos de Repuestos', true), array('controller' => 'avisosrepuestos', 'action' => 'index')); ?> </li>
            <li><?php echo $this->Html->link(__('Editar Aviso de Repuestos', true), array('controller' => 'avisosrepuestos', 'action' => 'edit', $presupuestosproveedore['Avisosrepuesto']['id'])); ?> </li>
<?php elseif (!empty($presupuestosproveedore['Avisostallere']['id'])): ?>
            <li><?php echo $this->Html->link(__('Volver a Avisos de Taller', true), array('controller' => 'avisostalleres', 'action' => 'index')); ?> </li>
            <li><?php echo $this->Html->link(__('Editar Aviso de Taller', true), array('controller' => 'avisostalleres', 'action' => 'edit', $presupuestosproveedore['Avisostallere']['id'])); ?> </li>
<?php endif; ?>
        <li><a href="#?">Buscar Presupuestos *</a></li>
        <h3><?php __('Compras'); ?></h3>
        <li><?php echo $this->Html->link(__('Nuevo Presupuesto Directo de Proveedores', true), array('controller' => 'presupuestosproveedores', 'action' => 'add')); ?> </li>
        <li><?php echo $this->Html->link(__('Nuevo Pedido a proveedores', true), array('controller' => 'pedidosproveedores', 'action' => 'add', $presupuestosproveedore['Presupuestosproveedore']['id']), array('style' => 'background: -webkit-gradient(linear, left top, left bottom, from(#FFA54F), to(#EEECA9));')); ?> </li>
        <h3><?php __('Ventas'); ?></h3>
        <li><?php echo $this->Html->link(__('Nuevo Presupuesto a Clientes', true), array('controller' => 'presupuestosclientes', 'action' => 'add', 'presupuestosproveedore', $presupuestosproveedore['Presupuestosproveedore']['id'], $cliente_id)); ?></li>
        <h3><?php __('Acciones'); ?></h3>
        <li><?php echo $this->Html->link(__('Editar Presupuesto a proveedor', true), array('action' => 'edit', $presupuestosproveedore['Presupuestosproveedore']['id'])); ?> </li>
        <li><?php echo $this->Html->link(__('Borrar Presupuestos a proveedor', true), array('action' => 'delete', $presupuestosproveedore['Presupuestosproveedore']['id'])); ?> </li>
        <li><?php echo $this->Html->link(__('Listar Presupuestos a proveedores', true), array('action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('Nuevo Presupuesto a proveedor', true), array('action' => 'add')); ?> </li>
        <h3><?php __('Maestros'); ?></h3>
        <li><?php echo $this->Html->link(__('Listar Proveedores', true), array('controller' => 'proveedores', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('Nuevo Proveedor', true), array('controller' => 'proveedores', 'action' => 'add')); ?> </li>
    </ul>
</div>
<script>$("dd:odd").css("background-color", "#F4F4F4"); $("dt:odd").css("background-color", "#F4F4F4");</script>