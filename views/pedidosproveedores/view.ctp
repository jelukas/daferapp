<div class="pedidosproveedores">
    <h2>
        <?php __('Pedidos a Proveedores'); ?>
        <?php echo $this->Html->link(__('Editar', true), array('action' => 'edit', $pedidosproveedore['Pedidosproveedore']['id']), array('class' => 'button_link')); ?>
        <?php echo $this->Html->link(__('Listar', true), array('action' => 'index'), array('class' => 'button_link')); ?>
        <?php echo $this->Html->link(__('Eliminar Pedido a Proveedor', true), array('action' => 'delete', $pedidosproveedore['Pedidosproveedore']['id'], $pedidosproveedore['Pedidosproveedore']['presupuestosproveedore_id']), array('class' => 'button_link'), sprintf(__('Seguro que quieres borrar el pedido a proveedor nº # %s?', true), $pedidosproveedore['Pedidosproveedore']['numero'])); ?>
    </h2>
    <table class="view">
        <tr>
            <td colspan="2">
                <span>Número</span>
                <?php echo $pedidosproveedore['Pedidosproveedore']['numero']; ?>
            </td>
            <td colspan="2">
                <span>Estado</span>
                <?php echo $pedidosproveedore['Estadospedidosproveedore']['estado']; ?>
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
        <tr>
            <td>
                <span>Transportista</span>
                <?php echo $pedidosproveedore['Transportista']['nombre'] ?>
            </td>
            <td>
                <span>Nº Expedición</span>
                <?php echo $pedidosproveedore['Pedidosproveedore']['numero_expedicion'] ?>
            </td>
            <td>
                <span>Tipo de Envio</span>
                <?php echo $pedidosproveedore['Pedidosproveedore']['tipo_envio'] ?>
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
        <?php if (!empty($pedidosproveedore['ArticulosPedidosproveedore'])): ?>
            <?php $total = 0; ?>
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
                $i = 0;
                foreach ($pedidosproveedore['ArticulosPedidosproveedore'] as $articulo_pedidoproveedore):
                    $class = null;
                    if ($i++ % 2 == 0) {
                        $class = ' class="altrow"';
                    }
                    ?>
                    <tr<?php echo $class; ?>>
                        <td><?php echo $articulo_pedidoproveedore['Articulo']['ref']; ?></td>
                        <td><?php echo $articulo_pedidoproveedore['Articulo']['nombre']; ?></td>
                        <td><?php echo !empty($articulo_pedidoproveedore['Tarea'])?$articulo_pedidoproveedore['Tarea']['descripcion']:'No relacionado con Tarea de Orden'; ?></td>
                        <td><?php echo $articulo_pedidoproveedore['cantidad']; ?></td>
                        <td><?php echo redondear_dos_decimal($articulo_pedidoproveedore['precio_proveedor']); ?></td>
                        <td><?php echo redondear_dos_decimal($articulo_pedidoproveedore['descuento']); ?></td>
                        <td><?php echo redondear_dos_decimal($articulo_pedidoproveedore['neto']); ?></td>
                        <td><?php echo redondear_dos_decimal($articulo_pedidoproveedore['total']); ?></td>
                        <?php $total += $articulo_pedidoproveedore['total']; ?>
                        <td class="actions">
                            <?php echo $this->Html->link(__('Editar', true), array('controller' => 'articulos_pedidosproveedores', 'action' => 'edit', $articulo_pedidoproveedore['id']), array('class' => 'popup')); ?>
                            <?php echo $this->Html->link(__('Eliminar', true), array('controller' => 'articulos_pedidosproveedores', 'action' => 'delete', $articulo_pedidoproveedore['id'], $pedidosproveedore['Pedidosproveedore']['id']), null, sprintf(__('Seguro que quieres borrar el Articulo # %s?', true), $articulo_pedidoproveedore['Articulo']['ref'])); ?>
                        </td>
                    </tr>
                    <?php
                endforeach;
                ?>
                <tr>
                    <td colspan="6"></td>
                    <td><span style="font-weight: bold">Base Imponible</span></td>
                    <td><?php echo redondear_dos_decimal($total) ?> &euro;</td>
                    <td>
                        <span style="font-weight: bold">Impuestos</span>
                        <?php echo redondear_dos_decimal($total * ($pedidosproveedore['Presupuestosproveedore']['Proveedore']['Tiposiva']['porcentaje_aplicable'] / 100)) ?> &euro;
                    </td>
                </tr>
                <tr>
                    <td colspan="7"></td>
                    <td style="text-align: center">
                        <span style="font-weight: bold">Total Pedido</span>
                        <?php echo redondear_dos_decimal($total + ($total * ($pedidosproveedore['Presupuestosproveedore']['Proveedore']['Tiposiva']['porcentaje_aplicable'] / 100))) ?> &euro;
                    </td>
                </tr>
            </table>
        <?php endif; ?>
    </div>
    <div style="margin: 20px">
        <?php echo $this->Html->link(__('Nuevo Albaran a proveedores', true), array('controller' => 'albaranesproveedores', 'action' => 'add', $pedidosproveedore['Pedidosproveedore']['id']), array('class' => 'button_link', 'style' => 'background: -webkit-gradient(linear, left top, left bottom, from(#FFA54F), to(#EEECA9));')); ?> 
        <?php echo $this->Html->link(__('Imprimir', true), 'javascript:window.print(); void 0;', array('class' => 'button_link')); ?>
    </div>
    <div class="datagrid">
        <table>
            <caption>Documentos Relacionados</caption>
            <thead>
                <tr><th>Tipo Documento</th><th>Número</th><th>Fecha</th><th>Cliente / Proveedor</th><th>Ver</th></tr>
            </thead>
            <tfoot>
                <tr><td colspan="5"></td></tr>
            </tfoot>
            <tbody>
                <?php
                $i = 0;
                if (!empty($pedidosproveedore['Presupuestosproveedore']['Avisostallere']['id'])):
                    $class = null;
                    $i++;
                    if ($i % 2 == 0)
                        $class = ' class="alt"';
                    ?>
                    <tr <?php echo $class ?>>
                        <td>Aviso de Taller</td>
                        <td><?php echo $pedidosproveedore['Presupuestosproveedore']['Avisostallere']['numero'] ?></td>
                        <td><?php echo!empty($pedidosproveedore['Presupuestosproveedore']['Avisostallere']['fechaaviso']) ? $this->Time->format('d-m-Y', $pedidosproveedore['Presupuestosproveedore']['Avisostallere']['fechaaviso']) : '' ?></td>
                        <td><?php echo $pedidosproveedore['Presupuestosproveedore']['Avisostallere']['Cliente']['nombre'] ?></td>
                        <td><?php echo $this->Html->link('Ver', array('controller' => 'avisostalleres', 'action' => 'view', $pedidosproveedore['Presupuestosproveedore']['Avisostallere']['id']), array('class' => 'button_brownie')) ?></td>
                    </tr>
                <?php endif; ?>
                <?php
                if (!empty($pedidosproveedore['Presupuestosproveedore']['Avisosrepuesto']['id'])):
                    $class = null;
                    $i++;
                    if ($i % 2 == 0)
                        $class = ' class="alt"';
                    ?>
                    <tr <?php echo $class ?>>
                        <td>Aviso de Repuestos</td>
                        <td><?php echo $pedidosproveedore['Presupuestosproveedore']['Avisosrepuesto']['numero'] ?></td>
                        <td><?php echo!empty($pedidosproveedore['Presupuestosproveedore']['Avisosrepuesto']['fechahora']) ? $this->Time->format('d-m-Y', $pedidosproveedore['Presupuestosproveedore']['Avisosrepuesto']['fechahora']) : '' ?></td>
                        <td><?php echo $pedidosproveedore['Presupuestosproveedore']['Avisosrepuesto']['Cliente']['nombre'] ?></td>
                        <td><?php echo $this->Html->link('Ver', array('controller' => 'avisosrepuestos', 'action' => 'view', $pedidosproveedore['Presupuestosproveedore']['Avisosrepuesto']['id']), array('class' => 'button_brownie')) ?></td>
                    </tr>
                <?php endif; ?>
                <?php
                if (!empty($pedidosproveedore['Presupuestosproveedore']['Ordene']['id'])):
                    $class = null;
                    $i++;
                    if ($i % 2 == 0)
                        $class = ' class="alt"';
                    ?>
                    <tr <?php echo $class ?>>
                        <td>Orden</td>
                        <td><?php echo $pedidosproveedore['Presupuestosproveedore']['Ordene']['numero'] ?></td>
                        <td><?php echo!empty($pedidosproveedore['Presupuestosproveedore']['Ordene']['fecha']) ? $this->Time->format('d-m-Y', $pedidosproveedore['Presupuestosproveedore']['Ordene']['fecha']) : '' ?></td>
                        <td><?php echo $pedidosproveedore['Presupuestosproveedore']['Ordene']['Avisostallere']['Cliente']['nombre'] ?></td>
                        <td><?php echo $this->Html->link('Ver', array('controller' => 'ordenes', 'action' => 'view', $pedidosproveedore['Presupuestosproveedore']['Ordene']['id']), array('class' => 'button_brownie')) ?></td>
                    </tr>
                <?php endif; ?>
                <?php
                if (!empty($pedidosproveedore['Presupuestosproveedore']['Pedidoscliente']['id'])):
                    $class = null;
                    $i++;
                    if ($i % 2 == 0)
                        $class = ' class="alt"';
                    ?>
                    <tr <?php echo $class ?>>
                        <td>Pedido de Cliente</td>
                        <td><?php echo $pedidosproveedore['Presupuestosproveedore']['Pedidoscliente']['numero'] ?></td>
                        <td><?php echo!empty($pedidosproveedore['Presupuestosproveedore']['Pedidoscliente']['fecha']) ? $this->Time->format('d-m-Y', $pedidosproveedore['Presupuestosproveedore']['Pedidoscliente']['fecha']) : '' ?></td>
                        <td><?php echo $pedidosproveedore['Presupuestosproveedore']['Pedidoscliente']['Presupuestoscliente']['Cliente']['nombre'] ?></td>
                        <td><?php echo $this->Html->link('Ver', array('controller' => 'pedidosclientes', 'action' => 'view', $pedidosproveedore['Presupuestosproveedore']['Pedidoscliente']['id']), array('class' => 'button_brownie')) ?></td>
                    </tr>
                <?php endif; ?>
                <?php
                foreach ($pedidosproveedore['Albaranesproveedore'] as $albaranesproveedore):
                    $class = null;
                    $i++;
                    if ($i % 2 == 0)
                        $class = ' class="alt"';
                    ?>
                    <tr <?php echo $class ?>>
                        <td>Alabarán de Proveedor</td>
                        <td><?php echo $albaranesproveedore['numero'] ?></td>
                        <td><?php echo!empty($albaranesproveedore['fecha']) ? $this->Time->format('d-m-Y', $albaranesproveedore['fecha']) : '' ?></td>
                        <td><?php echo $albaranesproveedore['Proveedore']['nombre'] ?></td>
                        <td><?php echo $this->Html->link('Ver', array('controller' => 'albaranesproveedores', 'action' => 'view', $albaranesproveedore['id']), array('class' => 'button_brownie')) ?></td>
                    </tr>
                <?php endforeach; ?>
                <?php
                foreach ($pedidosproveedore['Presupuestosproveedore']['Presupuestoscliente'] as $presupuestoscliente):
                    $class = null;
                    $i++;
                    if ($i % 2 == 0)
                        $class = ' class="alt"';
                    ?>
                    <tr <?php echo $class ?>>
                        <td>Prespupuesto a Cliente</td>
                        <td><?php echo $presupuestoscliente['numero'] ?></td>
                        <td><?php echo!empty($presupuestoscliente['fecha']) ? $this->Time->format('d-m-Y', $presupuestoscliente['fecha']) : '' ?></td>
                        <td><?php echo $presupuestoscliente['Cliente']['nombre'] ?></td>
                        <td><?php echo $this->Html->link('Ver', array('controller' => 'presupuestosclientes', 'action' => 'view', $presupuestoscliente['id']), array('class' => 'button_brownie')) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<script type="text/javascript">
    $('#show_relations').click(function() {
        $('#relations-presupuestoproveedor').fadeToggle("slow", "linear");
    });
    $("dd:odd").css("background-color", "#F4F4F4"); $("dt:odd").css("background-color", "#F4F4F4");
</script>