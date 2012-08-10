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
        <?php if (!empty($pedidoscliente['Pedidoscliente']['ordene_id'])): ?>
            <tr>
                <td><h4><?php __('Nº Orden'); ?></h4></td>
                <td><?php echo $this->Html->link($pedidoscliente['Pedidoscliente']['Ordene']['numero'], array('controller' => 'ordenes', 'action' => 'view', $pedidoscliente['Pedidoscliente']['Ordene']['id'])); ?></td>
                <td><span><?php __('Centro de Trabajo'); ?></span></td>
                <td><?php echo $pedidoscliente['Pedidoscliente']['Ordene']['Avisostallere']['Centrostrabajo']['centrotrabajo']; ?></td>
                <td><span><?php __('Máquina'); ?></span></td>
                <td><?php echo $this->Html->link($pedidoscliente['Pedidoscliente']['Ordene']['Avisostallere']['Maquina']['nombre'], array('controller' => 'maquinas', 'action' => 'view', $pedidoscliente['Pedidoscliente']['Ordene']['Avisostallere']['Maquina']['id'])); ?></td>
                <td><span><?php __('Nº Serie Máquina'); ?></span></td>
                <td><?php echo $pedidoscliente['Pedidoscliente']['Ordene']['Avisostallere']['Maquina']['serie_maquina']; ?></td>
                <td><span><?php __('Horas'); ?></span></td>
                <td><?php echo $pedidoscliente['Pedidoscliente']['Ordene']['Avisostallere']['horas_maquina']; ?></td>
            </tr>
        <?php endif; ?>
        <?php if (!empty($pedidoscliente['Pedidoscliente']['avisostallere_id'])): ?>
            <tr>
                <td><h4><?php __('Aviso de Taller'); ?></h4></td>
                <td><?php echo $this->Html->link($pedidoscliente['Pedidoscliente']['Avisostallere']['numero'], array('controller' => 'avisostalleres', 'action' => 'view', $pedidoscliente['Pedidoscliente']['Avisostallere']['id'])); ?></td>
                <td><span><?php __('Centro de Trabajo'); ?></span></td>
                <td><?php echo $pedidoscliente['Pedidoscliente']['Avisostallere']['Centrostrabajo']['centrotrabajo']; ?></td>
                <td><span><?php __('Máquina'); ?></span></td>
                <td><?php echo $this->Html->link($pedidoscliente['Pedidoscliente']['Avisostallere']['Maquina']['nombre'], array('controller' => 'maquinas', 'action' => 'view', $pedidoscliente['Pedidoscliente']['Avisostallere']['Maquina']['id'])); ?></td>
                <td><span><?php __('Nº Serie Máquina'); ?></span></td>
                <td><?php echo $pedidoscliente['Pedidoscliente']['Avisostallere']['Maquina']['serie_maquina']; ?></td>
                <td><span><?php __('Horas'); ?></span></td>
                <td><?php echo $pedidoscliente['Pedidoscliente']['Avisostallere']['horas_maquina']; ?></td>
            </tr>
        <?php endif; ?>
        <?php if (!empty($pedidoscliente['Pedidoscliente']['avisosrepuesto_id'])): ?>
            <tr>
                <td><h4><?php __('Aviso de Repuestos'); ?></h4></td>
                <td><?php echo $this->Html->link($pedidoscliente['Pedidoscliente']['Avisosrepuesto']['numero'], array('controller' => 'avisosrepuestos', 'action' => 'view', $pedidoscliente['Pedidoscliente']['Avisosrepuesto']['id'])); ?></td>
                <td><span><?php __('Centro de Trabajo'); ?></span></td>
                <td><?php echo $pedidoscliente['Pedidoscliente']['Avisosrepuesto']['Centrostrabajo']['centrotrabajo']; ?></td>
                <td><span><?php __('Máquina'); ?></span></td>
                <td><?php echo $this->Html->link($pedidoscliente['Pedidoscliente']['Avisosrepuesto']['Maquina']['nombre'], array('controller' => 'maquinas', 'action' => 'view', $pedidoscliente['Pedidoscliente']['Avisosrepuesto']['Maquina']['id'])); ?></td>
                <td><span><?php __('Nº Serie Máquina'); ?></span></td>
                <td><?php echo $pedidoscliente['Pedidoscliente']['Avisosrepuesto']['Maquina']['serie_maquina']; ?></td>
                <td><span><?php __('Horas'); ?></span></td>
                <td><?php echo $pedidoscliente['Pedidoscliente']['Avisosrepuesto']['horas_maquina']; ?></td>
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
            <thead><th>Tipo</th><th>Asunto</th><th>Acciones</th></thead>
            <?php foreach ($pedidoscliente['Tareaspedidoscliente'] as $indice => $tarea): ?>
                <tr>
                    <td style="background-color: #FFE6CC"><?php echo $tarea['tipo'] ?></td>                  
                    <td style="background-color: #FFE6CC">Tarea <?php echo $indice + 1 ?> - <?php echo $tarea['asunto'] ?></td>                  
                    <td class="actions"  style="background-color: #FFE6CC">
                        <?php echo $this->Html->link(__('+ Material', true), array('controller' => 'materiales_tareaspedidosclientes', 'action' => 'add', $tarea['id']), array('class' => 'popup')); ?>
                        <?php if ($tarea['tipo'] != 'repuestos'): ?>
                            <?php echo $this->Html->link(__('+ Mano de Obra', true), array('controller' => 'manodeobras_tareaspedidosclientes', 'action' => 'add', $tarea['id']), array('class' => 'popup')); ?>
                        <?php endif; ?>
                        <?php if (empty($tarea['TareaspedidosclientesOtrosservicio'])): ?>
                            <?php echo $this->Html->link(__('+ Otros Conceptos', true), array('controller' => 'tareaspedidosclientes_otrosservicios', 'action' => 'add', $tarea['id']), array('class' => 'popup')); ?>
                        <?php endif; ?>
                        <?php echo $this->Html->link(__('Borrar', true), array('controller' => 'tareaspedidosclientes', 'action' => 'delete', $tarea['id'])); ?>
                    </td>
                </tr>
                <tr class="tarea-relations">
                    <td colspan="5">
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
                            <h4>Otros Conceptos</h4>
                            <table>
                                <tr><th colspan="4">Desplazamiento</th></tr>
                                <tr><th>Precio Fijo Desplazamiento</th><th>Precio Desplazamiento de Mano de Obra</th><th>Precio Kilometraje</th><th>Total Desplazamiento</th><th>Dietas</th><th>Varios</th><th>Varios Descripción</th><th>Total</th><th>Acciones</th></tr>
                                <?php if (!empty($tarea['TareaspedidosclientesOtrosservicio'])): ?>
                                    <tr>
                                        <td><?php echo $tarea['TareaspedidosclientesOtrosservicio']['desplazamiento'] ?> &euro;</td>
                                        <td><?php echo $tarea['TareaspedidosclientesOtrosservicio']['manoobradesplazamiento'] ?> &euro;</td>
                                        <td><?php echo $tarea['TareaspedidosclientesOtrosservicio']['kilometraje'] ?> &euro;</td>
                                        <td><?php echo $tarea['TareaspedidosclientesOtrosservicio']['total_desplazamiento'] ?> &euro;</td>
                                        <td><?php echo $tarea['TareaspedidosclientesOtrosservicio']['dietas'] ?> &euro;</td>
                                        <td><?php echo $tarea['TareaspedidosclientesOtrosservicio']['varios'] ?> &euro;</td>
                                        <td><?php echo $tarea['TareaspedidosclientesOtrosservicio']['varios_descripcion'] ?></td>
                                        <td><?php echo $tarea['TareaspedidosclientesOtrosservicio']['total'] ?> &euro;</td>
                                        <td class="actions"><?php echo $this->Html->link('Eliminar', array('controller' => 'tareaspedidosclientes_otrosservicios', 'action' => 'delete', $tarea['TareaspedidosclientesOtrosservicio']['id']), null, sprintf(__('Seguro que quieres eliminar los otros conceptos?', true), $tarea['TareaspedidosclientesOtrosservicio']['id'])) ?></td>
                                    </tr>
                                <?php endif; ?>
                            </table>
                            <p style="background-color: #fff; text-align: right;font-weight: bold;">Otros Conceptos</p>
                            <p style="background-color: #fff; text-align: right;"><?php echo!empty($tarea['TareaspedidosclientesOtrosservicio']['total']) ? $tarea['TareaspedidosclientesOtrosservicio']['total'] : 0 ?> &euro;</p>
                        <?php endif; ?>
                        <?php if (!empty($tarea['MaterialesTareaspedidoscliente'])): ?>
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
                                <?php foreach ($tarea['MaterialesTareaspedidoscliente'] as $materiale): ?>
                                    <tr>
                                        <td><?php echo $materiale['Articulo']['nombre'] ?></td>
                                        <td><?php echo $materiale['cantidad'] ?></td>
                                        <td><?php echo $materiale['precio_unidad'] ?></td>
                                        <td><?php echo $materiale['descuento'] ?> %</td>
                                        <td><?php echo $materiale['importe'] ?></td>
                                        <td class="actions"><?php echo $this->Html->link('Eliminar', array('controller' => 'materiales_tareaspedidosclientes', 'action' => 'delete', $materiale['id']), null, sprintf(__('Seguro que quieres borrar el material?', true), $materiale['id'])) ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </table>
                            <p style="background-color: #fff; text-align: right;font-weight: bold;">Total de Materiales</p>
                            <p style="background-color: #fff; text-align: right;"><?php echo $tarea['materiales'] ?> &euro;</p>                        
                        <?php endif; ?>
                        <p style="background-color: #FFE6CC; text-align: right;font-weight: bold;font-size: 15px;">Total Tarea</p>
                        <p style="background-color: #FFE6CC; text-align: right;"><?php echo $tarea['total']; ?> &euro;</p>
                    </td>
                </tr>
            <?php endforeach; ?>
            <tr>
                <td colspan="3">
                    <table style="font-size: 16px; font-weight: bold;text-align: right;">
                        <tr>
                            <td>Total Mano de Obra y Otros Conceptos</td>
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

        <div style="margin: 20px">
            <?php echo $this->Html->link(__('Nuevo Albaran de Venta', true), array('controller' => 'albaranesclientes', 'action' => 'add', 'pedidoscliente', $pedidoscliente['Pedidoscliente']['id']), array('class' => 'button_link')); ?>
            <?php echo $this->Html->link(__('Imputar a Orden', true), array('controller' => 'ordenes', 'action' => 'imputar', $pedidoscliente['Pedidoscliente']['id']), array('class' => 'button_link')); ?>
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
                    if (!empty($pedidoscliente['Presupuestoscliente']['id'])):
                        $class = null;
                        $i++;
                        if ($i % 2 == 0)
                            $class = ' class="alt"';
                        ?>
                        <tr <?php echo $class ?>>
                            <td>Presupuesto a Cliente</td>
                            <td><?php echo $pedidoscliente['Presupuestoscliente']['numero'] ?></td>
                            <td><?php echo!empty($pedidoscliente['Presupuestoscliente']['fecha']) ? $this->Time->format('d-m-Y', $pedidoscliente['Presupuestoscliente']['fecha']) : '' ?></td>
                            <td><?php echo $pedidoscliente['Presupuestoscliente']['Cliente']['nombre'] ?></td>
                            <td><?php echo $this->Html->link('Ver', array('controller' => 'presupuestosclientes', 'action' => 'view', $pedidoscliente['Presupuestoscliente']['id']), array('class' => 'button_brownie')) ?></td>
                        </tr>
                    <?php endif; ?>
                    <?php
                    if (!empty($pedidoscliente['Presupuestoscliente']['Avisosrepuestos']['id'])):
                        $class = null;
                        $i++;
                        if ($i % 2 == 0)
                            $class = ' class="alt"';
                        ?>
                        <tr <?php echo $class ?>>
                            <td>Aviso de Repuestos</td>
                            <td><?php echo $pedidoscliente['Presupuestoscliente']['Avisosrepuestos']['numero'] ?></td>
                            <td><?php echo!empty($pedidoscliente['Presupuestoscliente']['Avisosrepuestos']['fecha']) ? $this->Time->format('d-m-Y', $pedidoscliente['Presupuestoscliente']['Avisosrepuestos']['fecha']) : '' ?></td>
                            <td><?php echo $pedidoscliente['Presupuestoscliente']['Avisosrepuestos']['Cliente']['nombre'] ?></td>
                            <td><?php echo $this->Html->link('Ver', array('controller' => 'avisosrepuestos', 'action' => 'view', $pedidoscliente['Presupuestoscliente']['Avisosrepuestos']['id']), array('class' => 'button_brownie')) ?></td>
                        </tr>
                    <?php endif; ?>
                    <?php
                    if (!empty($pedidoscliente['Presupuestoscliente']['Avisostallere']['id'])):
                        $class = null;
                        $i++;
                        if ($i % 2 == 0)
                            $class = ' class="alt"';
                        ?>
                        <tr <?php echo $class ?>>
                            <td>Aviso de Taller</td>
                            <td><?php echo $pedidoscliente['Presupuestoscliente']['Avisostallere']['numero'] ?></td>
                            <td><?php echo!empty($pedidoscliente['Presupuestoscliente']['Avisostallere']['fecha']) ? $this->Time->format('d-m-Y', $pedidoscliente['Presupuestoscliente']['Avisostallere']['fecha']) : '' ?></td>
                            <td><?php echo $pedidoscliente['Presupuestoscliente']['Avisostallere']['Cliente']['nombre'] ?></td>
                            <td><?php echo $this->Html->link('Ver', array('controller' => 'avisostalleres', 'action' => 'view', $pedidoscliente['Presupuestoscliente']['Avisostallere']['id']), array('class' => 'button_brownie')) ?></td>
                        </tr>
                    <?php endif; ?>
                    <?php
                    if (!empty($pedidoscliente['Presupuestoscliente']['Presupuestosproveedore']['id'])):
                        $class = null;
                        $i++;
                        if ($i % 2 == 0)
                            $class = ' class="alt"';
                        ?>
                        <tr <?php echo $class ?>>
                            <td>Presupuesto de Proveedor</td>
                            <td><?php echo $pedidoscliente['Presupuestoscliente']['Presupuestosproveedore']['numero'] ?></td>
                            <td><?php echo!empty($pedidoscliente['Presupuestoscliente']['Presupuestosproveedore']['fecha']) ? $this->Time->format('d-m-Y', $pedidoscliente['Presupuestoscliente']['Presupuestosproveedore']['fecha']) : '' ?></td>
                            <td><?php echo $pedidoscliente['Presupuestoscliente']['Presupuestosproveedore']['Proveedore']['nombre'] ?></td>
                            <td><?php echo $this->Html->link('Ver', array('controller' => 'presupuestosproveedores', 'action' => 'view', $pedidoscliente['Presupuestoscliente']['Presupuestosproveedore']['id']), array('class' => 'button_brownie')) ?></td>
                        </tr>
                    <?php endif; ?>
                    <?php
                    foreach ($pedidoscliente['Albaranescliente'] as $albaranescliente):
                        $class = null;
                        $i++;
                        if ($i % 2 == 0)
                            $class = ' class="alt"';
                        ?>
                        <tr <?php echo $class ?>>
                            <td>Albaranes de Cliente</td>
                            <td><?php echo $albaranescliente['numero'] ?></td>
                            <td><?php echo!empty($albaranescliente['fecha']) ? $this->Time->format('d-m-Y', $albaranescliente['fecha']) : '' ?></td>
                            <td><?php echo $albaranescliente['Cliente']['nombre'] ?></td>
                            <td><?php echo $this->Html->link('Ver', array('controller' => 'pedidosclientes', 'action' => 'view', $albaranescliente['id']), array('class' => 'button_brownie')) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
