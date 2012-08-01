<div class="pedidosproveedores">
    <h2>
        <?php __('Pedidosproveedore'); ?>
        <?php echo $this->Html->link(__('Editar', true), array('action' => 'edit', $pedidosproveedore['Pedidosproveedore']['id']), array('class' => 'button_link')); ?>
        <?php echo $this->Html->link(__('Listar', true), array('action' => 'index'), array('class' => 'button_link')); ?>
        <?php echo $this->Html->link(__('Eliminar Pedido de proveedores', true), array('action' => 'delete', $pedidosproveedore['Pedidosproveedore']['id'], $pedidosproveedore['Pedidosproveedore']['presupuestosproveedore_id']), array('class' => 'button_link'), sprintf(__('Are you sure you want to delete # %s?', true), $pedidosproveedore['Pedidosproveedore']['numero'])); ?>
    </h2>
    <table class="view">
        <tr>
            <td colspan="4">
                <span>Número</span>
                <?php echo $pedidosproveedore['Pedidosproveedore']['numero']; ?>
            </td>
        </tr>
        <tr>
            <td>
                <span>Proveedor</span>
                <?php echo $pedidosproveedore['Presupuestosproveedore']['Proveedore']['nombre']; ?>
            </td>
            <td>
                <span>Fecha</span>
                <?php echo $pedidosproveedore['Pedidosproveedore']['fecha']; ?>
            </td>
            <td>
                <span>Almacen de los Materiales</span>
                <?php echo $pedidosproveedore['Presupuestosproveedore']['Almacene']['nombre']; ?>
            </td>
            <td>
                <span>Confirmado</span>
                <?php echo!empty($pedidosproveedore['Pedidosproveedore']['confirmado']) ? 'Sí' : 'No'; ?>
            </td>
        </tr>
        <tr>
            <td colspan="4">
                <span>Observaciones</span>
                <?php $pedidosproveedore['Pedidosproveedore']['observaciones'] ?>
            </td>
        </tr>
        <tr>
            <td colspan="3">
                <span>Pedido Escaneado</span>
                <?php echo $this->Html->link(__($pedidosproveedore['Pedidosproveedore']['pedidoescaneado'], true), '/files/pedidosproveedore/' . $pedidosproveedore['Pedidosproveedore']['pedidoescaneado']); ?>
            </td>
            <td>
                <span>Fecha de Recepcion</span>
                <?php $pedidosproveedore['Pedidosproveedore']['fecharecepcion'] ?>
            </td>
        </tr>
    </table>
    <div class="related" style="margin-top: 30px">
        <h3><?php __('Artículos del Pedido a Proveedor'); ?></h3>
        <div class="actions">
            <ul>   
                <li><?php echo $this->Html->link(__('Añadir Artículo al Pedido', true), array('controller' => 'articulos_pedidosproveedores', 'action' => 'add', $pedidosproveedore['Pedidosproveedore']['id']), array('class' => 'popup')); ?> </li>
            </ul>
        </div>
        <?php if (!empty($articulos_pedidosproveedore)): ?>
            <table cellpadding = "0" cellspacing = "0">
                <tr>
                    <th><?php __('Ref'); ?></th>
                    <th><?php __('Nombre'); ?></th>
                    <th><?php __('Tarea de la Orden'); ?></th>
                    <th><?php __('Cantidad'); ?></th>
                    <th><?php __('Precio Proveedor €'); ?></th>
                    <th><?php __('Descuento %'); ?></th>
                    <th><?php __('Neto €'); ?></th>
                    <th><?php __('Total €'); ?></th>
                    <th class="actions"><?php __('Acciones'); ?></th>
                </tr>
                <?php
                if (!empty($articulos_pedidosproveedore)) {
                    $i = 0;
                    foreach ($articulos_pedidosproveedore as $articulo_pedidoproveedore):
                        $class = null;
                        if ($i++ % 2 == 0) {
                            $class = ' class="altrow"';
                        }
                        ?>
                        <tr<?php echo $class; ?>>
                            <td><?php echo $articulo_pedidoproveedore['Articulo']['ref']; ?></td>
                            <td><?php echo $articulo_pedidoproveedore['Articulo']['nombre']; ?></td>
                            <td><?php echo $articulo_pedidoproveedore['Tarea']['descripcion']; ?></td>
                            <td><?php echo $articulo_pedidoproveedore['ArticulosPedidosproveedore']['cantidad']; ?></td>
                            <td><?php echo $articulo_pedidoproveedore['ArticulosPedidosproveedore']['precio_proveedor']; ?></td>
                            <td><?php echo $articulo_pedidoproveedore['ArticulosPedidosproveedore']['descuento']; ?></td>
                            <td><?php echo $articulo_pedidoproveedore['ArticulosPedidosproveedore']['neto']; ?></td>
                            <td><?php echo $articulo_pedidoproveedore['ArticulosPedidosproveedore']['total'] ?></td>
                            <td class="actions">
                                <?php echo $this->Html->link(__('Editar', true), array('controller' => 'articulos_pedidosproveedores', 'action' => 'edit', $articulo_pedidoproveedore['ArticulosPedidosproveedore']['id']), array('class' => 'popup')); ?>
                                <?php echo $this->Html->link(__('Eliminar', true), array('controller' => 'articulos_pedidosproveedores', 'action' => 'delete', $articulo_pedidoproveedore['ArticulosPedidosproveedore']['id'], $pedidosproveedore['Pedidosproveedore']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $articulo_pedidoproveedore['ArticulosPedidosproveedore']['id'])); ?>
                            </td>
                        </tr>
                        <?php
                    endforeach;
                }
                ?>
            </table>
        <?php endif; ?>
    </div>
    <div style="clear: both">
        <div class="actions">
            <ul>   
                <li><?php echo $this->Html->link(__('Nuevo Albaran a proveedores', true), array('controller' => 'albaranesproveedores', 'action' => 'add', $pedidosproveedore['Pedidosproveedore']['id']), array('style' => 'background: -webkit-gradient(linear, left top, left bottom, from(#FFA54F), to(#EEECA9));')); ?> </li>
            </ul>
        </div>
    </div>
