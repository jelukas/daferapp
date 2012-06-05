<?php $cliente_id = null; ?>
<div class="presupuestosproveedores">
    <h2>
        <?php __('Presupuesto de proveedor Nº ' . $presupuestosproveedore['Presupuestosproveedore']['numero']); ?>
        <?php echo $this->Html->link(__('Editar', true), array('action' => 'edit', $presupuestosproveedore['Presupuestosproveedore']['id']), array('class' => 'button_link')); ?>
        <?php echo $this->Html->link(__('Listar', true), array('action' => 'index'), array('class' => 'button_link')); ?>
        <?php echo $this->Html->link(__('Nuevo (Directo)', true), array('action' => 'add'), array('class' => 'button_link')); ?>
    </h2>  
    <table class="view">
        <tr>
            <td>
                <span>Número</span>
                <?php echo $presupuestosproveedore['Presupuestosproveedore']['numero']; ?>
            </td>
        </tr>
        <tr>
            <td>
                <span>Proveedor</span>
                <?php echo $this->Html->link($presupuestosproveedore['Proveedore']['id'] . ' --- ' . $presupuestosproveedore['Proveedore']['nombre'], array('controller' => 'proveedores', 'action' => 'view', $presupuestosproveedore['Proveedore']['id'])); ?>
            </td>
            <td>
                <span>Fecha</span>
                <?php echo $presupuestosproveedore['Presupuestosproveedore']['fecha']; ?>
            </td>
            <td>
                <span>Almacén de los Materiales</span>
                <?php echo $this->Html->link($presupuestosproveedore['Almacene']['nombre'], array('controller' => 'almacenes', 'action' => 'view', $presupuestosproveedore['Almacene']['id'])); ?>
            </td>
            <td>
                <span>Confirmado</span>
                <?php echo!empty($presupuestosproveedore['Presupuestosproveedore']['confirmado']) ? 'Sí' : 'No'; ?>
            </td>
        </tr>
        <tr>
            <td colspan="4">
                <span>Observaciones</span>
                <?php echo $presupuestosproveedore['Presupuestosproveedore']['observaciones']; ?>
            </td>
        </tr>
        <tr>
            <td colspan="3">
                <span>Presupuesto Escaneado</span>
                <?php echo $this->Html->link(__($presupuestosproveedore['Presupuestosproveedore']['presupuestoescaneado'], true), '/files/presupuestosproveedore/' . $presupuestosproveedore['Presupuestosproveedore']['presupuestoescaneado']); ?>
            </td>
            <td>
                <span>Plazo de Entrega</span>
                <?php echo $presupuestosproveedore['Presupuestosproveedore']['fechaplazo']; ?>
            </td>
        </tr>
    </table>
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
    <?php
    if ($presupuestosproveedore['Avisosrepuesto']['id'] != null && $presupuestosproveedore['Avisosrepuesto']['id'] >= 0) {
        $cliente_id = $presupuestosproveedore['Avisosrepuesto']['Cliente']['id'];
    } elseif ($presupuestosproveedore['Avisostallere']['id'] != null) {
        $cliente_id = $presupuestosproveedore['Avisostallere']['Cliente']['id'];
    } elseif ($presupuestosproveedore['Ordene']['id'] != null) {
        $cliente_id = $presupuestosproveedore['Ordene']['Avisostallere']['Cliente']['id'];
    } elseif ($presupuestosproveedore['Pedidoscliente']['id'] != null) {
        $cliente_id = $presupuestosproveedore['Pedidoscliente']['Presupuestoscliente']['cliente_id'];
    }
    ?>
    <div style="margin-bottom: 40px; text-align: center;">
        <?php echo $this->Html->link(__('Nuevo Pedido a proveedores', true), array('controller' => 'pedidosproveedores', 'action' => 'add', $presupuestosproveedore['Presupuestosproveedore']['id']), array('class' => 'button_link', 'style' => 'background: -webkit-gradient(linear, left top, left bottom, from(#FFA54F), to(#EEECA9));')); ?>
        <?php echo $this->Html->link(__('Nuevo Presupuesto a Clientes', true), array('controller' => 'presupuestosclientes', 'action' => 'add', 'presupuestosproveedore', $presupuestosproveedore['Presupuestosproveedore']['id'], $cliente_id), array('class' => 'button_link', 'style' => 'background: -webkit-gradient(linear, left top, left bottom, from(#FFA54F), to(#EEECA9));')); ?>
    </div>
