<div class="pedidosproveedores form">

    <h2><?php __('Pedido a proveedor del Presupuesto a Proveedor ' . $presupuestosproveedore['Presupuestosproveedore']['id']); ?></h2>
    <dl><?php
$i = 0;
$class = ' class="altrow"';
?>
        <dt<?php if ($i % 2 == 0) echo $class; ?>><?php __('Presupuesto a Proveedor Id'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class; ?> style="margin-left: 18em;">
            <?php echo $this->Html->link($presupuestosproveedore['Presupuestosproveedore']['id'], array('controller' => 'presupuestosproveedores', 'action' => 'view', $presupuestosproveedore['Presupuestosproveedore']['id'])); ?>
        </dd>
        <?php if ($presupuestosproveedore['Avisosrepuesto']['id'] != null && $presupuestosproveedore['Avisosrepuesto']['id'] >= 0) { ?>
            <dt<?php if ($i % 2 == 0) echo $class; ?>><?php __('Nº Aviso de repuesto'); ?></dt>
            <dd<?php if ($i++ % 2 == 0) echo $class; ?>>
                <?php echo $this->Html->link($presupuestosproveedore['Avisosrepuesto']['id'], array('controller' => 'avisosrepuestos', 'action' => 'view', $presupuestosproveedore['Avisosrepuesto']['id'])); ?>
            </dd>
            <dt<?php if ($i % 2 == 0) echo $class; ?>><?php __('Cliente'); ?></dt>
            <dd<?php if ($i++ % 2 == 0) echo $class; ?>>
                <?php echo $presupuestosproveedore['Avisosrepuesto']['Cliente']['nombre']; ?>&nbsp;
            </dd>
            <dt<?php if ($i % 2 == 0) echo $class; ?>><?php __('Centro de Trabajo'); ?></dt>
            <dd<?php if ($i++ % 2 == 0) echo $class; ?>>
                <?php echo $presupuestosproveedore['Avisosrepuesto']['Centrostrabajo']['centrotrabajo']; ?>&nbsp;
            </dd>
            <dt<?php if ($i % 2 == 0) echo $class; ?>><?php __('Máquina'); ?></dt>
            <dd<?php if ($i++ % 2 == 0) echo $class; ?>>
                <?php echo $presupuestosproveedore['Avisosrepuesto']['Maquina']['nombre']; ?>&nbsp;
            </dd>
            <?php
        }
        else if ($presupuestosproveedore['Avisostallere']['id'] != null) {
            ?>
            <dt<?php if ($i % 2 == 0) echo $class; ?>><?php __('Nº Aviso de taller'); ?></dt>
            <dd<?php if ($i++ % 2 == 0) echo $class; ?>>
                <?php echo $this->Html->link($presupuestosproveedore['Avisostallere']['id'], array('controller' => 'avisostalleres', 'action' => 'view', $presupuestosproveedore['Avisostallere']['id'])); ?>
            </dd>
            <dt<?php if ($i % 2 == 0) echo $class; ?>><?php __('Cliente'); ?></dt>
            <dd<?php if ($i++ % 2 == 0) echo $class; ?>>
                <?php echo $this->Html->link($presupuestosproveedore['Avisostallere']['Cliente']['nombre'], array('controller' => 'clientes', 'action' => 'view', $presupuestosproveedore['Avisostallere']['Cliente']['id'])) ?>&nbsp;
            </dd>
            <dt<?php if ($i % 2 == 0) echo $class; ?>><?php __('Centro de Trabajo'); ?></dt>
            <dd<?php if ($i++ % 2 == 0) echo $class; ?>>
                <?php echo $this->Html->link($presupuestosproveedore['Avisostallere']['Centrostrabajo']['centrotrabajo'], array('controller' => 'centrostrabajos', 'action' => 'view', $presupuestosproveedore['Avisostallere']['Centrostrabajo']['id'])); ?>&nbsp;
            </dd>
            <dt<?php if ($i % 2 == 0) echo $class; ?>><?php __('Máquina'); ?></dt>
            <dd<?php if ($i++ % 2 == 0) echo $class; ?>>
                <?php echo $this->Html->link($presupuestosproveedore['Avisostallere']['Maquina']['nombre'], array('controller' => 'maquinas', 'action' => 'view', $presupuestosproveedore['Avisostallere']['Maquina']['id'])); ?>&nbsp;
            </dd>
        <?php } ?>
        <dt<?php if ($i % 2 == 0) echo $class; ?>><?php __('Proveedor'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class; ?>>
            <?php echo $this->Html->link($presupuestosproveedore['Proveedore']['id'] . ' --- ' . $presupuestosproveedore['Proveedore']['nombre'], array('controller' => 'proveedores', 'action' => 'view', $presupuestosproveedore['Proveedore']['id'])); ?>&nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0) echo $class; ?>><?php __('Almacén'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class; ?>>
            <?php echo $this->Html->link($presupuestosproveedore['Almacene']['nombre'], array('controller' => 'almacenes', 'action' => 'view', $presupuestosproveedore['Almacene']['id'])); ?>
        </dd>
        <dt<?php if ($i % 2 == 0) echo $class; ?>><?php __('Fecha de plazo'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class; ?>>
            <?php echo $presupuestosproveedore['Presupuestosproveedore']['fechaplazo']; ?>&nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0) echo $class; ?>><?php __('Observaciones'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class; ?>>
            <?php echo $presupuestosproveedore['Presupuestosproveedore']['observaciones']; ?>&nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0) echo $class; ?>><?php __('Confirmado'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class; ?>>
            <?php echo $presupuestosproveedore['Presupuestosproveedore']['confirmado']; ?>&nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0) echo $class; ?>><?php __('Presupuesto escaneado'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class; ?>>
            <?php echo $presupuestosproveedore['Presupuestosproveedore']['presupuestoescaneado']; ?>&nbsp;
        </dd>
    </dl> 
    <?php echo $this->Form->create('Pedidosproveedore', array('type' => 'file')); ?>
    <fieldset>
        <legend><?php __('Editar Pedido de proveedor'); ?></legend>
        <?php
        echo $this->Form->input('id');
        echo $this->Form->input('fecha', array('label' => 'Fecha', 'dateFormat' => 'DMY'));
        echo $this->Form->input('observaciones', array('label' => 'Observaciones'));
        echo $this->Form->input('fecharecepcion', array('label' => 'Fecha de recepción', 'dateFormat' => 'DMY'));
        echo $this->Form->input('file', array('type' => 'file', 'label' => 'Pedido Escaneado'));
        ?>
        <div class="related" style="margin-top: 30px">
            <h3><?php __('Artículos del Pedido a Proveedor'); ?></h3>
            <div class="actions">
                <ul>   
                    <li><?php echo $this->Html->link(__('Añadir Artículo al Pedido', true), array('controller' => 'articulos_pedidosproveedores', 'action' => 'add', $this->Form->value('Pedidosproveedore.id')), array('class' => 'popup')); ?> </li>
                </ul>
            </div>
            <?php if (!empty($articulos_pedidosproveedore)): ?>
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
                    if (!empty($articulos_pedidosproveedore)) {
                        $i = 0;
                        $j = 0;
                        foreach ($articulos_pedidosproveedore as $articulo_pedidoproveedore):
                            $class = null;
                            if ($i++ % 2 == 0) {
                                $class = ' class="altrow"';
                            }
                            ?>
                            <tr<?php echo $class; ?>>
                                <td><?php echo $articulo_pedidoproveedore['Articulo']['ref']; ?></td>
                                <td><?php echo $articulo_pedidoproveedore['Articulo']['nombre']; ?></td>
                                <td><?php echo $articulo_pedidoproveedore['ArticulosPedidosproveedore']['cantidad']; ?></td>
                                <td><?php echo $articulo_pedidoproveedore['ArticulosPedidosproveedore']['precio_proveedor']; ?></td>
                                <td><?php echo $articulo_pedidoproveedore['ArticulosPedidosproveedore']['descuento']; ?></td>
                                <td><?php echo $articulo_pedidoproveedore['ArticulosPedidosproveedore']['neto']; ?></td>
                                <td><?php echo $articulo_pedidoproveedore['ArticulosPedidosproveedore']['total']; ?></td>
                                <td class="actions">
                                    <?php echo $this->Html->link(__('Editar', true), array('controller' => 'articulos_pedidosproveedores', 'action' => 'edit', $articulo_pedidoproveedore['ArticulosPedidosproveedore']['id']), array('class' => 'popup')); ?>
                                    <?php echo $this->Html->link(__('Eliminar', true), array('controller' => 'articulos_pedidosproveedores', 'action' => 'delete', $articulo_pedidoproveedore['ArticulosPedidosproveedore']['id'], $this->data['Pedidosproveedore']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $articulo_pedidoproveedore['ArticulosPedidosproveedore']['id'])); ?>
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
    <div class="actions">
        <ul>   
            <li><?php echo $this->Html->link(__('Nuevo Albaran a proveedores', true), array('controller' => 'albaranesproveedores', 'action' => 'add', $this->Form->value('Pedidosproveedore.id')), array('style' => 'background: -webkit-gradient(linear, left top, left bottom, from(#FFA54F), to(#EEECA9));')); ?> </li>
        </ul>
    </div>
</div>
<div class="actions">
    <h3><?php __('Acciones'); ?></h3>
    <ul>
        <li><?php echo $this->Html->link(__('Ver', true), array('action' => 'view', $this->Form->value('Pedidosproveedore.id'))); ?></li>
        <li><?php echo $this->Html->link(__('Eliminar', true), array('action' => 'delete', $this->Form->value('Pedidosproveedore.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('Pedidosproveedore.id'))); ?></li>
        <li><?php echo $this->Html->link(__('Listar Pedidos de proveedores', true), array('action' => 'index')); ?></li>
    </ul>
</div>