</div>
<div style="clear: both">
    <p style="text-align: center;"><?php echo $this->Html->link(__('Relacionados con el Presupuesto a Proveedor', true), '#', array('id' => 'show_relations', 'class' => 'button_link')); ?></p>
    <div id="relations-presupuestoproveedor" style="display: none;">
        <?php if (!empty($pedidosproveedore['Albaranesproveedore'])): ?>
            <h3 style="margin-top: 20px;"><?php __('Albaranes de Proveedor Relacionados con el Pedido a Proveedor'); ?></h3>
            <table cellpadding = "0" cellspacing = "0">
                <tr>
                    <th><?php __('Id Albaran de Proveedor'); ?></th>
                    <th><?php __('Fecha'); ?></th>
                    <th><?php __('Observaciones'); ?></th>
                    <th class="actions"><?php __('Acciones'); ?></th>
                </tr>
                <?php
                if (!empty($pedidosproveedore['Albaranesproveedore'])) {
                    $i = 0;
                    foreach ($pedidosproveedore['Albaranesproveedore'] as $albaranproveedore):
                        $class = null;
                        if ($i++ % 2 == 0) {
                            $class = ' class="altrow"';
                        }
                        ?>
                        <tr<?php echo $class; ?>>
                            <td><?php echo $albaranproveedore['id']; ?></td>
                            <td><?php echo $albaranproveedore['fecha']; ?></td>
                            <td><?php echo $albaranproveedore['observaciones']; ?></td>
                            <td class="actions">
                                <?php echo $this->Html->link(__('Ver', true), array('controller' => 'albaranesproveedores', 'action' => 'view', $albaranproveedore['id'])); ?>
                            </td>
                        </tr>
                        <?php
                    endforeach;
                }
                ?>
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
                    <td><?php echo!empty($presupuestosproveedore['Avisosrepuesto']['Centrostrabajo']['centrotrabajo']) ? $presupuestosproveedore['Avisosrepuesto']['Centrostrabajo']['centrotrabajo'] : $presupuestosproveedore['Avisosrepuesto']['Centrostrabajo']['direccion']; ?></td>
                    <td><?php echo $presupuestosproveedore['Avisosrepuesto']['Maquina']['nombre']; ?></td>
                    <td><?php echo $presupuestosproveedore['Avisosrepuesto']['observaciones']; ?></td>
                    <td><?php echo!empty($presupuestosproveedore['Avisosrepuesto']['Estadosaviso']['estado']) ? $presupuestosproveedore['Avisosrepuesto']['Estadosaviso']['estado'] : ''; ?></td>
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