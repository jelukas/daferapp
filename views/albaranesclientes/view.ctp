<div class="albaranesclientes">
    <h2>
        <?php __('Albaran a cliente Nº ' . $albaranescliente['Albaranescliente']['numero']); ?>
        <?php echo $this->Html->link(__('Editar', true), array('action' => 'edit', $albaranescliente['Albaranescliente']['id']), array('class' => 'button_link')); ?> 
        <?php echo $this->Html->link(__('Listar Albaranes a Clientes', true), array('action' => 'index'), array('class' => 'button_link')); ?> 
    </h2>
    <table class="view">
        <tr>
            <td><span><?php __('Número'); ?></span></td>
            <td><?php echo $albaranescliente['Albaranescliente']['numero']; ?></td>
            <td><span><?php __('Fecha'); ?></span></td>
            <td><?php echo $albaranescliente['Albaranescliente']['fecha']; ?></td>
            <td><span><?php __('Almacén de los Materiales'); ?></span></td>
            <td><?php echo $albaranescliente['Almacene']['nombre']; ?></td>
            <td><span><?php __('Comercial'); ?></span></td>
            <td><?php echo $albaranescliente['Comerciale']['nombre']; ?></td>
        </tr>
        <tr>
            <td><span><?php __('Cliente') ?></span></td>
            <td><?php echo $albaranescliente['Cliente']['nombre']; ?></td>
            <td><span><?php __('Pedido de cliente'); ?></span></td>
            <td><?php echo $this->Html->link($albaranescliente['Pedidoscliente']['numero'], array('controller' => 'pedidosclientes', 'action' => 'view', $albaranescliente['Pedidoscliente']['id'])); ?></td>
            <td><span><?php __('Facturable'); ?></span></td>
            <td><?php echo $albaranescliente['Albaranescliente']['facturable'] == 0 ? 'No' : 'Sí' ?></td>
        </tr>
        <tr>
            <?php if (!empty($albaranescliente['Albaranescliente']['ordene_id'])): ?>
                <td><h4><?php __('Nº Orden'); ?></h4></td>
                <td><?php echo $this->Html->link($albaranescliente['Ordene']['numero'], array('controller' => 'ordenes', 'action' => 'view', $albaranescliente['Ordene']['id'])); ?></td>
                <td><span><?php __('Centro de Trabajo'); ?></span></td>
                <td><?php echo $albaranescliente['Ordene']['Avisostallere']['Centrostrabajo']['centrotrabajo']; ?></td>
                <td><span><?php __('Máquina'); ?></span></td>
                <td><?php echo $this->Html->link($albaranescliente['Ordene']['Avisostallere']['Maquina']['nombre'], array('controller' => 'maquinas', 'action' => 'view', $albaranescliente['Ordene']['Avisostallere']['Maquina']['id'])); ?></td>
                <td><span><?php __('Nº Serie Máquina'); ?></span></td>
                <td><?php echo $albaranescliente['Ordene']['Avisostallere']['Maquina']['serie_maquina']; ?></td>
                <td><span><?php __('Horas'); ?></span></td>
                <td><?php echo $albaranescliente['Ordene']['Avisostallere']['horas_maquina']; ?></td>
            <?php endif; ?>
            <?php if (!empty($albaranescliente['Albaranescliente']['avisosrepuesto_id'])): ?>
                <td><h4><?php __('Aviso de Repuestos'); ?></h4></td>
                <td><?php echo $this->Html->link($albaranescliente['Avisosrepuesto']['numero'], array('controller' => 'avisosrepuestos', 'action' => 'view', $albaranescliente['Avisosrepuesto']['id'])); ?></td>
                <td><span><?php __('Centro de Trabajo'); ?></span></td>
                <td><?php echo $albaranescliente['Avisosrepuesto']['Centrostrabajo']['centrotrabajo']; ?></td>
                <td><span><?php __('Máquina'); ?></span></td>
                <td><?php echo $this->Html->link($albaranescliente['Avisosrepuesto']['Maquina']['nombre'], array('controller' => 'maquinas', 'action' => 'view', $albaranescliente['Avisosrepuesto']['Maquina']['id'])); ?></td>
                <td><span><?php __('Nº Serie Máquina'); ?></span></td>
                <td><?php echo $albaranescliente['Avisosrepuesto']['Maquina']['serie_maquina']; ?></td>
                <td><span><?php __('Horas'); ?></span></td>
                <td><?php echo $albaranescliente['Avisosrepuesto']['horas_maquina']; ?></td>
            <?php endif; ?>
        </tr>
        <tr>
            <td><span><?php __('Albarán Escaneado'); ?></span></td>
            <td colspan="5"><?php echo $this->Html->link(__($albaranescliente['Albaranescliente']['albaranescaneado'], true), '/files/albaranescliente/' . $albaranescliente['Albaranescliente']['albaranescaneado']); ?></td>
        </tr>
        <tr>
            <td><span><?php __('Observaciones'); ?></span></td>
            <td colspan="5"><?php echo $albaranescliente['Albaranescliente']['observaciones']; ?></td>
        </tr>
        <tr>
            <td><span><?php __('Centro de Coste') ?></span></td>
            <td><?php echo $albaranescliente['Centrosdecoste']['denominacion'] ?></td>
        </tr>
    </table>
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