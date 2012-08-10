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
            <td><?php echo $this->Time->format('d-m-Y', $albaranescliente['Albaranescliente']['fecha']); ?></td>
            <td><span><?php __('Almacén de los Materiales'); ?></span></td>
            <td><?php echo $albaranescliente['Almacene']['nombre']; ?></td>
            <td><span><?php __('Comercial'); ?></span></td>
            <td><?php echo $albaranescliente['Comerciale']['nombre']; ?></td>
        </tr>
        <tr>
            <td><span><?php __('Cliente') ?></span></td>
            <td><?php echo $albaranescliente['Cliente']['nombre']; ?></td>
            <td><span><?php __('Centro de Trabajo') ?> </span></td>
            <td><?php echo $albaranescliente['Centrostrabajo']['centrotrabajo']; ?></td>
            <td><span><?php __('Maquina') ?> </span></td>
            <td><?php echo $albaranescliente['Maquina']['nombre']; ?></td>
            <td><span><?php __('Pedido de cliente'); ?></span></td>
            <td><?php echo $this->Html->link($albaranescliente['Pedidoscliente']['numero'], array('controller' => 'pedidosclientes', 'action' => 'view', $albaranescliente['Pedidoscliente']['id'])); ?></td>
        </tr>
        <tr>
            <?php if (!empty($albaranescliente['Albaranescliente']['avisosrepuesto_id'])): ?>
                <td><h4><?php __('Aviso de Repuestos'); ?></h4></td>
                <td><?php echo $this->Html->link($albaranescliente['Avisosrepuesto']['numero'], array('controller' => 'avisosrepuestos', 'action' => 'view', $albaranescliente['Avisosrepuesto']['id'])); ?></td>
                <td><span><?php __('Centro de Trabajo del Aviso'); ?></span></td>
                <td><?php echo $albaranescliente['Centrostrabajo']['centrotrabajo']; ?></td>
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
            <td><span><?php __('Estado') ?></span></td>
            <td><?php echo $albaranescliente['Estadosalbaranescliente']['estado'] ?></td>
        </tr>
        <tr>
            <td><span><?php __('Observaciones'); ?></span></td>
            <td colspan="5"><?php echo $albaranescliente['Albaranescliente']['observaciones']; ?></td>
        </tr>
        <tr>
            <td><span><?php __('Centro de Coste') ?></span></td>
            <td><?php echo $albaranescliente['Centrosdecoste']['denominacion'] ?></td>
            <td><span><?php __('Tipo de IVA Aplicado') ?></span></td>
            <td><?php echo $albaranescliente['Tiposiva']['tipoiva'] ?></td>
            <td><span><?php __('Facturable'); ?></span></td>
            <td><?php echo $albaranescliente['Albaranescliente']['facturable'] == 0 ? 'No' : 'Sí' ?></td>
        </tr>
    </table>
    <div class="related">
        <h3>Tareas a realizar </h3>
        <div class="actions">
            <ul>
                <li><?php echo $this->Html->link(__('+ Tarea', true), array('controller' => 'tareasalbaranesclientes', 'action' => 'add', $albaranescliente['Albaranescliente']['id']), array('class' => 'popup')); ?></li>
            </ul>
        </div>
        <table style="background-color: #FFE6CC;">
            <thead><th>Tipo</th><th>Asunto</th><th>Acciones</th></thead>
            <?php foreach ($albaranescliente['Tareasalbaranescliente'] as $indice => $tarea): ?>
                <tr>
                    <td style="background-color: #FFE6CC"><?php echo $tarea['tipo'] ?></td>                  
                    <td style="background-color: #FFE6CC">Tarea <?php echo $indice + 1 ?> - <?php echo $tarea['asunto'] ?></td>                  
                    <td class="actions"  style="background-color: #FFE6CC">
                        <?php echo $this->Html->link(__('+ Material', true), array('controller' => 'materiales_tareasalbaranesclientes', 'action' => 'add', $tarea['id']), array('class' => 'popup')); ?>
                        <?php if ($tarea['tipo'] != 'repuestos'): ?>
                            <?php echo $this->Html->link(__('+ Mano de Obra', true), array('controller' => 'manodeobras_tareasalbaranesclientes', 'action' => 'add', $tarea['id']), array('class' => 'popup')); ?>
                            <?php if (empty($tarea['TareasalbaranesclientesOtrosservicio'])): ?>
                                <?php echo $this->Html->link(__('+ Otros Conceptos', true), array('controller' => 'tareasalbaranesclientes_otrosservicios', 'action' => 'add', $tarea['id']), array('class' => 'popup')); ?>
                            <?php endif; ?>
                        <?php endif; ?>

                        <?php echo $this->Html->link(__('Editar', true), array('controller' => 'tareasalbaranesclientes', 'action' => 'edit', $tarea['id']), array('class' => 'popup')); ?>
                        <?php echo $this->Html->link(__('Borrar', true), array('controller' => 'tareasalbaranesclientes', 'action' => 'delete', $tarea['id'])); ?>
                    </td>
                </tr>
                <tr class="tarea-relations">
                    <td colspan="5">
                        <?php if (!empty($tarea['ManodeobrasTareasalbaranescliente'])): ?>
                            <h4>Mano de Obra</h4>
                            <table>
                                <tr><th>Descripcion</th><th>Horas</th><th>Precio Hora</th><th>Descuento</th><th>Importe</th><th>Acciones</th></tr>
                                <?php foreach ($tarea['ManodeobrasTareasalbaranescliente'] as $manodeobra): ?>
                                    <tr><td><?php echo $manodeobra['descripcion'] ?></td><td><?php echo $manodeobra['horas'] ?></td><td><?php echo $manodeobra['precio_hora'] ?></td><td><?php echo $manodeobra['descuento'] ?> %</td><td><?php echo $manodeobra['importe'] ?></td><td class="actions"><?php echo $this->Html->link('Eliminar', array('controller' => 'manodeobras_tareasalbaranesclientes', 'action' => 'delete', $manodeobra['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $manodeobra['id'])) ?></td></tr>
                                <?php endforeach; ?>
                            </table>
                            <p style="background-color: #fff; text-align: right;font-weight: bold;">Total de Mano de Obra</p>
                            <p style="background-color: #fff; text-align: right;"><?php echo $tarea['mano_de_obra'] ?> &euro;</p>
                        <?php endif; ?>
                        <?php if (!empty($tarea['TareasalbaranesclientesOtrosservicio'])): ?>
                            <h4>Otros Conceptos</h4>
                            <table>
                                <tr><th colspan="4">Desplazamiento</th></tr>
                                <tr><th>Precio Fijo Desplazamiento</th><th>Precio Desplazamiento de Mano de Obra</th><th>Precio Kilometraje</th><th>Total Desplazamiento</th><th>Dietas</th><th>Varios</th><th>Varios Descripción</th><th>Total</th><th>Acciones</th></tr>
                                <?php if (!empty($tarea['TareasalbaranesclientesOtrosservicio'])): ?>
                                    <tr>
                                        <td><?php echo $tarea['TareasalbaranesclientesOtrosservicio']['desplazamiento'] ?> &euro;</td>
                                        <td><?php echo $tarea['TareasalbaranesclientesOtrosservicio']['manoobradesplazamiento'] ?> &euro;</td>
                                        <td><?php echo $tarea['TareasalbaranesclientesOtrosservicio']['kilometraje'] ?> &euro;</td>
                                        <td><?php echo $tarea['TareasalbaranesclientesOtrosservicio']['total_desplazamiento'] ?> &euro;</td>
                                        <td><?php echo $tarea['TareasalbaranesclientesOtrosservicio']['dietas'] ?> &euro;</td>
                                        <td><?php echo $tarea['TareasalbaranesclientesOtrosservicio']['varios'] ?> &euro;</td>
                                        <td><?php echo $tarea['TareasalbaranesclientesOtrosservicio']['varios_descripcion'] ?></td>
                                        <td><?php echo $tarea['TareasalbaranesclientesOtrosservicio']['total'] ?> &euro;</td>
                                        <td class="actions"><?php echo $this->Html->link('Eliminar', array('controller' => 'tareasalbaranesclientes_otrosservicios', 'action' => 'delete', $tarea['TareasalbaranesclientesOtrosservicio']['id']), null, sprintf(__('Seguro que quieres eliminar los otros conceptos?', true), $tarea['TareasalbaranesclientesOtrosservicio']['id'])) ?></td>
                                    </tr>
                                <?php endif; ?>
                            </table>
                            <p style="background-color: #fff; text-align: right;font-weight: bold;">Otros Conceptos</p>
                            <p style="background-color: #fff; text-align: right;"><?php echo!empty($tarea['TareasalbaranesclientesOtrosservicio']['total']) ? $tarea['TareasalbaranesclientesOtrosservicio']['total'] : 0 ?> &euro;</p>
                        <?php endif; ?>
                        <?php if (!empty($tarea['MaterialesTareasalbaranescliente'])): ?>
                            <h4>Materiales</h4>
                            <div id="ajax_message"></div>
                            <table>
                                <tr>
                                    <th>Ref</th>
                                    <th>Articulo</th>
                                    <th>Cantidad</th>
                                    <th>Precio Ud.</th>
                                    <th>Descuento</th>
                                    <th>Importe</th>
                                </tr>
                                <?php foreach ($tarea['MaterialesTareasalbaranescliente'] as $materiale): ?>
                                    <tr>
                                        <td><?php echo $materiale['Articulo']['ref'] ?></td>
                                        <td><?php echo $materiale['Articulo']['nombre'] ?></td>
                                        <td><?php echo $materiale['cantidad'] ?></td>
                                        <td><?php echo $materiale['precio_unidad'] ?></td>
                                        <td><?php echo $materiale['descuento'] ?> %</td>
                                        <td><?php echo $materiale['importe'] ?></td>
                                        <td class="actions">
                                            <?php echo $this->Html->link('Eliminar', array('controller' => 'materiales_tareasalbaranesclientes', 'action' => 'delete', $materiale['id']), null, sprintf(__('Seguro que quieres borrar el material?', true), $materiale['id'])) ?>
                                            <?php echo $this->Html->link('Ver Ultima Venta', array('controller' => 'materiales_tareasalbaranesclientes', 'action' => 'ver_ultima_venta', $materiale['id']), array('class' => 'button_link popup')) ?>
                                        </td>
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
                            <td><?php echo $albaranescliente['Albaranescliente']['precio']; ?> &euro;</td>
                            <td>Impuestos</td>
                            <td><?php echo $albaranescliente['Albaranescliente']['impuestos']; ?> &euro;</td>
                        </tr>
                        <tr>
                            <td>Comision</td>
                            <td><?php echo redondear_dos_decimal($albaranescliente['Albaranescliente']['comision']); ?>  &euro;</td>
                            <td colspan="4" style="text-align: right;">Total Albarán</td>
                            <td colspan="2"><?php echo $albaranescliente['Albaranescliente']['impuestos'] + $albaranescliente['Albaranescliente']['precio']; ?> &euro;</td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </div>
    <div style="margin: 20px;">
        <?php if ($albaranescliente['Albaranescliente']['es_devolucion'] == 0): ?>
            <?php echo $this->Html->link(__('Nuevo Albaran de Devolucion', true), array('controller' => 'albaranesclientes', 'action' => 'devolucion', $albaranescliente['Albaranescliente']['id']), array('class' => 'button_link')); ?>
        <?php endif; ?>
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
                if (!empty($albaranescliente['Pedidocliente']['id'])):
                    $class = null;
                    $i++;
                    if ($i % 2 == 0)
                        $class = ' class="alt"';
                    ?>
                    <tr <?php echo $class ?>>
                        <td>Pedido de Cliente</td>
                        <td><?php echo $albaranescliente['Pedidocliente']['numero'] ?></td>
                        <td><?php echo!empty($albaranescliente['Pedidocliente']['fecha']) ? $this->Time->format('d-m-Y', $albaranescliente['Pedidocliente']['fecha']) : '' ?></td>
                        <td><?php echo $albaranescliente['Pedidocliente']['Presupuestocliente']['Cliente']['nombre'] ?></td>
                        <td><?php echo $this->Html->link('Ver', array('controller' => 'pedidosclientes', 'action' => 'view', $albaranescliente['Pedidocliente']['id']), array('class' => 'button_brownie')) ?></td>
                    </tr>
                <?php endif; ?>
                <?php
                if (!empty($albaranescliente['FacturasCliente']['id'])):
                    $class = null;
                    $i++;
                    if ($i % 2 == 0)
                        $class = ' class="alt"';
                    ?>
                    <tr <?php echo $class ?>>
                        <td>Factura Cliente</td>
                        <td><?php echo $albaranescliente['FacturasCliente']['numero'] ?></td>
                        <td><?php echo!empty($albaranescliente['FacturasCliente']['fecha']) ? $this->Time->format('d-m-Y', $albaranescliente['FacturasCliente']['fecha']) : '' ?></td>
                        <td><?php echo $albaranescliente['FacturasCliente']['Cliente']['nombre'] ?></td>
                        <td><?php echo $this->Html->link('Ver', array('controller' => 'facturas_clientes', 'action' => 'view', $albaranescliente['FacturasCliente']['id']), array('class' => 'button_brownie')) ?></td>
                    </tr>
                <?php endif; ?>
                <?php
                if (!empty($albaranescliente['Avisosrepuesto']['id'])):
                    $class = null;
                    $i++;
                    if ($i % 2 == 0)
                        $class = ' class="alt"';
                    ?>
                    <tr <?php echo $class ?>>
                        <td>Aviso de Repuestos</td>
                        <td><?php echo $albaranescliente['Avisosrepuesto']['numero'] ?></td>
                        <td><?php echo!empty($albaranescliente['Avisosrepuesto']['fechahora']) ? $this->Time->format('d-m-Y', $albaranescliente['Avisosrepuesto']['fechahora']) : '' ?></td>
                        <td><?php echo $albaranescliente['Avisosrepuesto']['Cliente']['nombre'] ?></td>
                        <td><?php echo $this->Html->link('Ver', array('controller' => 'avisosrepuestos', 'action' => 'view', $albaranescliente['Avisosrepuesto']['id']), array('class' => 'button_brownie')) ?></td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>