<div class="presupuestosclientes">
    <h2>
        <?php __('Presupuestoscliente'); ?>
        <?php echo $this->Html->link(__('Editar', true), array('action' => 'edit', $presupuestoscliente['Presupuestoscliente']['id']), array('class' => 'button_link')); ?> 
        <?php echo $this->Html->link(__('Eliminar', true), array('action' => 'delete', $presupuestoscliente['Presupuestoscliente']['id']), array('class' => 'button_link'), sprintf(__('Are you sure you want to delete # %s?', true), $presupuestoscliente['Presupuestoscliente']['numero'])); ?> 
        <?php echo $this->Html->link(__('Listar Presupuestos a Clientes', true), array('action' => 'index'), array('class' => 'button_link')); ?> 
        <?php echo $this->Html->link(__('Nuevo Pedido de Clidente', true), array('controller' => 'pedidosclientes', 'action' => 'add', $presupuestoscliente['Presupuestoscliente']['id']),array('class' => 'button_link')); ?>
    </h2>
    <table class="view">
        <tr>
            <td><span><?php __('Número'); ?></span></td>
            <td><?php echo $presupuestoscliente['Presupuestoscliente']['numero']; ?></td>
            <td><span><?php __('Fecha'); ?></span></td>
            <td><?php echo $presupuestoscliente['Presupuestoscliente']['fecha']; ?></td>
            <td><span><?php __('Almacén de los Materiales'); ?></span></td>
            <td><?php echo $presupuestoscliente['Almacene']['nombre']; ?></td>
            <td><span><?php __('Confirmado'); ?></span></td>
            <td><?php echo $presupuestoscliente['Presupuestoscliente']['confirmado'] == 0 ? 'No' : 'Sí'; ?></td>
            <td><span><?php __('Comercial'); ?></span></td>
            <td><?php echo $presupuestoscliente['Comerciale']['nombre']; ?> <?php echo $presupuestoscliente['Comerciale']['apellidos']; ?></td>
        </tr>
        <tr>
            <td><span><?php __('Cliente'); ?></span></td>
            <td colspan="9"><?php echo $this->Html->link($presupuestoscliente['Cliente']['nombre'], array('controller' => 'clientes', 'action' => 'view', $presupuestoscliente['Cliente']['id'])); ?></td>
        </tr>
        <?php if (!empty($presupuestoscliente['Presupuestoscliente']['ordene_id'])): ?>
            <tr>
                <td><h4><?php __('Orden'); ?></h4></td>
                <td><?php echo $this->Html->link($presupuestoscliente['Ordene']['numero'], array('controller' => 'ordenes', 'action' => 'view', $presupuestoscliente['Ordene']['id'])); ?></td>
                <td><span><?php __('Centro de Trabajo'); ?></span></td>
                <td><?php echo $presupuestoscliente['Ordene']['Avisostallere']['Centrostrabajo']['centrotrabajo']; ?></td>
                <td><span><?php __('Máquina'); ?></span></td>
                <td><?php echo $presupuestoscliente['Ordene']['Avisostallere']['Maquina']['nombre']; ?></td>
                <td><span><?php __('Nº Serie Máquina'); ?></span></td>
                <td><?php echo $presupuestoscliente['Ordene']['Avisostallere']['Maquina']['serie_maquina']; ?></td>
                <td><span><?php __('Horas'); ?></span></td>
                <td><?php echo $presupuestoscliente['Ordene']['Avisostallere']['horas_maquina']; ?></td>
            </tr>
        <?php endif; ?>
        <?php if (!empty($presupuestoscliente['Presupuestoscliente']['avisostallere_id'])): ?>
            <tr>
                <td><h4><?php __('Aviso de Taller'); ?></h4></td>
                <td><?php echo $this->Html->link($presupuestoscliente['Avisostallere']['numero'], array('controller' => 'avisostalleres', 'action' => 'view', $presupuestoscliente['Avisostallere']['id'])); ?></td>
                <td><span><?php __('Centro de Trabajo'); ?></span></td>
                <td><?php echo $presupuestoscliente['Avisostallere']['Centrostrabajo']['centrotrabajo']; ?></td>
                <td><span><?php __('Máquina'); ?></span></td>
                <td><?php echo $presupuestoscliente['Avisostallere']['Maquina']['nombre']; ?></td>
                <td><span><?php __('Nº Serie Máquina'); ?></span></td>
                <td><?php echo $presupuestoscliente['Avisostallere']['Maquina']['serie_maquina']; ?></td>
                <td><span><?php __('Horas'); ?></span></td>
                <td><?php echo $presupuestoscliente['Avisostallere']['horas_maquina']; ?></td>
            </tr>
        <?php endif; ?>
        <?php if (!empty($presupuestoscliente['Presupuestoscliente']['avisosrepuesto_id'])): ?>
            <tr>
                <td><h4><?php __('Aviso de Repuestos'); ?></h4></td>
                <td><?php echo $this->Html->link($presupuestoscliente['Avisosrepuesto']['numero'], array('controller' => 'avisosrepuestos', 'action' => 'view', $presupuestoscliente['Avisosrepuesto']['id'])); ?></td>
                <td><span><?php __('Centro de Trabajo'); ?></span></td>
                <td><?php echo $presupuestoscliente['Avisosrepuesto']['Centrostrabajo']['centrotrabajo']; ?></td>
                <td><span><?php __('Máquina'); ?></span></td>
                <td><?php echo $presupuestoscliente['Avisosrepuesto']['Maquina']['nombre']; ?></td>
                <td><span><?php __('Nº Serie Máquina'); ?></span></td>
                <td><?php echo $presupuestoscliente['Avisosrepuesto']['Maquina']['serie_maquina']; ?></td>
                <td><span><?php __('Horas'); ?></span></td>
                <td><?php echo $presupuestoscliente['Avisosrepuesto']['horas_maquina']; ?></td>
            </tr>
        <?php endif; ?>
        <tr>
            <td><span><?php __('Mensaje'); ?></span></td>
            <td colspan="9"><?php echo $presupuestoscliente['Mensajesinformativo']['mensaje']; ?></td>
        </tr>
        <tr>
            <td><span><?php __('Observaciones'); ?></span></td>
            <td colspan="7"><?php echo $presupuestoscliente['Presupuestoscliente']['observaciones']; ?></td>
            <td><span><?php __('Avisar'); ?></span></td>
            <td><?php echo $presupuestoscliente['Presupuestoscliente']['avisar'] == 0 ? 'No' : 'Sí'; ?></td>
        </tr>
        <tr>
            <td><span><?php __('Presupuesto Enviado Fecha'); ?></span></td>
            <td><?php echo $presupuestoscliente['Presupuestoscliente']['fecha_enviado']; ?></td>
            <td><span><?php __('Tipo de IVA') ?></span></td>
            <td><?php echo $presupuestoscliente['Tiposiva']['tipoiva']; ?> <?php echo $presupuestoscliente['Tiposiva']['porcentaje_aplicable']; ?> &percnt;</td>
            <?php if (!empty($presupuestoscliente['Presupuestosproveedore']['id'])): ?>
                <td><span><?php __('Presupuesto de Proveedor') ?></span></td>
                <td><?php echo $this->Html->link($presupuestoscliente['Presupuestosproveedore']['numero'], array('controller' => 'presupuestosproveedores', 'action' => 'view', $presupuestoscliente['Presupuestosproveedore']['id'])); ?></td>
            <?php endif; ?>
        </tr>
    </table>

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
<div id="loading_background">
    <div id="loading_animation"></div>
</div>