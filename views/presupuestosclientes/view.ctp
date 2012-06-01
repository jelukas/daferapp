<div class="presupuestosclientes view">
    <h2><?php __('Presupuestoscliente'); ?></h2>
    <dl><?php
$i = 0;
$class = ' class="altrow"';
?>
        <dt<?php if ($i % 2 == 0) echo $class; ?>><?php __('Id'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class; ?>>
            <?php echo $presupuestoscliente['Presupuestoscliente']['id']; ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0) echo $class; ?>><?php __('Cliente'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class; ?>>
            <?php echo $this->Html->link($presupuestoscliente['Cliente']['nombre'], array('controller' => 'clientes', 'action' => 'view', $presupuestoscliente['Cliente']['id'])); ?>
            &nbsp;
        </dd><dt<?php if ($i % 2 == 0) echo $class; ?>><?php __('Comerciale'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class; ?>>
            <?php echo $this->Html->link($presupuestoscliente['Comerciale']['nombre'], array('controller' => 'comerciales', 'action' => 'view', $presupuestoscliente['Comerciale']['id'])); ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0) echo $class; ?>><?php __('Fecha'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class; ?>>
            <?php echo $presupuestoscliente['Presupuestoscliente']['fecha']; ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0) echo $class; ?>><?php __('Almacen de los Materiales'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class; ?>>
            <?php echo $presupuestoscliente['Almacene']['nombre']; ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0) echo $class; ?>><?php __('Avisar'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class; ?>>
            <?php echo $presupuestoscliente['Presupuestoscliente']['avisar']; ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0) echo $class; ?>><?php __('Observaciones'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class; ?>>
            <?php echo $presupuestoscliente['Presupuestoscliente']['observaciones']; ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0) echo $class; ?>><?php __('Precio'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class; ?>>
            <?php echo $presupuestoscliente['Presupuestoscliente']['precio']; ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0) echo $class; ?>><?php __('Tipos IVA'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class; ?>>
            <?php echo $presupuestoscliente['Tiposiva']['tipoiva']; ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0) echo $class; ?>><?php __('Impuestos'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class; ?>>
            <?php echo $presupuestoscliente['Presupuestoscliente']['impuestos']; ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0) echo $class; ?>><?php __('Avisosrepuesto'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class; ?>>
            <?php echo $this->Html->link($presupuestoscliente['Avisosrepuesto']['id'], array('controller' => 'avisosrepuestos', 'action' => 'view', $presupuestoscliente['Avisosrepuesto']['id'])); ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0) echo $class; ?>><?php __('Ordene'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class; ?>>
            <?php echo $this->Html->link($presupuestoscliente['Ordene']['id'], array('controller' => 'ordenes', 'action' => 'view', $presupuestoscliente['Ordene']['id'])); ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0) echo $class; ?>><?php __('Avisostallere'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class; ?>>
            <?php echo $this->Html->link($presupuestoscliente['Avisostallere']['id'], array('controller' => 'avisostalleres', 'action' => 'view', $presupuestoscliente['Avisostallere']['id'])); ?>
            &nbsp;
        </dd>
        <?php if (!empty($presupuestoscliente['Presupuestosproveedore']['id'])): ?>
            <dt<?php if ($i % 2 == 0) echo $class; ?>><?php __('Presupuesto Proveedor'); ?></dt>
            <dd<?php if ($i++ % 2 == 0) echo $class; ?>>
                <?php echo $this->Html->link($presupuestoscliente['Presupuestosproveedore']['id'], array('controller' => 'presupuestosproveedores', 'action' => 'view', $presupuestoscliente['Presupuestosproveedore']['id'])); ?>
                &nbsp;
            </dd>
        <?php endif; ?>
    </dl>
    <div class="related">
        <h3>Tareas a realizar </h3>
        <div class="actions">
            <ul>
                <li><?php echo $this->Html->link(__('+ Tarea', true), array('controller' => 'tareaspresupuestoclientes', 'action' => 'add', $presupuestoscliente['Presupuestoscliente']['id']), array('class' => 'popup')); ?></li>
            </ul>
        </div>
        <table style="background-color: #FFE6CC;">
            <thead><th>Asunto</th><th>Acciones</th></thead>
            <?php foreach ($presupuestoscliente['Tareaspresupuestocliente'] as $indice => $tarea): ?>
                <tr>
                    <td style="background-color: #FFE6CC">Tarea <?php echo $indice + 1 ?> - <?php echo $tarea['asunto'] ?></td>                  
                    <td class="actions"  style="background-color: #FFE6CC"><?php echo $this->Html->link(__('+ Material', true), array('controller' => 'materiales', 'action' => 'add', $tarea['id']), array('class' => 'popup')); ?><?php echo $this->Html->link(__('+ Mano de Obra', true), array('controller' => 'manodeobras', 'action' => 'add', $tarea['id']), array('class' => 'popup')); ?><?php if (empty($tarea['TareaspresupuestoclientesOtrosservicio'])): ?><?php echo $this->Html->link(__('+ Otros Servicios', true), array('controller' => 'tareaspresupuestoclientes_otrosservicios', 'action' => 'add', $tarea['id']), array('class' => 'popup')); ?><?php endif; ?><?php echo $this->Html->link(__('Ver', true), array('controller' => 'tareaspresupuestoclientes', 'action' => 'view', $tarea['id'])); ?><?php echo $this->Html->link(__('Editar', true), array('controller' => 'tareaspresupuestoclientes', 'action' => 'edit', $tarea['id'])); ?><?php echo $this->Html->link(__('Borrar', true), array('controller' => 'tareaspresupuestoclientes', 'action' => 'delete', $tarea['id'])); ?></td>
                </tr>
                <tr class="tarea-relations">
                    <td colspan="4">
                        <?php if (!empty($tarea['Manodeobra'])): ?>
                            <h4>Mano de Obra</h4>
                            <table>
                                <tr><th>Descripcion</th><th>Horas</th><th>Precio Hora</th><th>Descuento</th><th>Importe</th><th>Acciones</th></tr>
                                <?php foreach ($tarea['Manodeobra'] as $manodeobra): ?>
                                    <tr><td><?php echo $manodeobra['descripcion'] ?></td><td><?php echo $manodeobra['horas'] ?></td><td><?php echo $manodeobra['precio_hora'] ?></td><td><?php echo $manodeobra['descuento'] ?> %</td><td><?php echo $manodeobra['importe'] ?></td><td class="actions"><?php echo $this->Html->link('Eliminar', array('controller' => 'manodeobras', 'action' => 'delete', $manodeobra['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $manodeobra['id'])) ?></td></tr>
                                <?php endforeach; ?>
                            </table>
                            <p style="background-color: #fff; text-align: right;font-weight: bold;">Total de Mano de Obra</p>
                            <p style="background-color: #fff; text-align: right;"><?php echo $tarea['mano_de_obra'] ?> &euro;</p>
                        <?php endif; ?>
                        <?php if (!empty($tarea['TareaspresupuestoclientesOtrosservicio'])): ?>
                            <h4>Otros Servicios</h4>
                            <table>
                                <tr><th>Desplazamiento</th><th>M.O.D</th><th>Km</th><th>Dietas</th><th>Varios</th><th>Total</th><th>Acciones</th></tr>
                                <?php if (!empty($tarea['TareaspresupuestoclientesOtrosservicio'])): ?>
                                    <tr>
                                        <td><?php echo $tarea['TareaspresupuestoclientesOtrosservicio']['desplazamiento'] ?> &euro;</td>
                                        <td><?php echo $tarea['TareaspresupuestoclientesOtrosservicio']['manoobradesplazamiento'] ?> &euro;</td>
                                        <td><?php echo $tarea['TareaspresupuestoclientesOtrosservicio']['kilometraje'] ?> Km.</td>
                                        <td><?php echo $tarea['TareaspresupuestoclientesOtrosservicio']['dietas'] ?></td>
                                        <td><?php echo $tarea['TareaspresupuestoclientesOtrosservicio']['varios'] ?> &euro;</td>
                                        <td><?php echo $tarea['TareaspresupuestoclientesOtrosservicio']['total'] ?> &euro;</td>
                                        <td class="actions"><?php echo $this->Html->link('Eliminar', array('controller' => 'tareaspresupuestoclientes_otrosservicios', 'action' => 'delete', $tarea['TareaspresupuestoclientesOtrosservicio']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $tarea['TareaspresupuestoclientesOtrosservicio']['id'])) ?></td>
                                    </tr>
                                <?php endif; ?>
                            </table>

                            <p style="background-color: #fff; text-align: right;font-weight: bold;">Otros Servicios</p>
                            <p style="background-color: #fff; text-align: right;"><?php echo!empty($tarea['TareaspresupuestoclientesOtrosservicio']['total']) ? $tarea['TareaspresupuestoclientesOtrosservicio']['total'] : 0 ?> &euro;</p>

                        <?php endif; ?>
                        <h4>Materiales</h4>
                        <div id="ajax_message"></div>
                        <table>
                            <tr>
                                <th>Articulo</th>
                                <th>Cantidad</th>
                                <th>Precio Ud.</th>
                                <th>Descuento</th>
                                <th>Importe</th>
                            </tr>
                            <?php foreach ($tarea['Materiale'] as $materiale): ?>
                                <tr>
                                    <td><?php echo $materiale['Articulo']['nombre'] ?></td>
                                    <td><?php echo $materiale['cantidad'] ?></td>
                                    <td><?php echo $materiale['precio_unidad'] ?></td>
                                    <td><?php echo $materiale['descuento'] ?> %</td>
                                    <td><?php echo $materiale['importe'] ?></td>
                                    <td class="actions"><?php echo $this->Html->link('Eliminar', array('controller' => 'materiales', 'action' => 'delete', $materiale['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $materiale['id'])) ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </table>
                        <p style="background-color: #fff; text-align: right;font-weight: bold;">Total de Materiales</p>
                        <p style="background-color: #fff; text-align: right;"><?php echo $tarea['materiales'] ?> &euro;</p>                        
                        <p style="background-color: #FFE6CC; text-align: right;font-weight: bold;font-size: 15px;">Total Tarea</p>
                        <p style="background-color: #FFE6CC; text-align: right;"><?php echo $tarea['total']; ?> &euro;</p>
                    </td>
                </tr>
            <?php endforeach; ?>
            <tr>
                <td colspan="2">
                    <table style="font-size: 16px; font-weight: bold;text-align: right;">
                        <tr>
                            <td>Total Mano de Obra y Servicios</td>
                            <td><?php echo $totalmanoobrayservicios; ?> &euro;</td>
                            <td>Total Repuestos</td>
                            <td><?php echo $totalrepuestos; ?> &euro;</td>
                            <td>Base Imponible</td>
                            <td><?php echo $presupuestoscliente['Presupuestoscliente']['precio']; ?> &euro;</td>
                            <td>Impuestos</td>
                            <td><?php echo $presupuestoscliente['Presupuestoscliente']['impuestos']; ?> &euro;</td>
                        </tr>
                        <tr >
                            <td colspan="6" style="text-align: right;">Total Presupuesto</td>
                            <td colspan="2"><?php echo $presupuestoscliente['Presupuestoscliente']['impuestos'] + $presupuestoscliente['Presupuestoscliente']['precio']; ?> </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
        <div class="actions">
            <ul>
                <li><?php echo $this->Html->link(__('Nuevo Pedido de Clidente', true), array('controller' => 'pedidosclientes', 'action' => 'add', $presupuestoscliente['Presupuestoscliente']['id'])); ?></li>
            </ul>
        </div>
    </div>
    <div>
        <table>
            <tr><th>Pedido</th><th>Acciones</th></tr>
            <?php foreach ($presupuestoscliente['Pedidoscliente'] as $pedidoscliente): ?>
                <tr><td>Pedido de Cliente <?php echo $pedidoscliente['id'] ?></td><td class="actions"><?php echo $this->Html->link('Ver', array('action' => 'view', 'controller' => 'pedidosclientes', $pedidoscliente['id'])) ?></td></tr>
            <?php endforeach; ?>
        </table>
    </div>
</div>
<div class="actions">
    <h3><?php __('Actions'); ?></h3>
    <ul>
        <li><?php echo $this->Html->link(__('Edit Presupuestoscliente', true), array('action' => 'edit', $presupuestoscliente['Presupuestoscliente']['id'])); ?> </li>
        <li><?php echo $this->Html->link(__('Delete Presupuestoscliente', true), array('action' => 'delete', $presupuestoscliente['Presupuestoscliente']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $presupuestoscliente['Presupuestoscliente']['id'])); ?> </li>
        <li><?php echo $this->Html->link(__('List Presupuestosclientes', true), array('action' => 'index')); ?> </li>
        <li style="margin-top: 20px"><?php echo $this->Html->link(__('Nuevo Pedido de Cliente', true), '#'); ?> </li>
    </ul>
</div>
<div id="loading_background">
    <div id="loading_animation"></div>
</div>