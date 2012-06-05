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
            <td colspan="2">
                <span>Presupuesto Escaneado</span>
                <?php echo $this->Html->link(__($presupuestosproveedore['Presupuestosproveedore']['presupuestoescaneado'], true), '/files/presupuestosproveedore/' . $presupuestosproveedore['Presupuestosproveedore']['presupuestoescaneado']); ?>
            </td>
            <td>
                <span>Plazo de Entrega</span>
                <?php echo $presupuestosproveedore['Presupuestosproveedore']['fechaplazo']; ?>
            </td>
            <td style="background-color: #FFE773">
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
<script>$("dd:odd").css("background-color", "#F4F4F4"); $("dt:odd").css("background-color", "#F4F4F4");</script>