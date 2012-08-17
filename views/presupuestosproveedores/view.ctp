<?php $cliente_id = null; ?>
<div class="presupuestosproveedores">
    <h2>
        <?php __('Presupuesto de proveedor Nº ' . $presupuestosproveedore['Presupuestosproveedore']['numero']); ?>
        <?php echo $this->Html->link(__('Editar', true), array('action' => 'edit', $presupuestosproveedore['Presupuestosproveedore']['id']), array('class' => 'button_link')); ?>
        <?php echo $this->Html->link(__('Eliminar', true), array('action' => 'delete', $presupuestosproveedore['Presupuestosproveedore']['id']), array('class' => 'button_link'), sprintf(__('¿Seguro que quieres borrar el Presupuesto de Proveedore Nº # %s?', true), $presupuestosproveedore['Presupuestosproveedore']['numero'])); ?> 
        <?php echo $this->Html->link(__('Listar', true), array('action' => 'index'), array('class' => 'button_link')); ?>
        <?php echo $this->Html->link(__('Nuevo (Directo)', true), array('action' => 'add'), array('class' => 'button_link')); ?>
    </h2>  
    <table class="view">
        <tr>
            <td>
                <span>Número</span>
                <?php echo $presupuestosproveedore['Presupuestosproveedore']['numero']; ?>
            </td>
            <?php if (!empty($presupuestosproveedore['Presupuestosproveedore']['avisosrepuesto_id'])): ?>
                <td>
                    <span>Número Aviso Repuesto</span>
                    <?php echo $this->Html->link($presupuestosproveedore['Avisosrepuesto']['numero'], array('controller' => 'avisosrepuestos', 'action' => 'view', $presupuestosproveedore['Avisosrepuesto']['id'])); ?>
                </td>
            <?php endif; ?>
            <?php if (!empty($presupuestosproveedore['Presupuestosproveedore']['ordene_id'])): ?>
                <td>
                    <span>Número Aviso de Taller</span>
                    <?php echo $this->Html->link($presupuestosproveedore['Ordene']['Avisostallere']['numero'], array('controller' => 'avisostalleres', 'action' => 'view', $presupuestosproveedore['Ordene']['Avisostallere']['id'])); ?>
                </td>
                <td>
                    <span>Número de Orden</span>
                    <?php echo $this->Html->link($presupuestosproveedore['Ordene']['numero'], array('controller' => 'ordenes', 'action' => 'view', $presupuestosproveedore['Ordene']['id'])); ?>
                </td>
            <?php endif; ?>
            <?php if (!empty($presupuestosproveedore['Presupuestosproveedore']['avisostallere_id'])): ?>
                <td>
                    <span>Número Aviso de Taller</span>
                    <?php echo $this->Html->link($presupuestosproveedore['Avisostallere']['numero'], array('controller' => 'avisostalleres', 'action' => 'view', $presupuestosproveedore['Avisostallere']['id'])); ?>
                </td>
            <?php endif; ?>
        </tr>
        <tr>
            <td>
                <span>Proveedor</span>
                <?php echo $this->Html->link($presupuestosproveedore['Proveedore']['id'] . ' --- ' . $presupuestosproveedore['Proveedore']['nombre'], array('controller' => 'proveedores', 'action' => 'view', $presupuestosproveedore['Proveedore']['id'])); ?>
            </td>
            <td colspan="2">
                <span>Fecha</span>
                <?php echo $presupuestosproveedore['Presupuestosproveedore']['fecha']; ?>
            </td>
            <td>
                <span>Almacén de los Materiales</span>
                <?php echo $this->Html->link($presupuestosproveedore['Almacene']['nombre'], array('controller' => 'almacenes', 'action' => 'view', $presupuestosproveedore['Almacene']['id'])); ?>
            </td>
        </tr>
        <tr>
            <td colspan="4">
                <span>Observaciones</span>
                <?php echo $presupuestosproveedore['Presupuestosproveedore']['observaciones']; ?>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <span>Presupuesto Escaneado</span>
                <?php echo $this->Html->link(__($presupuestosproveedore['Presupuestosproveedore']['presupuestoescaneado'], true), '/files/presupuestosproveedore/' . $presupuestosproveedore['Presupuestosproveedore']['presupuestoescaneado']); ?>
            </td>
            <td>
                <span>Estado del Presupuesto</span>
                <?php echo $presupuestosproveedore['Estadospresupuestosproveedore']['estado']; ?>
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
                        <td><?php echo $articulo_presupuestosproveedor['Tarea']['descripcion']; ?></td>
                        <td><?php echo $articulo_presupuestosproveedor['ArticulosPresupuestosproveedore']['cantidad']; ?></td>
                        <td><?php echo $articulo_presupuestosproveedor['ArticulosPresupuestosproveedore']['precio_proveedor']; ?></td>
                        <td><?php echo $articulo_presupuestosproveedor['ArticulosPresupuestosproveedore']['descuento']; ?></td>
                        <td><?php echo $articulo_presupuestosproveedor['ArticulosPresupuestosproveedore']['neto']; ?></td>
                        <td><?php echo $articulo_presupuestosproveedor['ArticulosPresupuestosproveedore']['total']; ?></td>
                        <?php $total +=$articulo_presupuestosproveedor['ArticulosPresupuestosproveedore']['total']; ?>
                        <td class="actions">
                            <?php echo $this->Html->link(__('Editar', true), array('controller' => 'articulos_presupuestosproveedores', 'action' => 'edit', $articulo_presupuestosproveedor['ArticulosPresupuestosproveedore']['id']), array('class' => 'popup')); ?>
                            <?php echo $this->Html->link(__('Eliminar', true), array('controller' => 'articulos_presupuestosproveedores', 'action' => 'delete', $articulo_presupuestosproveedor['ArticulosPresupuestosproveedore']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $articulo_presupuestosproveedor['ArticulosPresupuestosproveedore']['id'])); ?>
                        </td>
                    </tr>
                    <?php
                endforeach;
            }
            ?>
            <tr>
                <td colspan="6"></td>
                <td><span style="font-weight: bold">Base Imponible</span></td>
                <td><?php echo $total ?> &euro;</td>
                <td>
                    <span style="font-weight: bold">Impuestos</span>
                    <?php echo $total * ($presupuestosproveedore['Proveedore']['Tiposiva']['porcentaje_aplicable'] / 100) ?> &euro;
                </td>
            </tr>
            <tr>
                <td colspan="8"></td>
                <td>
                    <span style="font-weight: bold">Total Presupuesto</span>
                    <?php echo $total + ($total * ($presupuestosproveedore['Proveedore']['Tiposiva']['porcentaje_aplicable'] / 100)) ?> &euro;
                </td>
            </tr>
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
                if (!empty($presupuestosproveedore['Avisostallere']['id'])):
                    $class = null;
                    $i++;
                    if ($i % 2 == 0)
                        $class = ' class="alt"';
                    ?>
                    <tr <?php echo $class ?>>
                        <td>Aviso de Taller</td>
                        <td><?php echo $presupuestosproveedore['Avisostallere']['numero'] ?></td>
                        <td><?php echo!empty($presupuestosproveedore['Avisostallere']['fechaaviso']) ? $this->Time->format('d-m-Y', $presupuestosproveedore['Avisostallere']['fechaaviso']) : '' ?></td>
                        <td><?php echo $presupuestosproveedore['Avisostallere']['Cliente']['nombre'] ?></td>
                        <td><?php echo $this->Html->link('Ver', array('controller' => 'avisostalleres', 'action' => 'view', $presupuestosproveedore['Avisostallere']['id']), array('class' => 'button_brownie')) ?></td>
                    </tr>
                <?php endif; ?>
                <?php
                if (!empty($presupuestosproveedore['Avisosrepuestos']['id'])):
                    $class = null;
                    $i++;
                    if ($i % 2 == 0)
                        $class = ' class="alt"';
                    ?>
                    <tr <?php echo $class ?>>
                        <td>Aviso de Taller</td>
                        <td><?php echo $presupuestosproveedore['Avisosrepuestos']['numero'] ?></td>
                        <td><?php echo!empty($presupuestosproveedore['Avisosrepuestos']['fechahora']) ? $this->Time->format('d-m-Y', $presupuestosproveedore['Avisosrepuestos']['fechahora']) : '' ?></td>
                        <td><?php echo $presupuestosproveedore['Avisosrepuestos']['Cliente']['nombre'] ?></td>
                        <td><?php echo $this->Html->link('Ver', array('controller' => 'avisosrepuestos', 'action' => 'view', $presupuestosproveedore['Avisosrepuestos']['id']), array('class' => 'button_brownie')) ?></td>
                    </tr>
                <?php endif; ?>
                <?php
                if (!empty($presupuestosproveedore['Ordene']['id'])):
                    $class = null;
                    $i++;
                    if ($i % 2 == 0)
                        $class = ' class="alt"';
                    ?>
                    <tr <?php echo $class ?>>
                        <td>Orden</td>
                        <td><?php echo $presupuestosproveedore['Ordene']['numero'] ?></td>
                        <td><?php echo!empty($presupuestosproveedore['Ordene']['fecha']) ? $this->Time->format('d-m-Y', $presupuestosproveedore['Ordene']['fecha']) : '' ?></td>
                        <td><?php echo $presupuestosproveedore['Ordene']['Avisostallere']['Cliente']['nombre'] ?></td>
                        <td><?php echo $this->Html->link('Ver', array('controller' => 'ordenes', 'action' => 'view', $presupuestosproveedore['Ordene']['id']), array('class' => 'button_brownie')) ?></td>
                    </tr>
                <?php endif; ?>
                <?php
                if (!empty($presupuestosproveedore['Pedidoscliente']['id'])):
                    $class = null;
                    $i++;
                    if ($i % 2 == 0)
                        $class = ' class="alt"';
                    ?>
                    <tr <?php echo $class ?>>
                        <td>Pedido de Cliente</td>
                        <td><?php echo $presupuestosproveedore['Pedidoscliente']['numero'] ?></td>
                        <td><?php echo!empty($presupuestosproveedore['Pedidoscliente']['fecha']) ? $this->Time->format('d-m-Y', $presupuestosproveedore['Pedidoscliente']['fecha']) : '' ?></td>
                        <td><?php echo $presupuestosproveedore['Pedidoscliente']['Presupuestoscliente']['Cliente']['nombre'] ?></td>
                        <td><?php echo $this->Html->link('Ver', array('controller' => 'pedidosclientes', 'action' => 'view', $presupuestosproveedore['Pedidoscliente']['id']), array('class' => 'button_brownie')) ?></td>
                    </tr>
                <?php endif; ?>
                <?php
                foreach ($presupuestosproveedore['Pedidosproveedore'] as $pedidosproveedore):
                    $class = null;
                    $i++;
                    if ($i % 2 == 0)
                        $class = ' class="alt"';
                    ?>
                    <tr <?php echo $class ?>>
                        <td>Pedido de Proveedor</td>
                        <td><?php echo $pedidosproveedore['numero'] ?></td>
                        <td><?php echo!empty($pedidosproveedore['fecha']) ? $this->Time->format('d-m-Y', $pedidosproveedore['fecha']) : '' ?></td>
                        <td><?php echo $presupuestosproveedore['Proveedore']['nombre'] ?></td>
                        <td><?php echo $this->Html->link('Ver', array('controller' => 'pedidosproveedores', 'action' => 'view', $pedidosproveedore['id']), array('class' => 'button_brownie')) ?></td>
                    </tr>
                <?php endforeach; ?>
                <?php
                foreach ($presupuestosproveedore['Presupuestoscliente'] as $presupuestoscliente):
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
