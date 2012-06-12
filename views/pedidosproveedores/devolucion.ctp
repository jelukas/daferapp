<div class="pedidosproveedores">
    <?php echo $this->Form->create('Pedidosproveedore', array('type' => 'file')); ?>
    <fieldset>
        <legend><?php __('Añadir Pedido a proveedor al Presupuesto a Proveedor ' . $presupuestosproveedore['Presupuestosproveedore']['id']); ?></legend>
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
        <h2>Detalles del Pedido a Proveedor</h2>
        <?php
        echo $this->Form->input('fecha', array('label' => 'Fecha', 'dateFormat' => 'DMY'));
        echo $this->Form->input('presupuestosproveedore_id', array('label' => 'Presupuesto de Proveedor', 'type' => 'text', 'disabled' => true, 'value' => $presupuestosproveedore['Presupuestosproveedore']['id']));
        echo $this->Form->input('presupuestosproveedore_id', array('type' => 'hidden', 'value' => $presupuestosproveedore['Presupuestosproveedore']['id']));
        echo $this->Form->input('observaciones', array('label' => 'Observaciones'));
        echo $this->Form->input('fecharecepcion', array('label' => 'Fecha de recepción', 'dateFormat' => 'DMY'));
        echo $this->Form->input('file', array('type' => 'file', 'label' => 'Pedido Escaneado'));
        ?>
        <div class="related">
            <h3>Validar Articulos para el Pedido</h3>
            <?php if (!empty($albaranesproveedore['ArticulosAlbaranesproveedore'])): ?>
                <table cellpadding = "0" cellspacing = "0">
                    <tr>
                        <th><?php __('Ref'); ?></th>
                        <th><?php __('Nombre'); ?></th>
                        <th><?php __('Cantidad'); ?></th>
                        <th><?php __('Precio Proveedor€'); ?></th>
                        <th><?php __('Descuento %'); ?></th>
                        <th><?php __('Neto €'); ?></th>
                        <th><?php __('Total €'); ?></th>
                        <th><?php __('Validar'); ?></th>
                    </tr>
                    <?php
                    if (!empty($albaranesproveedore['ArticulosAlbaranesproveedore'])) {
                        $i = 0;
                        $j = 0;
                        foreach ($albaranesproveedore['ArticulosAlbaranesproveedore'] as $articulo_albaranesproveedore):
                            $class = null;
                            if ($i++ % 2 == 0) {
                                $class = ' class="altrow"';
                            }
                            ?>
                            <tr<?php echo $class; ?>>
                                <td><?php echo $articulo_albaranesproveedore['Articulo']['ref']; ?></td>
                                <td><?php echo $articulo_albaranesproveedore['Articulo']['nombre']; ?></td>
                                <td><?php echo $articulo_albaranesproveedore['cantidad'] * -1; ?></td>
                                <td><?php echo $articulo_albaranesproveedore['precio_proveedor']; ?></td>
                                <td><?php echo $articulo_albaranesproveedore['descuento']; ?></td>
                                <td><?php echo $articulo_albaranesproveedore['neto'] * -1; ?></td>
                                <td><?php echo $articulo_albaranesproveedore['total'] * -1; ?></td>
                                <td><?php echo $this->Form->input('ArticulosAlbaranesproveedore.' . $i . '.id', array('label' => 'Validar', 'type' => 'checkbox', 'checked' => true, 'value' => $articulo_albaranesproveedore['id'])) ?></td>
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
    <?php echo $this->Form->end(__('Añadir', true)); ?>
</div>