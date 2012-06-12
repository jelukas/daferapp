<div class="albaranesproveedores">
    <h2>
        <?php __('Albarán de proveedor'); ?>
        <?php echo $this->Html->link(__('Editar', true), array('action' => 'edit', $albaranesproveedore['Albaranesproveedore']['id']), array('class' => 'button_link')); ?>
        <?php echo $this->Html->link(__('Listar', true), array('action' => 'index'), array('class' => 'button_link')); ?>
        <?php echo $this->Html->link(__('Eliminar Albarán de proveedores', true), array('action' => 'delete', $albaranesproveedore['Albaranesproveedore']['id']), array('class' => 'button_link'), sprintf(__('Are you sure you want to delete # %s?', true), $albaranesproveedore['Albaranesproveedore']['numero'])); ?>
    </h2>
    <table class="view">
        <tr>
            <td colspan="4">
                <span>Número</span>
                <?php echo $albaranesproveedore['Albaranesproveedore']['numero']; ?>
            </td>
        </tr>
        <tr>
            <td>
                <span>Proveedor</span>
                <?php echo $albaranesproveedore['Pedidosproveedore']['Presupuestosproveedore']['Proveedore']['nombre']; ?>
            </td>
            <td>
                <span>Fecha</span>
                <?php echo $albaranesproveedore['Albaranesproveedore']['fecha']; ?>
            </td>
            <td>
                <span>Almacen de los Materiales</span>
                <?php echo $albaranesproveedore['Pedidosproveedore']['Presupuestosproveedore']['Almacene']['nombre']; ?>
            </td>
            <td>
                <span>Confirmado</span>
                <?php echo!empty($albaranesproveedore['Albaranesproveedore']['confirmado']) ? 'Sí' : 'No'; ?>
            </td>
        </tr>
        <tr>
            <td colspan="4">
                <span>Observaciones</span>
                <?php $albaranesproveedore['Albaranesproveedore']['observaciones'] ?>
            </td>
        </tr>
        <tr>
            <td colspan="4">
                <span>Albarán Escaneado</span>
                <?php echo $this->Html->link(__($albaranesproveedore['Albaranesproveedore']['albaranescaneado'], true), '/files/albaranproveedore/' . $albaranesproveedore['Albaranesproveedore']['albaranescaneado']); ?>
            </td>
        </tr>
    </table>
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
            <li><?php echo $this->Html->link(__('Nueva Devolución', true), array('controller' => 'pedidosproveedores', 'action' => 'devolucion', $albaranesproveedore['Albaranesproveedore']['id'], $presupuestosproveedore['Presupuestosproveedore']['id']), array('style' => 'background: -webkit-gradient(linear, left top, left bottom, from(#FFA54F), to(#EEECA9));')); ?> </li>
        </ul>
    </div>
    <div style="clear: both">
        <p style="text-align: center;"><?php echo $this->Html->link(__('Relacionados con el Albarán de Proveedor', true), '#', array('id' => 'show_relations', 'class' => 'button_link')); ?></p>
        <div id="relations-presupuestoproveedor" style="display: none;">
            <?php if (!empty($albaranesproveedore['Pedidosproveedore']['id'])): ?>
                <h3 style="margin-top: 40px;"><?php __('Pedido Relacionado con el Albarán de Proveedor'); ?></h3>
                <table cellpadding = "0" cellspacing = "0">
                    <tr>
                        <th>Número</th>
                        <th>Proveedor</th>
                        <th>Almacen</th>
                        <th>Aviso de repuesto</th>
                        <th>Aviso de taller</th>
                        <th>Orden</th>
                        <th>Fecha de entrega</th>
                        <th>Observaciones</th>
                        <th>Confirmado</th>
                        <th>Pedidoescaneado</th>
                        <th class="actions"><?php __('Actions'); ?></th>
                    </tr>
                    <tr>
                        <td><?php echo $albaranesproveedore['Pedidosproveedore']['numero']; ?>&nbsp;</td>
                        <td><?php echo $this->Html->link($albaranesproveedore['Pedidosproveedore']['Presupuestosproveedore']['Proveedore']['nombre'], array('controller' => 'proveedores', 'action' => 'view', $albaranesproveedore['Pedidosproveedore']['Presupuestosproveedore']['Proveedore']['id'])); ?></td>
                        <td><?php echo $this->Html->link($albaranesproveedore['Pedidosproveedore']['Presupuestosproveedore']['Almacene']['nombre'], array('controller' => 'almacenes', 'action' => 'view', $albaranesproveedore['Pedidosproveedore']['Presupuestosproveedore']['Almacene']['id'])); ?></td>  
                        <td><?php echo $this->Html->link($albaranesproveedore['Pedidosproveedore']['Presupuestosproveedore']['avisosrepuesto_id'], array('controller' => 'avisosrepuestos', 'action' => 'view', $albaranesproveedore['Pedidosproveedore']['Presupuestosproveedore']['avisosrepuesto_id'])); ?></td>    
                        <td><?php echo $this->Html->link($albaranesproveedore['Pedidosproveedore']['Presupuestosproveedore']['avisostallere_id'], array('controller' => 'avisostalleres', 'action' => 'view', $albaranesproveedore['Pedidosproveedore']['Presupuestosproveedore']['avisostallere_id'])); ?></td>   
                        <td><?php echo $this->Html->link($albaranesproveedore['Pedidosproveedore']['Presupuestosproveedore']['ordene_id'], array('controller' => 'ordenes', 'action' => 'view', $albaranesproveedore['Pedidosproveedore']['Presupuestosproveedore']['ordene_id'])); ?></td>
                        <td><?php echo $albaranesproveedore['Pedidosproveedore']['fecharecepcion']; ?>&nbsp;</td>
                        <td><?php echo $albaranesproveedore['Pedidosproveedore']['observaciones']; ?>&nbsp;</td>
                        <td><?php echo!empty($albaranesproveedore['Pedidosproveedore']['confirmado']) ? 'Sí' : 'No'; ?></td>
                        <td><?php echo $this->Html->link(__($albaranesproveedore['Pedidosproveedore']['pedidoescaneado'], true), '/files/pedidosproveedore/' . $albaranesproveedore['Pedidosproveedore']['pedidoescaneado']); ?></td>
                        <td class="actions">
                            <?php echo $this->Html->link(__('Ver', true), array('action' => 'view', $albaranesproveedore['Pedidosproveedore']['id'])); ?>
                            <?php echo $this->Html->link(__('Pdf', true), array('action' => 'pdf', $albaranesproveedore['Pedidosproveedore']['id'])); ?>
                            <?php echo $this->Html->link(__('Eliminar', true), array('action' => 'delete', $albaranesproveedore['Pedidosproveedore']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $albaranesproveedore['Pedidosproveedore']['id'])); ?>
                        </td>
                    </tr>
                </table>
            <?php endif; ?>
            <?php if (!empty($albaranesproveedore['Pedidosproveedore']['Presupuestosproveedore']['id'])): ?>
                <h3 style="margin-top: 40px;"><?php __('Pedido Relacionado con el Albarán de Proveedor'); ?></h3>
                <table cellpadding = "0" cellspacing = "0">
                    <tr>
                        <th>Número</th>
                        <th style="min-width: 100px;">Fecha</th>
                        <th style="width: 200px;">Proveedor</th>
                        <th>Almacén</th>
                        <th>Aviso de Repuesto</th>
                        <th>Aviso de Taller</th>
                        <th>Orden</th>
                        <th style="min-width: 150px;">Plazo de Entrega</th>
                        <th>Observaciones</th>
                        <th>Estado</th>
                        <th>Presupuesto escaneado</th>
                        <th class="actions"><?php __('Acciones'); ?></th>
                    </tr>
                    <tr>
                        <td><?php echo $albaranesproveedore['Pedidosproveedore']['Presupuestosproveedore']['numero']; ?>&nbsp;</td>
                        <td><?php echo $albaranesproveedore['Pedidosproveedore']['Presupuestosproveedore']['fecha']; ?>&nbsp;</td>
                        <td><?php echo $this->Html->link($albaranesproveedore['Pedidosproveedore']['Presupuestosproveedore']['Proveedore']['nombre'], array('controller' => 'proveedores', 'action' => 'view', $albaranesproveedore['Pedidosproveedore']['Presupuestosproveedore']['Proveedore']['id'])); ?></td>
                        <td><?php echo $this->Html->link($albaranesproveedore['Pedidosproveedore']['Presupuestosproveedore']['Almacene']['nombre'], array('controller' => 'almacenes', 'action' => 'view', $albaranesproveedore['Pedidosproveedore']['Presupuestosproveedore']['Almacene']['id'])); ?></td>     
                        <td><?php echo $this->Html->link($albaranesproveedore['Pedidosproveedore']['Presupuestosproveedore']['avisosrepuesto_id'], array('controller' => 'avisosrepuestos', 'action' => 'view', $albaranesproveedore['Pedidosproveedore']['Presupuestosproveedore']['avisosrepuesto_id'])); ?></td>    
                        <td><?php echo $this->Html->link($albaranesproveedore['Pedidosproveedore']['Presupuestosproveedore']['avisostallere_id'], array('controller' => 'avisostalleres', 'action' => 'view', $albaranesproveedore['Pedidosproveedore']['Presupuestosproveedore']['avisostallere_id'])); ?></td>   
                        <td><?php echo $this->Html->link($albaranesproveedore['Pedidosproveedore']['Presupuestosproveedore']['ordene_id'], array('controller' => 'ordenes', 'action' => 'view', $albaranesproveedore['Pedidosproveedore']['Presupuestosproveedore']['ordene_id'])); ?></td>
                        <td><?php echo $albaranesproveedore['Pedidosproveedore']['Presupuestosproveedore']['fechaplazo']; ?>&nbsp;</td>
                        <td><?php echo $albaranesproveedore['Pedidosproveedore']['Presupuestosproveedore']['observaciones']; ?>&nbsp;</td>
                        <td><?php echo $albaranesproveedore['Pedidosproveedore']['Presupuestosproveedore']['confirmado']; ?>&nbsp;</td>
                        <td><?php echo $this->Html->link(__($albaranesproveedore['Pedidosproveedore']['Presupuestosproveedore']['presupuestoescaneado'], true), '/files/presupuestosproveedore/' . $albaranesproveedore['Pedidosproveedore']['Presupuestosproveedore']['presupuestoescaneado']); ?></td>
                        <td class="actions">
                            <?php echo $this->Html->link(__('Ver', true), array('action' => 'view', $albaranesproveedore['Pedidosproveedore']['Presupuestosproveedore']['id'])); ?>
                            <?php echo $this->Html->link(__('Pdf', true), array('action' => 'pdf', $albaranesproveedore['Pedidosproveedore']['Presupuestosproveedore']['id'])); ?>
                        </td>
                    </tr>
                </table>
            <?php endif; ?>
            <?php if (!empty($albaranesproveedore['Pedidosproveedore']['Presupuestosproveedore']['Ordene']['id'])): ?>
                <h3 style="margin-top: 40px;"><?php __('Orden Relacionada con el Albarán de Proveedor'); ?></h3>
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
                        <td><?php echo $albaranesproveedore['Pedidosproveedore']['Presupuestosproveedore']['Ordene']['id']; ?></td>
                        <td><?php echo $albaranesproveedore['Pedidosproveedore']['Presupuestosproveedore']['Ordene']['Avisostallere']['Cliente']['nombre']; ?></td>
                        <td><?php echo $albaranesproveedore['Pedidosproveedore']['Presupuestosproveedore']['Ordene']['fecha_prevista_reparacion']; ?></td>
                        <td><?php echo $albaranesproveedore['Pedidosproveedore']['Presupuestosproveedore']['Ordene']['observaciones']; ?></td>
                        <td><?php echo $albaranesproveedore['Pedidosproveedore']['Presupuestosproveedore']['Ordene']['avisostallere_id']; ?></td>
                        <td class="actions">
                            <?php echo $this->Html->link(__('Ver', true), array('controller' => 'ordene', 'action' => 'view', $albaranesproveedore['Pedidosproveedore']['Presupuestosproveedore']['Ordene']['id'])); ?>
                        </td>
                    </tr>
                </table>
            <?php endif; ?>
            <?php if (!empty($albaranesproveedore['Pedidosproveedore']['Presupuestosproveedore']['Avisostallere']['id'])): ?>
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
                        <td><?php echo $albaranesproveedore['Pedidosproveedore']['Presupuestosproveedore']['Avisostallere']['numero']; ?></td>
                        <td><?php echo $albaranesproveedore['Pedidosproveedore']['Presupuestosproveedore']['Avisostallere']['fechaaviso']; ?></td>
                        <td><?php echo $albaranesproveedore['Pedidosproveedore']['Presupuestosproveedore']['Avisostallere']['Cliente']['nombre']; ?></td>
                        <td><?php echo $albaranesproveedore['Pedidosproveedore']['Presupuestosproveedore']['Avisostallere']['Centrostrabajo']['centrotrabajo']; ?></td>
                        <td><?php echo $albaranesproveedore['Pedidosproveedore']['Presupuestosproveedore']['Avisostallere']['Maquina']['nombre']; ?></td>
                        <td><?php echo $albaranesproveedore['Pedidosproveedore']['Presupuestosproveedore']['Avisostallere']['observaciones']; ?></td>
                        <td><?php echo $albaranesproveedore['Pedidosproveedore']['Presupuestosproveedore']['Avisostallere']['Estadosavisostallere']['estado']; ?></td>
                        <td class="actions">
                            <?php echo $this->Html->link(__('Ver', true), array('controller' => 'avisostalleres', 'action' => 'view', $albaranesproveedore['Pedidosproveedore']['Presupuestosproveedore']['Avisostallere']['id'])); ?>
                        </td>
                    </tr>
                </table>
            <?php endif; ?>
            <?php if (!empty($albaranesproveedore['Pedidosproveedore']['Presupuestosproveedore']['Avisosrepuesto']['id'])): ?>
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
                        <td><?php echo $albaranesproveedore['Pedidosproveedore']['Presupuestosproveedore']['Avisosrepuesto']['numero']; ?></td>
                        <td><?php echo $albaranesproveedore['Pedidosproveedore']['Presupuestosproveedore']['Avisosrepuesto']['fechahora']; ?></td>
                        <td><?php echo $albaranesproveedore['Pedidosproveedore']['Presupuestosproveedore']['Avisosrepuesto']['Cliente']['nombre']; ?></td>
                        <td><?php echo!empty($albaranesproveedore['Pedidosproveedore']['Presupuestosproveedore']['Avisosrepuesto']['Centrostrabajo']['centrotrabajo']) ? $albaranesproveedore['Pedidosproveedore']['Presupuestosproveedore']['Avisosrepuesto']['Centrostrabajo']['centrotrabajo'] : $albaranesproveedore['Pedidosproveedore']['Presupuestosproveedore']['Avisosrepuesto']['Centrostrabajo']['direccion']; ?></td>
                        <td><?php echo $albaranesproveedore['Pedidosproveedore']['Presupuestosproveedore']['Avisosrepuesto']['Maquina']['nombre']; ?></td>
                        <td><?php echo $albaranesproveedore['Pedidosproveedore']['Presupuestosproveedore']['Avisosrepuesto']['observaciones']; ?></td>
                        <td><?php echo!empty($albaranesproveedore['Pedidosproveedore']['Presupuestosproveedore']['Avisosrepuesto']['Estadosaviso']['estado']) ? $albaranesproveedore['Pedidosproveedore']['Presupuestosproveedore']['Avisosrepuesto']['Estadosaviso']['estado'] : ''; ?></td>
                        <td class="actions">
                            <?php echo $this->Html->link(__('Ver', true), array('controller' => 'avisosrepuestos', 'action' => 'view', $albaranesproveedore['Pedidosproveedore']['Presupuestosproveedore']['Avisosrepuesto']['id'])); ?>
                        </td>
                    </tr>
                </table>
            <?php endif; ?>
        </div>
    </div>
</div>
<script type="text/javascript">
    $('#show_relations').click(function() {
        $('#relations-presupuestoproveedor').fadeToggle("slow", "linear");
    });
    $("dd:odd").css("background-color", "#F4F4F4"); $("dt:odd").css("background-color", "#F4F4F4");
</script>