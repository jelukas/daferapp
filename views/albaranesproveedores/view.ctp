<div class="albaranesproveedores">
    <h2>
        <?php __('Albarán de proveedor'); ?>
        <?php echo $this->Html->link(__('Editar', true), array('action' => 'edit', $albaranesproveedore['Albaranesproveedore']['id']), array('class' => 'button_link')); ?>
        <?php echo $this->Html->link(__('Listar', true), array('action' => 'index'), array('class' => 'button_link')); ?>
        <?php echo $this->Html->link(__('Eliminar Albarán de proveedores', true), array('action' => 'delete', $albaranesproveedore['Albaranesproveedore']['id']), array('class' => 'button_link'), sprintf(__('Are you sure you want to delete # %s?', true), $albaranesproveedore['Albaranesproveedore']['numero'])); ?>
    </h2>
    <table class="view">
        <tr>
            <td colspan="2">
                <span>Número</span>
                <?php echo $albaranesproveedore['Albaranesproveedore']['numero']; ?>
            </td>
            <td colspan="2">
                <span>Estado</span>
                <?php echo $albaranesproveedore['Estadosalbaranesproveedore']['estado']; ?>
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
            <td colspan="2">
                <span>Base Imponible</span>
                <?php echo redondear_dos_decimal($albaranesproveedore['Albaranesproveedore']['baseimponible']) ?> &euro;
            </td>
            <td>
                <span>Nº Albarán Proporcionado</span>
                <?php echo $albaranesproveedore['Albaranesproveedore']['numero_albaran_proporcionado'] ?> 
            </td>
            <td>
                <span>Centro de Coste</span>
                <?php echo @$albaranesproveedore['Centrosdecoste']['codigo'] . ' -- ' . @$albaranesproveedore['Centrosdecoste']['denominacion'] ?> 
            </td>
        </tr>
        <tr>
            <td colspan="4">
                <span>Observaciones</span>
                <?php echo $albaranesproveedore['Albaranesproveedore']['observaciones'] ?>
            </td>
        </tr>
        <tr>
            <td colspan="3">
                <span>Albarán Escaneado</span>
                <?php echo $this->Html->link(__($albaranesproveedore['Albaranesproveedore']['albaranescaneado'], true), '/files/albaranproveedore/' . $albaranesproveedore['Albaranesproveedore']['albaranescaneado']); ?>
            </td>
            <td>
                <span>Forma de Pago</span>
                <?php echo!empty($albaranesproveedore['Proveedore']['Formapago']) ? $albaranesproveedore['Proveedore']['Formapago']['nombre'] : 'No tiene forma de pago establecida' ?>
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
                    <th><?php __('Tarea de la Orden'); ?></th>
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
                    $total = 0;
                    foreach ($articulos_albaranesproveedore as $articulo_albaranesproveedore):
                        $class = null;
                        if ($i++ % 2 == 0) {
                            $class = ' class="altrow"';
                        }
                        ?>
                        <tr<?php echo $class; ?>>
                            <td><?php echo $articulo_albaranesproveedore['Articulo']['ref']; ?></td>
                            <td><?php echo $articulo_albaranesproveedore['Articulo']['nombre']; ?></td>
                            <td><?php echo $articulo_albaranesproveedore['Tarea']['descripcion']; ?></td>
                            <td><?php echo $articulo_albaranesproveedore['ArticulosAlbaranesproveedore']['cantidad']; ?></td>
                            <td><?php echo redondear_dos_decimal($articulo_albaranesproveedore['ArticulosAlbaranesproveedore']['precio_proveedor']); ?></td>
                            <td><?php echo redondear_dos_decimal($articulo_albaranesproveedore['ArticulosAlbaranesproveedore']['descuento']); ?></td>
                            <td><?php echo redondear_dos_decimal($articulo_albaranesproveedore['ArticulosAlbaranesproveedore']['neto']); ?></td>
                            <td><?php echo redondear_dos_decimal($articulo_albaranesproveedore['ArticulosAlbaranesproveedore']['total']) ?></td>
                            <?php $total += $articulo_albaranesproveedore['ArticulosAlbaranesproveedore']['total']; ?>
                            <td class="actions">
                                <?php echo $this->Html->link(__('Editar', true), array('controller' => 'articulos_albaranesproveedores', 'action' => 'edit', $articulo_albaranesproveedore['ArticulosAlbaranesproveedore']['id']), array('class' => 'popup')); ?>
                                <?php echo $this->Html->link(__('Eliminar', true), array('controller' => 'articulos_albaranesproveedores', 'action' => 'delete', $articulo_albaranesproveedore['ArticulosAlbaranesproveedore']['id']), null, sprintf(__('Seguro que quieres borrar el Artículo del Albarán # %s?', true), $articulo_albaranesproveedore['ArticulosAlbaranesproveedore']['id'])); ?>
                            </td>
                        </tr>
                        <?php
                    endforeach;
                }
                ?>
                <tr>
                    <td colspan="6"></td>
                    <td><span style="font-weight: bold">Base Imponible</span></td>
                    <td><?php echo redondear_dos_decimal($total) ?> &euro;</td>
                    <td>
                        <span style="font-weight: bold">Impuestos</span>
                        <?php echo redondear_dos_decimal($total * ($albaranesproveedore['Pedidosproveedore']['Presupuestosproveedore']['Proveedore']['Tiposiva']['porcentaje_aplicable'] / 100)) ?> &euro;
                    </td>
                </tr>
                <tr>
                    <td colspan="7"></td>
                    <td style="text-align: center">
                        <span style="font-weight: bold">Total Albarán</span>
                        <?php echo redondear_dos_decimal($total + ($total * ($albaranesproveedore['Pedidosproveedore']['Presupuestosproveedore']['Proveedore']['Tiposiva']['porcentaje_aplicable'] / 100))) ?> &euro;
                    </td>
                </tr>
            </table>
        <?php endif; ?>
    </div>
    <div style="clear: both"></div>
    <div style="margin: 20px;">
        <?php echo $this->Html->link(__('Nueva Devolución', true), array('controller' => 'pedidosproveedores', 'action' => 'devolucion', $albaranesproveedore['Albaranesproveedore']['id'], $presupuestosproveedore['Presupuestosproveedore']['id']), array('class' => 'button_link', 'style' => 'background: -webkit-gradient(linear, left top, left bottom, from(#FFA54F), to(#EEECA9));')); ?>
        <?php if (!empty($presupuestosproveedore['Presupuestosproveedore']['ordene_id'])): ?>
            <?php echo $this->Html->link(__('Imputar a Orden', true), array('controller' => 'ordenes', 'action' => 'imputar_albaranproveedor', $albaranesproveedore['Albaranesproveedore']['id']), array('class' => 'button_link', 'style' => 'background: -webkit-gradient(linear, left top, left bottom, from(#FFA54F), to(#EEECA9));')); ?>
        <?php endif; ?>
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
                if (!empty($albaranesproveedore['Pedidosproveedore']['id']) && empty($albaranesproveedore['Pedidosproveedore']['albaranproveedoredevolucion_id'])):
                    $class = null;
                    $i++;
                    if ($i % 2 == 0)
                        $class = ' class="alt"';
                    ?>
                    <tr <?php echo $class ?>>
                        <td>Pedido de Proveedor</td>
                        <td><?php echo $albaranesproveedore['Pedidosproveedore']['numero'] ?></td>
                        <td><?php echo!empty($albaranesproveedore['Pedidosproveedore']['fecha']) ? $this->Time->format('d-m-Y', $albaranesproveedore['Pedidosproveedore']['fecha']) : '' ?></td>
                        <td><?php echo $albaranesproveedore['Pedidosproveedore']['Presupuestosproveedore']['Proveedore']['nombre'] ?></td>
                        <td><?php echo $this->Html->link('Ver', array('controller' => 'pedidosproveedores', 'action' => 'view', $albaranesproveedore['Pedidosproveedore']['id']), array('class' => 'button_brownie')) ?></td>
                    </tr>
                <?php endif; ?>
                <?php
                if (!empty($albaranesproveedore['Pedidosproveedore']['id']) && !empty($albaranesproveedore['Pedidosproveedore']['albaranproveedoredevolucion_id'])):
                    $class = null;
                    $i++;
                    if ($i % 2 == 0)
                        $class = ' class="alt"';
                    ?>
                    <tr <?php echo $class ?>>
                        <td>Devolución</td>
                        <td><?php echo $albaranesproveedore['Pedidosproveedore']['numero'] ?></td>
                        <td><?php echo!empty($albaranesproveedore['Pedidosproveedore']['fecha']) ? $this->Time->format('d-m-Y', $albaranesproveedore['Pedidosproveedore']['fecha']) : '' ?></td>
                        <td><?php echo $albaranesproveedore['Pedidosproveedore']['Presupuestosproveedore']['Proveedore']['nombre'] ?></td>
                        <td><?php echo $this->Html->link('Ver', array('controller' => 'pedidosproveedores', 'action' => 'view', $albaranesproveedore['Pedidosproveedore']['id']), array('class' => 'button_brownie')) ?></td>
                    </tr>
                <?php endif; ?>
                <?php
                if (!empty($albaranesproveedore['Pedidosproveedore']['Presupuestosproveedore']['Avisostallere']['id'])):
                    $class = null;
                    $i++;
                    if ($i % 2 == 0)
                        $class = ' class="alt"';
                    ?>
                    <tr <?php echo $class ?>>
                        <td>Aviso de Taller</td>
                        <td><?php echo $albaranesproveedore['Pedidosproveedore']['Presupuestosproveedore']['Avisostallere']['numero'] ?></td>
                        <td><?php echo!empty($albaranesproveedore['Pedidosproveedore']['Presupuestosproveedore']['Avisostallere']['fechaaviso']) ? $this->Time->format('d-m-Y', $albaranesproveedore['Pedidosproveedore']['Presupuestosproveedore']['Avisostallere']['fechaaviso']) : '' ?></td>
                        <td><?php echo $albaranesproveedore['Pedidosproveedore']['Presupuestosproveedore']['Avisostallere']['Cliente']['nombre'] ?></td>
                        <td><?php echo $this->Html->link('Ver', array('controller' => 'avisostalleres', 'action' => 'view', $albaranesproveedore['Pedidosproveedore']['Presupuestosproveedore']['Avisostallere']['id']), array('class' => 'button_brownie')) ?></td>
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
                        <td><?php echo $albaranesproveedore['Pedidosproveedore']['Presupuestosproveedore']['Avisosrepuesto']['numero'] ?></td>
                        <td><?php echo!empty($albaranesproveedore['Pedidosproveedore']['Presupuestosproveedore']['Avisosrepuesto']['fechahora']) ? $this->Time->format('d-m-Y', $albaranesproveedore['Pedidosproveedore']['Presupuestosproveedore']['Avisosrepuesto']['fechahora']) : '' ?></td>
                        <td><?php echo $albaranesproveedore['Pedidosproveedore']['Presupuestosproveedore']['Avisosrepuesto']['Cliente']['nombre'] ?></td>
                        <td><?php echo $this->Html->link('Ver', array('controller' => 'avisosrepuestos', 'action' => 'view', $albaranesproveedore['Pedidosproveedore']['Presupuestosproveedore']['Avisosrepuesto']['id']), array('class' => 'button_brownie')) ?></td>
                    </tr>
                <?php endif; ?>
                <?php
                if (!empty($albaranesproveedore['Pedidosproveedore']['Presupuestosproveedore']['id'])):
                    $class = null;
                    $i++;
                    if ($i % 2 == 0)
                        $class = ' class="alt"';
                    ?>
                    <tr <?php echo $class ?>>
                        <td>Presupuesto de Proveedorr</td>
                        <td><?php echo $albaranesproveedore['Pedidosproveedore']['Presupuestosproveedore']['numero'] ?></td>
                        <td><?php echo!empty($albaranesproveedore['Pedidosproveedore']['Presupuestosproveedore']['fecha']) ? $this->Time->format('d-m-Y', $albaranesproveedore['Pedidosproveedore']['Presupuestosproveedore']['fecha']) : '' ?></td>
                        <td><?php echo $albaranesproveedore['Pedidosproveedore']['Presupuestosproveedore']['Proveedore']['nombre'] ?></td>
                        <td><?php echo $this->Html->link('Ver', array('controller' => 'presupuestosproveedores', 'action' => 'view', $albaranesproveedore['Pedidosproveedore']['Presupuestosproveedore']['id']), array('class' => 'button_brownie')) ?></td>
                    </tr>
                <?php endif; ?>
                <?php
                if (!empty($albaranesproveedore['Pedidosproveedore']['Presupuestosproveedore']['Ordene']['id'])):
                    $class = null;
                    $i++;
                    if ($i % 2 == 0)
                        $class = ' class="alt"';
                    ?>
                    <tr <?php echo $class ?>>
                        <td>Orden</td>
                        <td><?php echo $albaranesproveedore['Pedidosproveedore']['Presupuestosproveedore']['Ordene']['numero'] ?></td>
                        <td><?php echo!empty($albaranesproveedore['Pedidosproveedore']['Presupuestosproveedore']['Ordene']['fecha']) ? $this->Time->format('d-m-Y', $albaranesproveedore['Pedidosproveedore']['Presupuestosproveedore']['Ordene']['fecha']) : '' ?></td>
                        <td><?php echo $albaranesproveedore['Pedidosproveedore']['Presupuestosproveedore']['Ordene']['Avisostallere']['Cliente']['nombre'] ?></td>
                        <td><?php echo $this->Html->link('Ver', array('controller' => 'ordenes', 'action' => 'view', $albaranesproveedore['Pedidosproveedore']['Presupuestosproveedore']['Ordene']['id']), array('class' => 'button_brownie')) ?></td>
                    </tr>
                <?php endif; ?>
                <?php
                if (!empty($albaranesproveedore['Pedidosproveedore']['Presupuestosproveedore']['Pedidoscliente']['id'])):
                    $class = null;
                    $i++;
                    if ($i % 2 == 0)
                        $class = ' class="alt"';
                    ?>
                    <tr <?php echo $class ?>>
                        <td>Pedido de Cliente</td>
                        <td><?php echo $albaranesproveedore['Pedidosproveedore']['Presupuestosproveedore']['Pedidoscliente']['numero'] ?></td>
                        <td><?php echo!empty($albaranesproveedore['Pedidosproveedore']['Presupuestosproveedore']['Pedidoscliente']['fecha']) ? $this->Time->format('d-m-Y', $albaranesproveedore['Pedidosproveedore']['Presupuestosproveedore']['Pedidoscliente']['fecha']) : '' ?></td>
                        <td><?php echo $albaranesproveedore['Pedidosproveedore']['Presupuestosproveedore']['Pedidoscliente']['Presupuestoscliente']['Cliente']['nombre'] ?></td>
                        <td><?php echo $this->Html->link('Ver', array('controller' => 'pedidosclientes', 'action' => 'view', $albaranesproveedore['Pedidosproveedore']['Presupuestosproveedore']['Pedidoscliente']['id']), array('class' => 'button_brownie')) ?></td>
                    </tr>
                <?php endif; ?>

                <?php
                if (!empty($albaranesproveedore['Facturasproveedore']['id'])):
                    $class = null;
                    $i++;
                    if ($i % 2 == 0)
                        $class = ' class="alt"';
                    ?>
                    <tr <?php echo $class ?>>
                        <td>Factura de Proveedor</td>
                        <td><?php echo $albaranesproveedore['Facturasproveedore']['numero'] ?></td>
                        <td><?php echo!empty($albaranesproveedore['Facturasproveedore']['fechafactura']) ? $this->Time->format('d-m-Y', $albaranesproveedore['Facturasproveedore']['fechafactura']) : '' ?></td>
                        <td><?php echo $albaranesproveedore['Proveedore']['nombre'] ?></td>
                        <td><?php echo $this->Html->link('Ver', array('controller' => 'facturasproveedores', 'action' => 'view', $albaranesproveedore['Facturasproveedore']['id']), array('class' => 'button_brownie')) ?></td>
                    </tr>
                <?php endif; ?>
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