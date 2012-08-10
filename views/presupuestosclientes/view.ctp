<div class="presupuestosclientes">
    <h2>
        <?php __('Presupuestos a Cliente'); ?>
        <?php echo $this->Html->link(__('Editar', true), array('action' => 'edit', $presupuestoscliente['Presupuestoscliente']['id']), array('class' => 'button_link')); ?> 
        <?php echo $this->Html->link(__('Eliminar', true), array('action' => 'delete', $presupuestoscliente['Presupuestoscliente']['id']), array('class' => 'button_link'), sprintf(__('Are you sure you want to delete # %s?', true), $presupuestoscliente['Presupuestoscliente']['numero'])); ?> 
        <?php echo $this->Html->link(__('Listar Presupuestos a Clientes', true), array('action' => 'index'), array('class' => 'button_link')); ?> 
        <?php echo $this->Html->link(__('Nuevo Pedido de Clidente', true), array('controller' => 'pedidosclientes', 'action' => 'add', $presupuestoscliente['Presupuestoscliente']['id']), array('class' => 'button_link')); ?>
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
            <td colspan="3"><?php echo $this->Html->link($presupuestoscliente['Cliente']['nombre'], array('controller' => 'clientes', 'action' => 'view', $presupuestoscliente['Cliente']['id'])); ?></td>
            <td colspan="2"><span><?php __('Centro de Trabajo'); ?></span></td>
            <td colspan="2"><?php echo $presupuestoscliente['Centrostrabajo']['centrotrabajo']; ?></td>
            <td><span><?php __('Maquina'); ?></span></td>
            <td><?php echo $presupuestoscliente['Maquina']['nombre']; ?></td>
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
            <td><span>Estado</span></td>
            <td colspan="3"><?php echo $presupuestoscliente['Estadospresupuestoscliente']['estado']; ?></td>
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
            <thead><th>Tipo</th><th>Asunto</th><th>Acciones</th></thead>
            <?php foreach ($presupuestoscliente['Tareaspresupuestocliente'] as $indice => $tarea): ?>
                <tr>
                    <td style="background-color: #FFE6CC"><?php echo $tarea['tipo'] ?></td>                  
                    <td style="background-color: #FFE6CC">Tarea <?php echo $indice + 1 ?> - <?php echo $tarea['asunto'] ?></td>                  
                    <td class="actions"  style="background-color: #FFE6CC">
                        <?php echo $this->Html->link(__('+ Material', true), array('controller' => 'materiales', 'action' => 'add', $tarea['id']), array('class' => 'popup')); ?>
                        <?php if ($tarea['tipo'] != 'repuestos'): ?>
                            <?php echo $this->Html->link(__('+ Mano de Obra', true), array('controller' => 'manodeobras', 'action' => 'add', $tarea['id']), array('class' => 'popup')); ?>
                        <?php endif; ?>
                        <?php if (empty($tarea['TareaspresupuestoclientesOtrosservicio'])): ?>
                            <?php echo $this->Html->link(__('+ Otros Conceptos', true), array('controller' => 'tareaspresupuestoclientes_otrosservicios', 'action' => 'add', $tarea['id']), array('class' => 'popup')); ?>
                        <?php endif; ?>
                        <?php echo $this->Html->link(__('Editar', true), array('controller' => 'tareaspresupuestoclientes', 'action' => 'edit', $tarea['id']), array('class' => 'popup')); ?>
                        <?php echo $this->Html->link(__('Borrar', true), array('controller' => 'tareaspresupuestoclientes', 'action' => 'delete', $tarea['id'])); ?>
                    </td>
                </tr>
                <tr class="tarea-relations">
                    <td colspan="5">
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
                            <h4>Otros Conceptos</h4>
                            <table>
                                <tr><th colspan="4">Desplazamiento</th></tr>
                                <tr><th>Precio Fijo Desplazamiento</th><th>Precio Desplazamiento de Mano de Obra</th><th>Precio Kilometraje</th><th>Total Desplazamiento</th><th>Dietas</th><th>Varios</th><th>Varios Descripción</th><th>Total</th><th>Acciones</th></tr>
                                <?php if (!empty($tarea['TareaspresupuestoclientesOtrosservicio'])): ?>
                                    <tr>
                                        <td><?php echo $tarea['TareaspresupuestoclientesOtrosservicio']['desplazamiento'] ?> &euro;</td>
                                        <td><?php echo $tarea['TareaspresupuestoclientesOtrosservicio']['manoobradesplazamiento'] ?> &euro;</td>
                                        <td><?php echo $tarea['TareaspresupuestoclientesOtrosservicio']['kilometraje'] ?> &euro;</td>
                                        <td><?php echo $tarea['TareaspresupuestoclientesOtrosservicio']['total_desplazamiento'] ?> &euro;</td>
                                        <td><?php echo $tarea['TareaspresupuestoclientesOtrosservicio']['dietas'] ?> &euro;</td>
                                        <td><?php echo $tarea['TareaspresupuestoclientesOtrosservicio']['varios'] ?> &euro;</td>
                                        <td><?php echo $tarea['TareaspresupuestoclientesOtrosservicio']['varios_descripcion'] ?></td>
                                        <td><?php echo $tarea['TareaspresupuestoclientesOtrosservicio']['total'] ?> &euro;</td>
                                        <td class="actions"><?php echo $this->Html->link('Eliminar', array('controller' => 'tareaspresupuestoclientes_otrosservicios', 'action' => 'delete', $tarea['TareaspresupuestoclientesOtrosservicio']['id']), null, sprintf(__('Seguro que quieres eliminar los otros conceptos?', true), $tarea['TareaspresupuestoclientesOtrosservicio']['id'])) ?></td>
                                    </tr>
                                <?php endif; ?>
                            </table>
                            <p style="background-color: #fff; text-align: right;font-weight: bold;">Otros Conceptos</p>
                            <p style="background-color: #fff; text-align: right;"><?php echo!empty($tarea['TareaspresupuestoclientesOtrosservicio']['total']) ? $tarea['TareaspresupuestoclientesOtrosservicio']['total'] : 0 ?> &euro;</p>
                        <?php endif; ?>

                        <h4>Materiales</h4>              
                        <table class="tabla_materiales_tarea" id="tareaid-<?php echo $tarea['id'] ?>">
                            <tr class="tr_titulos">
                                <th>Ref.</th>
                                <th>Articulo</th>
                                <th>Cantidad</th>
                                <th>Precio Ud.</th>
                                <th>Descuento</th>
                                <th>Importe</th>
                            </tr>
                            <?php if (!empty($tarea['Materiale'])): ?>
                                <?php foreach ($tarea['Materiale'] as $materiale): ?>
                                    <tr id="materialeid-<?php echo $materiale['id'] ?>">
                                        <td><?php echo $materiale['Articulo']['ref'] ?></td>
                                        <td><?php echo $materiale['Articulo']['nombre'] ?></td>
                                        <td><?php echo $materiale['cantidad'] ?></td>
                                        <td><?php echo $materiale['precio_unidad'] ?></td>
                                        <td><?php echo $materiale['descuento'] ?> %</td>
                                        <td><?php echo redondear_dos_decimal($materiale['importe']) ?></td>
                                        <td class="actions"><?php echo $this->Html->link('Eliminar', array('controller' => 'materiales', 'action' => 'delete', $materiale['id']), null, sprintf(__('Seguro que quieres borrar el material?', true), $materiale['id'])) ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </table>
                        <p style="background-color: #fff; text-align: right;font-weight: bold;">Total de Materiales</p>
                        <p style="background-color: #fff; text-align: right;"><?php echo $tarea['materiales'] ?> &euro;</p>                        
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
        <div style="margin:20px;">
            <?php echo $this->Html->link(__('Nuevo Pedido de Cliente', true), array('controller' => 'pedidosclientes', 'action' => 'add', $presupuestoscliente['Presupuestoscliente']['id']), array('class' => 'button_link')); ?>
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
                    if (!empty($presupuestoscliente['Avisostallere']['id'])):
                        $class = null;
                        $i++;
                        if ($i % 2 == 0)
                            $class = ' class="alt"';
                        ?>
                        <tr <?php echo $class ?>>
                            <td>Aviso de Taller</td>
                            <td><?php echo $presupuestoscliente['Avisostallere']['numero'] ?></td>
                            <td><?php echo!empty($presupuestoscliente['Avisostallere']['fecha']) ? $this->Time->format('d-m-Y', $presupuestoscliente['Avisostallere']['fecha']) : '' ?></td>
                            <td><?php echo $presupuestoscliente['Avisostallere']['Cliente']['nombre'] ?></td>
                            <td><?php echo $this->Html->link('Ver', array('controller' => 'avisostallere', 'action' => 'view', $presupuestoscliente['Avisostallere']['id']), array('class' => 'button_brownie')) ?></td>
                        </tr>
                    <?php endif; ?>
                    <?php
                    if (!empty($presupuestoscliente['Avisosrepuesto']['id'])):
                        $class = null;
                        $i++;
                        if ($i % 2 == 0)
                            $class = ' class="alt"';
                        ?>
                        <tr <?php echo $class ?>>
                            <td>Aviso de Repuestos</td>
                            <td><?php echo $presupuestoscliente['Avisosrepuesto']['numero'] ?></td>
                            <td><?php echo!empty($presupuestoscliente['Avisosrepuesto']['fecha']) ? $this->Time->format('d-m-Y', $presupuestoscliente['Avisosrepuesto']['fecha']) : '' ?></td>
                            <td><?php echo $presupuestoscliente['Avisosrepuesto']['Cliente']['nombre'] ?></td>
                            <td><?php echo $this->Html->link('Ver', array('controller' => 'avisosrepuestos', 'action' => 'view', $presupuestoscliente['Avisosrepuesto']['id']), array('class' => 'button_brownie')) ?></td>
                        </tr>
                    <?php endif; ?>
                    <?php
                    if (!empty($presupuestoscliente['Ordene']['id'])):
                        $class = null;
                        $i++;
                        if ($i % 2 == 0)
                            $class = ' class="alt"';
                        ?>
                        <tr <?php echo $class ?>>
                            <td>Orden</td>
                            <td><?php echo $presupuestoscliente['Ordene']['numero'] ?></td>
                            <td><?php echo!empty($presupuestoscliente['Ordene']['fecha']) ? $this->Time->format('d-m-Y', $presupuestoscliente['Ordene']['fecha']) : '' ?></td>
                            <td><?php echo $presupuestoscliente['Ordene']['Avisostallere']['Cliente']['nombre'] ?></td>
                            <td><?php echo $this->Html->link('Ver', array('controller' => 'ordenes', 'action' => 'view', $presupuestoscliente['Ordene']['id']), array('class' => 'button_brownie')) ?></td>
                        </tr>
                    <?php endif; ?>
                    <?php
                    foreach ($presupuestoscliente['Pedidoscliente'] as $pedidoscliente):
                        $class = null;
                        $i++;
                        if ($i % 2 == 0)
                            $class = ' class="alt"';
                        ?>
                        <tr <?php echo $class ?>>
                            <td>Pedido de Cliente</td>
                            <td><?php echo $pedidoscliente['numero'] ?></td>
                            <td><?php echo!empty($pedidoscliente['fecha']) ? $this->Time->format('d-m-Y', $pedidoscliente['fecha']) : '' ?></td>
                            <td><?php echo $presupuestoscliente['Cliente']['nombre'] ?></td>
                            <td><?php echo $this->Html->link('Ver', array('controller' => 'pedidosclientes', 'action' => 'view', $pedidoscliente['id']), array('class' => 'button_brownie')) ?></td>
                        </tr>
                    <?php endforeach; ?>
                    <?php
                    if (!empty($presupuestoscliente['Presupuestoproveedores']['id'])):
                        $class = null;
                        $i++;
                        if ($i % 2 == 0)
                            $class = ' class="alt"';
                        ?>
                        <tr <?php echo $class ?>>
                            <td>Presupuesto de Proveedor</td>
                            <td><?php echo $presupuestoscliente['Presupuestoproveedores']['numero'] ?></td>
                            <td><?php echo!empty($presupuestoscliente['Presupuestoproveedores']['fecha']) ? $this->Time->format('d-m-Y', $presupuestoscliente['Presupuestoproveedores']['fecha']) : '' ?></td>
                            <td><?php echo $presupuestoscliente['Presupuestoproveedores']['Proveedore']['nombre'] ?></td>
                            <td><?php echo $this->Html->link('Ver', array('controller' => 'presupuestoproveedores', 'action' => 'view', $presupuestoscliente['Presupuestoproveedores']['id']), array('class' => 'button_brownie')) ?></td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script>
    $(function() {
        $( ".tabla_materiales_tarea" ).sortable({
            connectWith: ".tabla_materiales_tarea",
            items: "tr:not(.tr_titulos)",
            receive: function(event, ui) {
                tareaspresupuestocliente_id = event.target.id.substring(8); // cortamos por 'tareaid-'
                materiale_id = ui.item.context.id.substring(12); // cortamos por 'materialeid-'
                $.post('/daferapp/materiales/update_tarea/',{'data': {'tareaspresupuestocliente_id': tareaspresupuestocliente_id, 'materiale_id': materiale_id}});
                window.location.reload()
            }
        }).disableSelection();
    });
</script>