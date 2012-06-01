<div class="albaranesclientes view">
    <h2><?php __('Albaranescliente'); ?></h2>
    <dl><?php
$i = 0;
$class = ' class="altrow"';
?>
        <dt<?php if ($i % 2 == 0) echo $class; ?>><?php __('Id'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class; ?>>
            <?php echo $albaranescliente['Albaranescliente']['id']; ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0) echo $class; ?>><?php __('Fecha'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class; ?>>
            <?php echo $albaranescliente['Albaranescliente']['fecha']; ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0) echo $class; ?>><?php __('Numeroalbaran'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class; ?>>
            <?php echo $albaranescliente['Albaranescliente']['numeroalbaran']; ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0) echo $class; ?>><?php __('Almacén de los Materiales'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class; ?>>
            <?php echo $albaranescliente['Almacene']['nombre']; ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0) echo $class; ?>><?php __('Observaciones'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class; ?>>
            <?php echo $albaranescliente['Albaranescliente']['observaciones']; ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0) echo $class; ?>><?php __('Albaranescaneado'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class; ?>>
            <?php echo $albaranescliente['Albaranescliente']['albaranescaneado']; ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0) echo $class; ?>><?php __('Avisosrepuesto'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class; ?>>
            <?php echo $this->Html->link($albaranescliente['Avisosrepuesto']['id'], array('controller' => 'avisosrepuestos', 'action' => 'view', $albaranescliente['Avisosrepuesto']['id'])); ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0) echo $class; ?>><?php __('Ordene'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class; ?>>
            <?php echo $this->Html->link($albaranescliente['Ordene']['id'], array('controller' => 'ordenes', 'action' => 'view', $albaranescliente['Ordene']['id'])); ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0) echo $class; ?>><?php __('Pedidoscliente'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class; ?>>
            <?php echo $this->Html->link($albaranescliente['Pedidoscliente']['id'], array('controller' => 'pedidosclientes', 'action' => 'view', $albaranescliente['Pedidoscliente']['id'])); ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0) echo $class; ?>><?php __('Facturable'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class; ?>>
            <?php echo $albaranescliente['Albaranescliente']['facturable'] == 0 ? 'No' : 'Sí' ?>
            &nbsp;
        </dd>
    </dl>
    <div class="related">
        <h3>Tareas a realizar </h3>
        <div class="actions">
            <ul>
                <li><?php echo $this->Html->link(__('+ Tarea', true), array('controller' => 'tareasalbaranesclientes', 'action' => 'add', $albaranescliente['Albaranescliente']['id']), array('class' => 'popup')); ?></li>
            </ul>
        </div>
        <table style="background-color: #FFE6CC;">
            <thead><th>Asunto</th><th>Acciones</th></thead>
            <?php foreach ($albaranescliente['Tareasalbaranescliente'] as $indice => $tarea): ?>
                <tr>
                    <td style="background-color: #FFE6CC">Tarea <?php echo $indice + 1 ?> - <?php echo $tarea['asunto'] ?></td>                  
                    <td class="actions"  style="background-color: #FFE6CC"><?php echo $this->Html->link(__('+ Material', true), array('controller' => 'materiales_tareasalbaranesclientes', 'action' => 'add', $tarea['id']), array('class' => 'popup')); ?><?php echo $this->Html->link(__('+ Mano de Obra', true), array('controller' => 'manodeobras_tareasalbaranesclientes', 'action' => 'add', $tarea['id']), array('class' => 'popup')); ?><?php if (empty($tarea['TareasalbaranesclientesOtrosservicio'])): ?><?php echo $this->Html->link(__('+ Otros Servicios', true), array('controller' => 'tareasalbaranesclientes_otrosservicios', 'action' => 'add', $tarea['id']), array('class' => 'popup')); ?><?php endif; ?><?php echo $this->Html->link(__('Editar', true), array('controller' => 'tareasalbaranesclientes', 'action' => 'edit', $tarea['id']), array('class' => 'popup')); ?><?php echo $this->Html->link(__('Borrar', true), array('controller' => 'tareasalbaranesclientes', 'action' => 'delete', $tarea['id'])); ?></td>
                </tr>
                <tr class="tarea-relations">
                    <td colspan="4">
                        <?php if (!empty($tarea['ManodeobrasTareasalbaranescliente'])): ?>
                            <h4>Mano de Obra</h4>
                            <table>
                                <tr><th>Descripcion</th><th>Horas</th><th>Precio Hora</th><th>Descuento</th><th>Importe</th><th>Parte Escanado</th><th>Acciones</th></tr>
                                <?php foreach ($tarea['ManodeobrasTareasalbaranescliente'] as $manodeobra): ?>
                                    <tr><td><?php echo $manodeobra['descripcion'] ?></td><td><?php echo $manodeobra['horas'] ?></td><td><?php echo $manodeobra['precio_hora'] ?></td><td><?php echo $manodeobra['descuento'] ?> %</td><td><?php echo $manodeobra['importe'] ?></td><td><?php if (!empty($manodeobra['parteescaneado'])) echo $this->Html->link('/files/' . $manodeobra['parteescaneado'], '/files/' . $manodeobra['parteescaneado']) ?></td><td class="actions"><?php echo $this->Html->link('Eliminar', array('controller' => 'manodeobras_tareasalbaranesclientes', 'action' => 'delete', $manodeobra['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $manodeobra['id'])) ?></td></tr>
                                <?php endforeach; ?>
                            </table>
                            <p style="background-color: #fff; text-align: right;font-weight: bold;">Total de Mano de Obra</p>
                            <p style="background-color: #fff; text-align: right;"><?php echo $tarea['mano_de_obra'] ?> &euro;</p>
                        <?php endif; ?>
                        <?php if (!empty($tarea['TareasalbaranesclientesOtrosservicio'])): ?>
                            <h4>Otros Servicios</h4>
                            <table>
                                <tr><th>Desplazamiento</th><th>M.O.D</th><th>Km</th><th>Dietas</th><th>Varios</th><th>Total</th><th>Acciones</th></tr>
                                <?php if (!empty($tarea['TareasalbaranesclientesOtrosservicio'])): ?>
                                    <tr>
                                        <td><?php echo $tarea['TareasalbaranesclientesOtrosservicio']['desplazamiento'] ?> &euro;</td>
                                        <td><?php echo $tarea['TareasalbaranesclientesOtrosservicio']['manoobradesplazamiento'] ?> &euro;</td>
                                        <td><?php echo $tarea['TareasalbaranesclientesOtrosservicio']['kilometraje'] ?> Km.</td>
                                        <td><?php echo $tarea['TareasalbaranesclientesOtrosservicio']['dietas'] ?></td>
                                        <td><?php echo $tarea['TareasalbaranesclientesOtrosservicio']['varios'] ?> &euro;</td>
                                        <td><?php echo $tarea['TareasalbaranesclientesOtrosservicio']['total'] ?> &euro;</td>
                                        <td class="actions"><?php echo $this->Html->link('Eliminar', array('controller' => 'tareasalbaranesclientes_otrosservicios', 'action' => 'delete', $tarea['TareasalbaranesclientesOtrosservicio']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $tarea['TareasalbaranesclientesOtrosservicio']['id'])) ?></td>
                                    </tr>
                                <?php endif; ?>
                            </table>

                            <p style="background-color: #fff; text-align: right;font-weight: bold;">Otros Servicios</p>
                            <p style="background-color: #fff; text-align: right;"><?php echo!empty($tarea['TareasalbaranesclientesOtrosservicio']['total']) ? $tarea['TareasalbaranesclientesOtrosservicio']['total'] : 0 ?> &euro;</p>

                        <?php endif; ?>
                        <h4>Materiales de la Tarea</h4>
                        <div id="ajax_message"></div>
                        <table>
                            <tr>
                                <th>Articulo</th>
                                <th>Cantidad</th>
                                <th>Precio Ud.</th>
                                <th>Descuento</th>
                                <th>Importe</th>
                                <th>Acciones</th>
                            </tr>
                            <?php foreach ($tarea['MaterialesTareasalbaranescliente'] as $materiale): ?>
                                <tr>
                                    <td><?php echo $materiale['Articulo']['nombre'] ?></td>
                                    <td><?php echo $materiale['cantidad'] ?></td>
                                    <td><?php echo $materiale['precio_unidad'] ?></td>
                                    <td><?php echo $materiale['descuento'] ?> %</td>
                                    <td><?php echo $materiale['importe'] ?></td>
                                    <td class="actions"><?php echo $this->Html->link('Eliminar', array('controller' => 'materiales_tareasalbaranesclientes', 'action' => 'delete', $materiale['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $materiale['id'])) ?></td>
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
                            <td><?php echo $albaranescliente['Albaranescliente']['precio']; ?> &euro;</td>
                            <td>Impuestos</td>
                            <td><?php echo $albaranescliente['Albaranescliente']['impuestos']; ?> &euro;</td>
                        </tr>
                        <tr >
                            <td colspan="6" style="text-align: right;">Total con Impuestos</td>
                            <td colspan="2"><?php echo $albaranescliente['Albaranescliente']['impuestos'] + $albaranescliente['Albaranescliente']['precio']; ?> </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </div>
    <?php if ($albaranescliente['Albaranescliente']['es_devolucion'] == 0): ?>
        <?php echo $this->Html->link(__('Nuevo Albaran de Devolucion', true), array('controller' => 'albaranesclientes', 'action' => 'devolucion', $albaranescliente['Albaranescliente']['id']), array('class' => 'button_link')); ?></p>
    <?php endif; ?>
</div>
<div class="actions">
    <h3><?php __('Actions'); ?></h3>
    <ul>
        <li><?php echo $this->Html->link(__('Edit Albaranescliente', true), array('action' => 'edit', $albaranescliente['Albaranescliente']['id'])); ?> </li>
        <li><?php echo $this->Html->link(__('Delete Albaranescliente', true), array('action' => 'delete', $albaranescliente['Albaranescliente']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $albaranescliente['Albaranescliente']['id'])); ?> </li>
        <li><?php echo $this->Html->link(__('List Albaranesclientes', true), array('action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Albaranescliente', true), array('action' => 'add', 'directo')); ?> </li>
    </ul>
</div>