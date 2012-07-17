<div class="pedidosclientes">
    <h2>
        <?php __('Pedido de Cliente Nº ' . $pedidoscliente['Pedidoscliente']['numero']); ?>
        <?php echo $this->Html->link(__('Editar', true), array('action' => 'edit', $pedidoscliente['Pedidoscliente']['id']), array('class' => 'button_link')); ?> 
        <?php echo $this->Html->link(__('Eliminar', true), array('action' => 'delete', $pedidoscliente['Pedidoscliente']['id']), array('class' => 'button_link'), sprintf(__('Are you sure you want to delete # %s?', true), $pedidoscliente['Pedidoscliente']['id'])); ?> 
        <?php echo $this->Html->link(__('Listar Pedidos de Clientes', true), array('action' => 'index'), array('class' => 'button_link')); ?> 
    </h2>
    <table class="view">
        <tr>
            <td><span><?php __('Número'); ?></span></td>
            <td><?php echo $pedidoscliente['Pedidoscliente']['numero']; ?></td>
            <td><span><?php __('Fecha'); ?></span></td>
            <td><?php echo $pedidoscliente['Pedidoscliente']['fecha']; ?></td>
            <td><span><?php __('Almacén de los Materiales'); ?></span></td>
            <td><?php echo $pedidoscliente['Presupuestoscliente']['Almacene']['nombre']; ?></td>
            <td><span><?php __('Comercial'); ?></span></td>
            <td><?php echo $pedidoscliente['Presupuestoscliente']['Comerciale']['nombre']; ?></td>
        </tr>
        <tr>
            <td><h4><?php __('Nº Presupuesto de Cliente'); ?></h4></td>
            <td><?php echo $this->Html->link($pedidoscliente['Pedidoscliente']['presupuestoscliente_id'], array('controller' => 'presupuestosclientes', 'action' => 'view', $pedidoscliente['Presupuestoscliente']['id'])); ?></td>
        </tr>
        <?php if (!empty($pedidoscliente['Presupuestoscliente']['ordene_id'])): ?>
            <tr>
                <td><h4><?php __('Nº Orden'); ?></h4></td>
                <td><?php echo $this->Html->link($pedidoscliente['Presupuestoscliente']['Ordene']['numero'], array('controller' => 'ordenes', 'action' => 'view', $pedidoscliente['Presupuestoscliente']['Ordene']['id'])); ?></td>
                <td><span><?php __('Centro de Trabajo'); ?></span></td>
                <td><?php echo $pedidoscliente['Presupuestoscliente']['Ordene']['Avisostallere']['Centrostrabajo']['centrotrabajo']; ?></td>
                <td><span><?php __('Máquina'); ?></span></td>
                <td><?php echo $this->Html->link($pedidoscliente['Presupuestoscliente']['Ordene']['Avisostallere']['Maquina']['nombre'], array('controller' => 'maquinas', 'action' => 'view',$pedidoscliente['Presupuestoscliente']['Ordene']['Avisostallere']['Maquina']['id'])); ?></td>
                <td><span><?php __('Nº Serie Máquina'); ?></span></td>
                <td><?php echo $pedidoscliente['Presupuestoscliente']['Ordene']['Avisostallere']['Maquina']['serie_maquina']; ?></td>
                <td><span><?php __('Horas'); ?></span></td>
                <td><?php echo $pedidoscliente['Presupuestoscliente']['Ordene']['Avisostallere']['horas_maquina']; ?></td>
            </tr>
        <?php endif; ?>
        <?php if (!empty($pedidoscliente['Presupuestoscliente']['avisostallere_id'])): ?>
            <tr>
                <td><h4><?php __('Aviso de Taller'); ?></h4></td>
                <td><?php echo $this->Html->link($pedidoscliente['Presupuestoscliente']['Avisostallere']['numero'], array('controller' => 'avisostalleres', 'action' => 'view', $pedidoscliente['Presupuestoscliente']['Avisostallere']['id'])); ?></td>
                <td><span><?php __('Centro de Trabajo'); ?></span></td>
                <td><?php echo $pedidoscliente['Presupuestoscliente']['Avisostallere']['Centrostrabajo']['centrotrabajo']; ?></td>
                <td><span><?php __('Máquina'); ?></span></td>
                <td><?php echo $this->Html->link($pedidoscliente['Presupuestoscliente']['Avisostallere']['Maquina']['nombre'], array('controller' => 'maquinas', 'action' => 'view',$pedidoscliente['Presupuestoscliente']['Avisostallere']['Maquina']['id'])); ?></td>
                <td><span><?php __('Nº Serie Máquina'); ?></span></td>
                <td><?php echo $pedidoscliente['Presupuestoscliente']['Avisostallere']['Maquina']['serie_maquina']; ?></td>
                <td><span><?php __('Horas'); ?></span></td>
                <td><?php echo $pedidoscliente['Presupuestoscliente']['Avisostallere']['horas_maquina']; ?></td>
            </tr>
        <?php endif; ?>
        <?php if (!empty($pedidoscliente['Presupuestoscliente']['avisosrepuesto_id'])): ?>
            <tr>
                <td><h4><?php __('Aviso de Repuestos'); ?></h4></td>
                <td><?php echo $this->Html->link($pedidoscliente['Presupuestoscliente']['Avisosrepuesto']['numero'], array('controller' => 'avisosrepuestos', 'action' => 'view', $pedidoscliente['Presupuestoscliente']['Avisosrepuesto']['id'])); ?></td>
                <td><span><?php __('Centro de Trabajo'); ?></span></td>
                <td><?php echo $pedidoscliente['Presupuestoscliente']['Avisosrepuesto']['Centrostrabajo']['centrotrabajo']; ?></td>
                <td><span><?php __('Máquina'); ?></span></td>
                <td><?php echo $this->Html->link($pedidoscliente['Presupuestoscliente']['Avisosrepuesto']['Maquina']['nombre'], array('controller' => 'maquinas', 'action' => 'view',$pedidoscliente['Presupuestoscliente']['Avisosrepuesto']['Maquina']['id'])); ?></td>
                <td><span><?php __('Nº Serie Máquina'); ?></span></td>
                <td><?php echo $pedidoscliente['Presupuestoscliente']['Avisosrepuesto']['Maquina']['serie_maquina']; ?></td>
                <td><span><?php __('Horas'); ?></span></td>
                <td><?php echo $pedidoscliente['Presupuestoscliente']['Avisosrepuesto']['horas_maquina']; ?></td>
            </tr>
        <?php endif; ?>
        <tr>
            <td><span><?php __('Confirmado'); ?></span></td>
            <td><?php echo $pedidoscliente['Pedidoscliente']['confirmado']; ?></td>
            <td colspan="4"></td>
            <td><span><?php __('Nº Aceptación aportado por el cliente'); ?></span></td>
            <td><?php echo $pedidoscliente['Pedidoscliente']['numero_aceptacion_aportado']; ?></td>
        </tr>
        <tr>
            <td><span><?php __('Pedidoescaneado'); ?></span></td>
            <td  colspan="5"><?php echo $this->Html->link(__($pedidoscliente['Pedidoscliente']['pedidoescaneado'], true), '/files/pedidoscliente/' . $pedidoscliente['Pedidoscliente']['pedidoescaneado']); ?></td>
            <td><span><?php __('Recepcion'); ?></span></td>
            <td><?php echo $pedidoscliente['Pedidoscliente']['recepcion']; ?></td>
        </tr>
        <tr>
            <td><span><?php __('Observaciones'); ?></span></td>
            <td  colspan="5"><?php echo $pedidoscliente['Pedidoscliente']['observaciones']; ?></td>
            <td><span><?php __('Plazo de Entrega'); ?></span></td>
            <td><?php echo $pedidoscliente['Pedidoscliente']['fecha_plazo']; ?></td>
        </tr>
    </table>
    <div class="related">
        <h3>Tareas a realizar </h3>
        <div class="actions">
            <ul>
                <li><?php echo $this->Html->link(__('+ Tarea', true), array('controller' => 'tareaspedidosclientes', 'action' => 'add', $pedidoscliente['Pedidoscliente']['id']), array('class' => 'popup')); ?></li>
            </ul>
        </div>
        <table style="background-color: #FFE6CC;">
            <thead><th>Asunto</th><th>Acciones</th></thead>
            <?php foreach ($pedidoscliente['Tareaspedidoscliente'] as $indice => $tarea): ?>
                <tr>
                    <td style="background-color: #FFE6CC">Tarea <?php echo $indice + 1 ?> - <?php echo $tarea['asunto'] ?></td>                  
                    <td class="actions"  style="background-color: #FFE6CC"><?php echo $this->Html->link(__('+ Material', true), array('controller' => 'materiales_tareaspedidosclientes', 'action' => 'add', $tarea['id']), array('class' => 'popup')); ?><?php echo $this->Html->link(__('+ Mano de Obra', true), array('controller' => 'manodeobras_tareaspedidosclientes', 'action' => 'add', $tarea['id']), array('class' => 'popup')); ?><?php if (empty($tarea['TareaspedidosclientesOtrosservicio'])): ?><?php echo $this->Html->link(__('+ Otros Servicios', true), array('controller' => 'tareaspedidosclientes_otrosservicios', 'action' => 'add', $tarea['id']), array('class' => 'popup')); ?><?php endif; ?><?php echo $this->Html->link(__('Ver', true), array('controller' => 'tareaspedidosclientes', 'action' => 'view', $tarea['id'])); ?><?php echo $this->Html->link(__('Editar', true), array('controller' => 'tareaspedidosclientes', 'action' => 'edit', $tarea['id'])); ?><?php echo $this->Html->link(__('Borrar', true), array('controller' => 'tareaspedidosclientes', 'action' => 'delete', $tarea['id'])); ?></td>
                </tr>
                <tr class="tarea-relations">
                    <td colspan="4">
                        <?php if (!empty($tarea['ManodeobrasTareaspedidoscliente'])): ?>
                            <h4>Mano de Obra</h4>
                            <table>
                                <tr><th>Descripcion</th><th>Horas</th><th>Precio Hora</th><th>Descuento</th><th>Importe</th><th>Acciones</th></tr>
                                <?php foreach ($tarea['ManodeobrasTareaspedidoscliente'] as $manodeobra): ?>
                                    <tr><td><?php echo $manodeobra['descripcion'] ?></td><td><?php echo $manodeobra['horas'] ?></td><td><?php echo $manodeobra['precio_hora'] ?></td><td><?php echo $manodeobra['descuento'] ?> %</td><td><?php echo $manodeobra['importe'] ?></td><td class="actions"><?php echo $this->Html->link('Eliminar', array('controller' => 'manodeobras_tareaspedidosclientes', 'action' => 'delete', $manodeobra['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $manodeobra['id'])) ?></td></tr>
                                <?php endforeach; ?>
                            </table>
                            <p style="background-color: #fff; text-align: right;font-weight: bold;">Total de Mano de Obra</p>
                            <p style="background-color: #fff; text-align: right;"><?php echo $tarea['mano_de_obra'] ?> &euro;</p>
                        <?php endif; ?>
                        <?php if (!empty($tarea['TareaspedidosclientesOtrosservicio'])): ?>
                            <h4>Otros Servicios</h4>
                            <table>
                                <tr><th>Desplazamiento</th><th>M.O.D</th><th>Km</th><th>Dietas</th><th>Varios</th><th>Total</th><th>Acciones</th></tr>
                                <?php if (!empty($tarea['TareaspedidosclientesOtrosservicio'])): ?>
                                    <tr>
                                        <td><?php echo $tarea['TareaspedidosclientesOtrosservicio']['desplazamiento'] ?> &euro;</td>
                                        <td><?php echo $tarea['TareaspedidosclientesOtrosservicio']['manoobradesplazamiento'] ?> &euro;</td>
                                        <td><?php echo $tarea['TareaspedidosclientesOtrosservicio']['kilometraje'] ?> Km.</td>
                                        <td><?php echo $tarea['TareaspedidosclientesOtrosservicio']['dietas'] ?></td>
                                        <td><?php echo $tarea['TareaspedidosclientesOtrosservicio']['varios'] ?> &euro;</td>
                                        <td><?php echo $tarea['TareaspedidosclientesOtrosservicio']['total'] ?> &euro;</td>
                                        <td class="actions"><?php echo $this->Html->link('Eliminar', array('controller' => 'tareaspedidosclientes_otrosservicios', 'action' => 'delete', $tarea['TareaspedidosclientesOtrosservicio']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $tarea['TareaspedidosclientesOtrosservicio']['id'])) ?></td>
                                    </tr>
                                <?php endif; ?>
                            </table>

                            <p style="background-color: #fff; text-align: right;font-weight: bold;">Otros Servicios</p>
                            <p style="background-color: #fff; text-align: right;"><?php echo!empty($tarea['TareaspedidosclientesOtrosservicio']['total']) ? $tarea['TareaspedidosclientesOtrosservicio']['total'] : 0 ?> &euro;</p>

                        <?php endif; ?>
                        <h4>MaterialesTareaspedidosclientes</h4>
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
                            <?php foreach ($tarea['MaterialesTareaspedidoscliente'] as $materiale): ?>
                                <tr>
                                    <td><?php echo $materiale['Articulo']['nombre'] ?></td>
                                    <td><?php echo $materiale['cantidad'] ?></td>
                                    <td><?php echo $materiale['precio_unidad'] ?></td>
                                    <td><?php echo $materiale['descuento'] ?> %</td>
                                    <td><?php echo $materiale['importe'] ?></td>
                                    <td class="actions"><?php echo $this->Html->link('Eliminar', array('controller' => 'materiales_tareaspedidosclientes', 'action' => 'delete', $materiale['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $materiale['id'])) ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </table>
                        <p style="background-color: #fff; text-align: right;font-weight: bold;">Total de MaterialesTareaspedidosclientes</p>
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
                            <td><?php echo $pedidoscliente['Pedidoscliente']['precio']; ?> &euro;</td>
                            <td>Impuestos</td>
                            <td><?php echo $pedidoscliente['Pedidoscliente']['impuestos']; ?> &euro;</td>
                        </tr>
                        <tr >
                            <td colspan="6" style="text-align: right;">Total Presupuesto</td>
                            <td colspan="2"><?php echo $pedidoscliente['Pedidoscliente']['impuestos'] + $pedidoscliente['Pedidoscliente']['precio']; ?> </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
        <div class="actions">
            <ul>
                <?php if (!empty($pedidoscliente['Presupuestoscliente']['avisosrepuesto_id']) || !empty($pedidoscliente['Presupuestoscliente']['Presupuestosproveedore']['avisosrepuesto_id'])): ?>
                    <li><?php echo $this->Html->link(__('Nuevo Albaran de Venta', true), array('controller' => 'albaranesclientes', 'action' => 'add', 'pedidoscliente', $pedidoscliente['Pedidoscliente']['id'])); ?></li>
                <?php endif; ?>
                <li><?php echo $this->Html->link(__('Imputar a Orden', true), array('controller' => 'ordenes', 'action' => 'imputar', $pedidoscliente['Pedidoscliente']['id'])); ?></li>
            </ul>
        </div>
    </div>
</div>