</div>
<div>
    <p style="text-align: center;"><?php echo $this->Html->link(__('Relacionados con el Presupuesto a Proveedor', true), '#', array('id' => 'show_relations', 'class' => 'button_link')); ?></p>
    <div id="relations-presupuestoproveedor" style="display: none;">
        <?php if (!empty($presupuestosproveedore['Pedidosproveedore'])): ?>
            <h3 style="margin-top: 40px;"><?php __('Pedidos de Proveedor relacionados con el Presupuesto de Proveedor'); ?></h3>
            <table cellpadding = "0" cellspacing = "0">
                <tr>
                    <th><?php __('Id Pedido Proveedor'); ?></th>
                    <th><?php __('Fecha'); ?></th>
                    <th><?php __('Fecha Recepción'); ?></th>
                    <th><?php __('Observaciones'); ?></th>
                    <th class="actions"><?php __('Acciones'); ?></th>
                </tr>
                <?php
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
                <?php endforeach; ?>
            </table>
        <?php endif; ?>
        <?php if (!empty($presupuestosproveedore['Ordene']['id'])): ?>
            <h3 style="margin-top: 40px;"><?php __('Orden Relacionada con el Presupuesto de Proveedor'); ?></h3>
            <table cellpadding = "0" cellspacing = "0">
                <tr>
                    <th><?php __('Id Orden'); ?></th>
                    <th><?php __('Cliente'); ?></th>
                    <th><?php __('Fecha Prevista de Reparación'); ?></th>
                    <th><?php __('Observaciones'); ?></th>
                    <th><?php __('Aviso de Taller'); ?></th>
                    <th class="actions"><?php __('Acciones'); ?></th>
                </tr>
                    <tr>
                        <td><?php echo $presupuestosproveedore['Ordene']['id']; ?></td>
                        <td><?php echo $presupuestosproveedore['Ordene']['Avisostallere']['Cliente']['nombre']; ?></td>
                        <td><?php echo $presupuestosproveedore['Ordene']['fecha_prevista_reparacion']; ?></td>
                        <td><?php echo $presupuestosproveedore['Ordene']['observaciones']; ?></td>
                        <td><?php echo $presupuestosproveedore['Ordene']['avisostallere_id']; ?></td>
                        <td class="actions">
                            <?php echo $this->Html->link(__('Ver', true), array('controller' => 'ordene', 'action' => 'view', $presupuestosproveedore['Ordene']['id'])); ?>
                        </td>
                    </tr>
            </table>
        <?php endif; ?>
        <?php if (!empty($presupuestosproveedore['Avisostallere']['id'])): ?>
            <h3 style="margin-top: 40px;"><?php __('Aviso de Taller Relacionado con el Presupuesto de Proveedor'); ?></h3>
            <table cellpadding = "0" cellspacing = "0">
                <tr>
                    <th><?php __('Nº'); ?></th>
                    <th><?php __('Fecha'); ?></th>
                    <th><?php __('Cliente'); ?></th>
                    <th><?php __('Centro de Trabajo'); ?></th>
                    <th><?php __('Maquina'); ?></th>
                    <th><?php __('Observaciones'); ?></th>
                    <th><?php __('Estados Aviso'); ?></th>
                    <th class="actions"><?php __('Acciones'); ?></th>
                </tr>
                    <tr>
                        <td><?php echo $presupuestosproveedore['Avisostallere']['numero']; ?></td>
                        <td><?php echo $presupuestosproveedore['Avisostallere']['fechaaviso']; ?></td>
                        <td><?php echo $presupuestosproveedore['Avisostallere']['Cliente']['nombre']; ?></td>
                        <td><?php echo $presupuestosproveedore['Avisostallere']['Centrostrabajo']['centrotrabajo']; ?></td>
                        <td><?php echo $presupuestosproveedore['Avisostallere']['Maquina']['nombre']; ?></td>
                        <td><?php echo $presupuestosproveedore['Avisostallere']['observaciones']; ?></td>
                        <td><?php echo $presupuestosproveedore['Avisostallere']['Estadosavisostallere']['estado']; ?></td>
                        <td class="actions">
                            <?php echo $this->Html->link(__('Ver', true), array('controller' => 'avisostalleres', 'action' => 'view', $presupuestosproveedore['Avisostallere']['id'])); ?>
                        </td>
                    </tr>
            </table>
        <?php endif; ?>
        <?php if (!empty($presupuestosproveedore['Avisosrepuesto']['id'])): ?>
            <h3 style="margin-top: 40px;"><?php __('Aviso de Repuestos Relacionado con el Presupuesto de Proveedor'); ?></h3>
            <table cellpadding = "0" cellspacing = "0">
                <tr>
                    <th><?php __('Nº'); ?></th>
                    <th><?php __('Fecha'); ?></th>
                    <th><?php __('Cliente'); ?></th>
                    <th><?php __('Centro de Trabajo'); ?></th>
                    <th><?php __('Maquina'); ?></th>
                    <th><?php __('Observaciones'); ?></th>
                    <th><?php __('Estados Aviso'); ?></th>
                    <th class="actions"><?php __('Acciones'); ?></th>
                </tr>
                    <tr>
                        <td><?php echo $presupuestosproveedore['Avisosrepuesto']['numero']; ?></td>
                        <td><?php echo $presupuestosproveedore['Avisosrepuesto']['fechahora']; ?></td>
                        <td><?php echo $presupuestosproveedore['Avisosrepuesto']['Cliente']['nombre']; ?></td>
                        <td><?php echo !empty($presupuestosproveedore['Avisosrepuesto']['Centrostrabajo']['centrotrabajo'])?$presupuestosproveedore['Avisosrepuesto']['Centrostrabajo']['centrotrabajo']:$presupuestosproveedore['Avisosrepuesto']['Centrostrabajo']['direccion']; ?></td>
                        <td><?php echo $presupuestosproveedore['Avisosrepuesto']['Maquina']['nombre']; ?></td>
                        <td><?php echo $presupuestosproveedore['Avisosrepuesto']['observaciones']; ?></td>
                        <td><?php echo !empty($presupuestosproveedore['Avisosrepuesto']['Estadosaviso']['estado'])? $presupuestosproveedore['Avisosrepuesto']['Estadosaviso']['estado'] : ''; ?></td>
                        <td class="actions">
                            <?php echo $this->Html->link(__('Ver', true), array('controller' => 'avisosrepuestos', 'action' => 'view', $presupuestosproveedore['Avisosrepuesto']['id'])); ?>
                        </td>
                    </tr>
            </table>
        <?php endif; ?>
    </div>
</div>
<script type="text/javascript">
    $('#show_relations').click(function() {
        $('#relations-presupuestoproveedor').fadeToggle("slow", "linear");
    });
    $("dd:odd").css("background-color", "#F4F4F4"); $("dt:odd").css("background-color", "#F4F4F4");
</script>