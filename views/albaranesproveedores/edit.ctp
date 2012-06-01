<div class="albaranesproveedores form">
    <?php echo $this->Form->create('Albaranesproveedore', array('type' => 'file')); ?>
    <fieldset>
        <legend><?php __('Editar Albaran de proveedor'); ?></legend>
        <?php
        echo $this->Form->input('id');
        ?>
        <div class="input text required">
            <label><?php echo $this->Html->link('Pedido a Proveedor - ' . $this->Form->value('Albaranesproveedore.pedidosproveedore_id'), array('controller' => 'pedidosproveedores', 'action' => 'view', $this->Form->value('Albaranesproveedore.pedidosproveedore_id'))); ?></label>
        </div>
        <?php
        echo $this->Form->input('pedidosproveedore_id', array('type' => 'hidden',));
        echo $this->Form->input('fecha', array('label' => 'Fecha'));
        echo $this->Form->input('observaciones', array('label' => 'Observaciones'));
        echo $this->Form->input('file', array('type' => 'file', 'label' => 'Albarán escaneado'));
        ?>
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
                    <li><?php echo $this->Html->link(__('Añadir Artículo al Albaran', true), array('controller' => 'articulos_albaranesproveedores', 'action' => 'add', $this->Form->value('Albaranesproveedore.id')), array('class' => 'popup')); ?> </li>
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
                        $j = 0;
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
                                <td><?php echo $articulo_albaranesproveedore['ArticulosAlbaranesproveedore']['total']; ?></td>
                                <td class="actions">
                                    <?php echo $this->Html->link(__('Editar', true), array('controller' => 'articulos_albaranesproveedores', 'action' => 'edit', $articulo_albaranesproveedore['ArticulosAlbaranesproveedore']['id']), array('class' => 'popup')); ?>
                                    <?php echo $this->Html->link(__('Eliminar', true), array('controller' => 'articulos_albaranesproveedores', 'action' => 'delete', $articulo_albaranesproveedore['ArticulosAlbaranesproveedore']['id']), null, sprintf(__('Seguro que quieres borrar el Artículo del Albarán # %s?', true), $articulo_albaranesproveedore['ArticulosAlbaranesproveedore']['id'])); ?>
                                </td>
                            </tr>
                            <?php
                            $j++;
                        endforeach;
                    }
                    ?>
                </table>
            <?php endif; ?>
        </div>
    </fieldset>
    <?php echo $this->Form->end(__('Guardar', true)); ?>
</div>
<div class="actions">
    <h3><?php __('Acciones'); ?></h3>
    <ul>
        <li><?php echo $this->Html->link(__('Ver', true), array('action' => 'view', $this->Form->value('Albaranesproveedore.id'))); ?></li>
        <li><?php echo $this->Html->link(__('Eliminar', true), array('action' => 'delete', $this->Form->value('Albaranesproveedore.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('Albaranesproveedore.id'))); ?></li>
        <li><?php echo $this->Html->link(__('Listar Albaranes de proveedores', true), array('action' => 'index')); ?></li>
        <li><?php echo $this->Html->link(__('Listar Pedidos de proveedores', true), array('controller' => 'pedidosproveedores', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('Nuevo Pedidos de proveedore', true), array('controller' => 'pedidosproveedores', 'action' => 'add')); ?> </li>
        <li><?php echo $this->Html->link(__('Listar Facturas de proveedores', true), array('controller' => 'facturasproveedores', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('Nuevo Facturas de proveedore', true), array('controller' => 'facturasproveedores', 'action' => 'add')); ?> </li>
    </ul>
</div>