<div class="albaranesclientesreparaciones">
    <h2>
        <?php __('Albarán de Reparación Nº ' . $albaranesclientesreparacione['Albaranesclientesreparacione']['numero']); ?>
        <?php echo $this->Html->link(__('Editar', true), array('action' => 'edit', $albaranesclientesreparacione['Albaranesclientesreparacione']['id']), array('class' => 'button_link')); ?> 
        <?php echo $this->Html->link(__('Eliminar', true), array('action' => 'delete', $albaranesclientesreparacione['Albaranesclientesreparacione']['id']), array('class' => 'button_link'), sprintf(__('¿Seguro que quieres borrar el Albaran de Reparación Nº # %s?', true), $albaranesclientesreparacione['Albaranesclientesreparacione']['numero'])); ?> 
        <?php echo $this->Html->link(__('Listar Albaranes de Reparación', true), array('action' => 'index'), array('class' => 'button_link')); ?> 
    </h2>
    <table class="view edit">
        <tr>
            <td colspan="6"></td>
            <td><span>Estado</span></td>
            <td><?php echo $albaranesclientesreparacione['Estadosalbaranesclientesreparacione']['estado']; ?></td>
        </tr>
        <tr>
            <td><span><?php __('Número'); ?></span></td>
            <td><?php echo $albaranesclientesreparacione['Albaranesclientesreparacione']['numero']; ?></td>
            <td><span><?php __('Fecha'); ?></span></td>
            <td><?php echo $albaranesclientesreparacione['Albaranesclientesreparacione']['fecha']; ?></td>
            <td><span><?php __('Almacén de los Materiales'); ?></span></td>
            <td><?php echo $albaranesclientesreparacione['Almacene']['nombre'] ?></td>
            <td><span><?php __('Comercial'); ?></span></td>
            <td><?php echo $albaranesclientesreparacione['Comerciale']['nombre']; ?></td>
        </tr>
        <tr>
            <td><span><?php __('Cliente') ?></span></td>
            <td><?php echo $this->Html->link($albaranesclientesreparacione['Cliente']['nombre'], array('controller' => 'clientes', 'action' => 'view', $albaranesclientesreparacione['Cliente']['id'])); ?></td>
            <td><span><?php __('Centro de Trabajo') ?></span></td>
            <td><?php echo $albaranesclientesreparacione['Centrostrabajo']['centrotrabajo'] ?></td>
            <td><span><?php __('Maquina') ?></span></td>
            <td><?php echo $this->Html->link($albaranesclientesreparacione['Maquina']['nombre'], array('controller' => 'maquinas', 'action' => 'view', $albaranesclientesreparacione['Maquina']['id'])); ?></td>
            <td><span><?php __('Forma de Pago') ?></span></td>
            <td><?php echo!empty($albaranesclientesreparacione['Cliente']['Formapago']) ? $albaranesclientesreparacione['Cliente']['Formapago']['nombre'] : 'El cliente no tiene forma de pago definida'; ?></td>
        </tr>
        <tr>
            <td><h4><?php __('Nº Orden'); ?></h4></td>
            <td><?php echo $this->Html->link($albaranesclientesreparacione['Ordene']['numero'], array('controller' => 'ordenes', 'action' => 'view', $albaranesclientesreparacione['Ordene']['id'])); ?></td>
            <td colspan="3"><span><?php __('Número Aceptación Aportado por el Cliente') ?></span></td>
            <td><?php echo $albaranesclientesreparacione['Albaranesclientesreparacione']['numero_aceptacion_aportado']; ?></td>
        </tr>
        <tr>
            <td><span><?php __('Albarán de Reparación Escaneado'); ?></span></td>
            <td colspan="5"><?php echo $this->Html->link(__($albaranesclientesreparacione['Albaranesclientesreparacione']['albaranescaneado'], true), '/files/albaranesclientesreparacione/' . $albaranesclientesreparacione['Albaranesclientesreparacione']['albaranescaneado']); ?></td>
        </tr>
        <tr>
            <td><span><?php __('Observaciones'); ?></span></td>
            <td colspan="5"><?php echo $albaranesclientesreparacione['Albaranesclientesreparacione']['observaciones']; ?></td>
        </tr>
        <tr>
            <td><span><?php __('Centro de Coste') ?></span></td>
            <td><?php echo $albaranesclientesreparacione['Centrosdecoste']['denominacion']; ?></td>
            <td><span><?php __('Tipo de IVA') ?></span></td>
            <td><?php echo $albaranesclientesreparacione['Tiposiva']['tipoiva']; ?></td>
            <td><span><?php __('Facturable'); ?></span></td>
            <td><?php echo empty($albaranesclientesreparacione['Albaranesclientesreparacione']['facturable']) ? 'No' : 'Sí'; ?></td>
            <td><span><?php __('Es devolución') ?></span></td>
            <td><?php echo empty($albaranesclientesreparacione['Albaranesclientesreparacione']['es_devolucion']) ? 'No' : 'Sí'; ?></td>
        </tr>
    </table>
    <?php $total_albaranreparación = 0 ?>
    <div class="related">
        <h3><?php __('Tareas en el Albarán'); ?> <?php echo $this->Html->link(__('Nueva Tarea', true), array('controller' => 'tareas_albaranesclientesreparaciones', 'action' => 'add', $albaranesclientesreparacione['Albaranesclientesreparacione']['id']), array('class' => 'popup button_link')); ?></h3>
        <?php if (!empty($albaranesclientesreparacione['TareasAlbaranesclientesreparacione'])): ?>
            <table cellpadding = "0" cellspacing = "0">
                <tr>
                    <th><?php __(''); ?></th>
                    <th><?php __('Descripción'); ?></th>
                    <th class="actions"><?php __('Acciones'); ?></th>
                </tr>
                <?php
                $i = 0;
                foreach ($albaranesclientesreparacione['TareasAlbaranesclientesreparacione'] as $tarea):
                    $class = ' class="altrow"';
                    if ($i++ % 2 == 0) {
                        $class = ' class="altrow"';
                    }
                    $total_horas_desplazamiento_real = 0;
                    $total_horas_desplazamiento_imputable = 0;
                    $total_km_desplazamiento_real = 0;
                    $total_km_desplazamiento_imputable = 0;
                    $total_horas_trabajo_tarea_real = 0;
                    $total_horas_trabajo_tarea_imputable = 0;
                    $total_cantidad_materiales_presupuestados = 0;
                    ?>
                    <tr<?php echo $class; ?>>
                        <td style="background-color: #FACC2E">Tarea <?php echo $i ?> - <?php echo $tarea['tipo'] ?></td>
                        <td style="background-color: #FACC2E"><?php echo $tarea['descripcion']; ?></td>
                        <td class="actions" style="background-color: #FACC2E">
                            <?php echo $this->Html->link(__('Añadir Material', true), array('controller' => 'articulos_tareas_albaranesclientesreparaciones', 'action' => 'add', $tarea['id']), array('class' => 'popup')); ?> 
                            <?php if ($tarea['tipo'] == 'taller'): ?>
                                <?php echo $this->Html->link(__('Añadir Parte Taller', true), array('controller' => 'tareas_albaranesclientesreparaciones_partestalleres', 'action' => 'add', $tarea['id']), array('class' => 'popup')); ?>
                            <?php elseif ($tarea['tipo'] == 'centro'): ?>
                                <?php echo $this->Html->link(__('Añadir Parte C.Trabajo', true), array('controller' => 'tareas_albaranesclientesreparaciones_partes', 'action' => 'add', $tarea['id']), array('class' => 'popup')); ?>
                            <?php endif; ?>
                            <?php echo $this->Html->link(__('Ver Contenido', true), '#?', array('class' => 'ver-relaciones')); ?>
                            <?php echo $this->Html->link(__('Eliminar', true), array('controller' => 'tareas_albaranesclientesreparaciones', 'action' => 'delete', $tarea['id']), null, sprintf(__('¿Seguiro que quieres borrar la Tarea del Albarán de reparación  # %s?', true), $tarea['descripcion'])); ?>
                            <span class="importe_tarea">Importe Tarea <?php echo redondear_dos_decimal($tarea['total_partes_imputable'] + $tarea['total_materiales_imputables']) ?> &euro;</span>
                        </td>
                    </tr>
                    <tr class="tarea-relations">
                        <td colspan="4" style="background-color: #FBEEE1;">
                            <?php if ($tarea['tipo'] == 'centro'): ?>
                                <h4>Partes de Centro de Trabajo</h4>
                                <table>
                                    <tr>
                                        <td colspan="4"></td>
                                        <th colspan="4">Horas de Desplazamiento</th>
                                        <th colspan="4">Desplazamiento</th>
                                        <td colspan="2"></td>
                                        <th colspan="5">Horas de Trabajo</th>
                                        <th colspan="3">Dietas</th>
                                        <th colspan="3">Otros Servicios</th>
                                    </tr>
                                    <tr>
                                        <th>Núm.</th>
                                        <th>Fecha</th>
                                        <th>Mecánico</th>
                                        <th>Descripción Operación</th>
                                        <th>Real</th>
                                        <th>Imput.</th>
                                        <th>Costo</th>
                                        <th>PVP</th>
                                        <th>km. Real</th>
                                        <th>km. Imput.</th>
                                        <th>Costo</th>
                                        <th>PVP</th>
                                        <th>Precio Fijo<br/>Desplaz.</th>
                                        <th class="columna-presupuestado">Desplaz.<br/>Presup.</th>
                                        <th>H. Real</th>
                                        <th>H. Imput.</th>
                                        <th>Costo</th>
                                        <th>PVP</th>
                                        <th class="columna-presupuestado">PVP H.<br/>Trabajo<br/>Presup.</th>
                                        <th>Real</th>
                                        <th>Imput.</th>
                                        <th class="columna-presupuestado">Presup.</th>
                                        <th>Real</th>
                                        <th>Imput.</th>
                                        <th class="columna-presupuestado">Presup.</th>
                                        <th>Parte<br/> Adjunto</th>
                                        <th>Acciones</th>
                                    </tr>
                                    <?php if (!empty($tarea['TareasAlbaranesclientesreparacionesParte'])): ?>
                                        <?php foreach ($tarea['TareasAlbaranesclientesreparacionesParte'] as $partecentro): ?>
                                            <tr>    
                                                <td><?php echo $partecentro['numero'] ?></td>
                                                <td><?php echo $partecentro['fecha'] ?></td>
                                                <td><?php echo (!empty($partecentro['Mecanico'])) ? $partecentro['Mecanico']['nombre'] : '' ?></td>
                                                <td><?php echo $partecentro['operacion'] ?></td>
                                                <td>
                                                    <?php
                                                    echo $partecentro['horasdesplazamientoreales_ida'] + $partecentro['horasdesplazamientoreales_vuelta'];
                                                    $total_horas_desplazamiento_real += $partecentro['horasdesplazamientoreales_ida'] + $partecentro['horasdesplazamientoreales_vuelta']
                                                    ?> h
                                                </td>
                                                <td>
                                                    <?php
                                                    echo $partecentro['horasdesplazamientoimputables_ida'] + $partecentro['horasdesplazamientoimputables_vuelta'];
                                                    $total_horas_desplazamiento_imputable += $partecentro['horasdesplazamientoimputables_ida'] + $partecentro['horasdesplazamientoimputables_vuelta']
                                                    ?> h
                                                </td>
                                                <td>
                                                    <?php
                                                    echo ($partecentro['horasdesplazamientoreales_ida'] + $partecentro['horasdesplazamientoreales_vuelta']) * $config['Config']['costohoradesplazamiento'];
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php
                                                    echo ($partecentro['horasdesplazamientoimputables_ida'] + $partecentro['horasdesplazamientoimputables_vuelta']) * $albaranesclientesreparacione['Ordene']['Avisostallere']['Centrostrabajo']['preciohoradesplazamiento'];
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php
                                                    echo $partecentro['kilometrajereal_ida'] + $partecentro['kilometrajereal_vuelta'];
                                                    $total_km_desplazamiento_real += $partecentro['kilometrajereal_ida'] + $partecentro['kilometrajereal_vuelta']
                                                    ?> Km.
                                                </td>
                                                <td>
                                                    <?php
                                                    echo $partecentro['kilometrajeimputable_ida'] + $partecentro['kilometrajeimputable_vuelta'];
                                                    $total_km_desplazamiento_imputable += $partecentro['kilometrajeimputable_ida'] + $partecentro['kilometrajeimputable_vuelta']
                                                    ?> Km.
                                                </td>
                                                <td>
                                                    <?php
                                                    echo ($partecentro['kilometrajereal_ida'] + $partecentro['kilometrajereal_vuelta']) * $config['Config']['costokmdesplazamiento'];
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php
                                                    echo ($partecentro['kilometrajeimputable_ida'] + $partecentro['kilometrajeimputable_vuelta']) * $albaranesclientesreparacione['Ordene']['Avisostallere']['Centrostrabajo']['preciokm'];
                                                    ?>
                                                </td>
                                                <td><?php echo $partecentro['preciodesplazamiento'] ?> €</td>
                                                <td class="columna-presupuestado"></td>
                                                <td>
                                                    <?php
                                                    echo $partecentro['horasreales'];
                                                    $total_horas_trabajo_tarea_real += $partecentro['horasreales']
                                                    ?> h
                                                </td>
                                                <td>
                                                    <?php
                                                    echo $partecentro['horasimputables'];
                                                    $total_horas_trabajo_tarea_imputable += $partecentro['horasimputables']
                                                    ?> h
                                                </td>
                                                <td><?php echo $partecentro['horasreales'] * $config['Config']['costo_hora_en_centrotrabajo'] ?></td>
                                                <td><?php echo $partecentro['horasimputables'] * $albaranesclientesreparacione['Ordene']['Avisostallere']['Centrostrabajo']['preciohoraencentro'] ?></td>
                                                <td class="columna-presupuestado"></td>
                                                <td><?php echo $partecentro['dietasreales'] ?> €</td>
                                                <td><?php echo $partecentro['dietasimputables'] ?> €</td>
                                                <td class="columna-presupuestado"></td>
                                                <td><?php echo $partecentro['otrosservicios_real'] ?> €</td>
                                                <td><?php echo $partecentro['otrosservicios_imputable'] ?> €</td>
                                                <td class="columna-presupuestado"></td>
                                                <td>
                                                    <?php echo!empty($partecentro['parteescaneado']) ? $this->Html->link($this->Html->image("clip.png"), '/files/parte/' . $partecentro['parteescaneado'], array('target' => '_blank', 'escape' => false)) : '' ?>
                                                </td>
                                                <td class="actions">
                                                    <?php echo $this->Html->link(__('Editar', true), array('controller' => 'tareas_albaranesclientesreparaciones_partes', 'action' => 'edit', $partecentro['id']), array('class' => 'popup')); ?>
                                                    <?php echo $this->Html->link(__('Eliminar', true), array('controller' => 'tareas_albaranesclientesreparaciones_partes', 'action' => 'delete', $partecentro['id']), null, sprintf(__('Seguro que quieres borrar el Parte de Centro de Trabajo Nº # %s?', true), $partecentro['numero'])); ?>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                    <tr style="background-color: #27642;">
                                        <td colspan="3" class="total_partes"></td>
                                        <td class="total_partes">Totales</td>
                                        <td class="total_partes"><?php echo $total_horas_desplazamiento_real ?> h</td>
                                        <td class="total_partes"><?php echo $total_horas_desplazamiento_imputable ?> h</td>
                                        <td class="total_partes"><?php echo $tarea['totaldesplazamientoreal'] ?> €</td>
                                        <td class="total_partes"><?php echo $tarea['totaldesplazamientoimputado'] ?> €</td>
                                        <td class="total_partes"><?php echo $total_km_desplazamiento_real ?> Km.</td>
                                        <td class="total_partes"><?php echo $total_km_desplazamiento_imputable ?> Km.</td>
                                        <td class="total_partes"><?php echo $tarea['totalkilometrajereal'] ?> €</td>
                                        <td class="total_partes"><?php echo $tarea['totalkilometrajeimputable'] ?> €</td>
                                        <td class="total_partes"> <?php echo $tarea['totalpreciodesplazamiento'] ?> €</td>
                                        <td class="columna-presupuestado total_partes"> <?php echo redondear_dos_decimal($tarea['total_desplazamiento_presupuestado']) ?> €</td>
                                        <td  class="total_partes"><?php echo $total_horas_trabajo_tarea_real ?> h</td>
                                        <td  class="total_partes"><?php echo $total_horas_trabajo_tarea_imputable ?> h</td>
                                        <td class="total_partes"><?php echo $tarea['total_horastrabajoprecio_real'] ?> €</td>
                                        <td class="total_partes"><?php echo $tarea['total_horastrabajoprecio_imputable'] ?> €</td>
                                        <td class="columna-presupuestado total_partes"><?php echo redondear_dos_decimal($tarea['total_manoobra_presupuestada']) ?> €</td>
                                        <td class="total_partes"><?php echo $tarea['totaldietasreales'] ?> €</td>
                                        <td class="total_partes"><?php echo $tarea['totaldietasimputables'] ?> €</td>
                                        <td class="columna-presupuestado total_partes"><?php echo redondear_dos_decimal($tarea['total_dietas_presupuestada']) ?> €</td>
                                        <td class="total_partes"><?php echo $tarea['totalotroserviciosreales'] ?> €</td>
                                        <td class="total_partes"><?php echo $tarea['totalotroserviciosimputables'] ?> €</td>
                                        <td class="columna-presupuestado total_partes"> <?php echo redondear_dos_decimal($tarea['total_varios_presupuestado']) ?> €</td>
                                    </tr>
                                    <tr>
                                        <td colspan="12" style="font-weight: bold; text-align: center;">
                                            <p style="font-style: italic; font-weight: normal; color: red;">
                                                Este Centro de Trabajo Factura el Desplazamiento mediante:
                                                <?php if ($albaranesclientesreparacione['Ordene']['Avisostallere']['Centrostrabajo']['modofacturacion'] == 'preciokm'): ?>
                                                    Precio por Kilometro (* No se tendrá en cuenta el Precio de Desplazamiento Fijo)
                                                <?php elseif ($albaranesclientesreparacione['Ordene']['Avisostallere']['Centrostrabajo']['modofacturacion'] == 'preciofijio'): ?>
                                                    Precio Fijo Definido (* No se tendrá en cuenta el Kilometraje)
                                                <?php endif; ?>
                                            </p>
                                        </td>
                                    </tr>
                                    <tr>                  
                                        <?php if ($albaranesclientesreparacione['Ordene']['Avisostallere']['Centrostrabajo']['modofacturacion'] == 'preciokm'): ?>
                                            <td colspan="2" class="beneficio_partes">Total Partes Real</td>
                                            <td colspan="2" class="beneficio_partes"><?php echo $tarea['total_partes_real']; ?> €</td> 
                                            <td colspan="2" class="beneficio_partes">Total Partes Imputable</td>
                                            <td colspan="2" class="beneficio_partes"><?php echo $tarea['total_partes_imputable'] ?> €</td>
                                            <td colspan="3" class="beneficio_partes">Beneficio Neto</td> 
                                            <td colspan="3" class="beneficio_partes"><?php echo $tarea['total_partes_imputable'] - $tarea['total_partes_real']; ?>  -- <?php echo redondear_dos_decimal((1 - @($tarea['total_partes_real'] / $tarea['total_partes_imputable'])) * 100); ?> %</td>
                                        <?php elseif ($albaranesclientesreparacione['Ordene']['Avisostallere']['Centrostrabajo']['modofacturacion'] == 'preciofijio'): ?>
                                            <td colspan="2" class="beneficio_partes">Total Partes Real</td>
                                            <td colspan="2" class="beneficio_partes"><?php echo $tarea['total_partes_real']; ?> €</td>
                                            <td colspan="2" class="beneficio_partes">Total Partes Imputable</td>
                                            <td colspan="2" class="beneficio_partes"><?php echo $tarea['total_partes_imputable']; ?> €</td>
                                            <td colspan="2" class="beneficio_partes">Beneficio Neto</td>
                                            <td colspan="2" class="beneficio_partes"><?php echo $tarea['total_partes_imputable'] - $tarea['total_partes_real']; ?> € -- <?php echo redondear_dos_decimal((1 - ( $tarea['total_partes_real'] / $tarea['total_partes_imputable'])) * 100); ?> %</td>
                                        <?php endif; ?>
                                    </tr>
                                </table>
                            <?php endif; ?>
                            <?php if ($tarea['tipo'] == 'taller'): ?>
                                <?php $total_horas_trabajo_tarea_real = 0; ?>
                                <?php $total_horas_trabajo_tarea_imputable = 0; ?>
                                <?php $total_otrosservicios_real = 0; ?>
                                <?php $total_otrosservicios_imputable = 0; ?>
                                <h4>Partes de Taller</h4>
                                <table>
                                    <tr>
                                        <td colspan="4"></td>
                                        <th colspan="5">Horas de trabajo</th>
                                        <th colspan="3">Otros Servicios</th>
                                    </tr>
                                    <tr>
                                        <th>Nº Parte</th>
                                        <th>Fecha</th>
                                        <th>Operario</th>
                                        <th>Descripción de Operación</th>
                                        <th class="horas_de_trabajo_column">Real</th>
                                        <th class="horas_de_trabajo_column">Imput.</th>
                                        <th class="horas_de_trabajo_column">Costo</th>
                                        <th class="horas_de_trabajo_column">PVP</th>
                                        <th class="columna-presupuestado">Presup.</th>
                                        <th class="otros_servicios_column">Real</th>
                                        <th class="otros_servicios_column">Imput.</th>
                                        <th class="columna-presupuestado">Presup.</th>
                                        <th>Parte<br/> Adjunto</th>
                                        <th class="actions">Acciones</th>
                                    </tr>
                                    <?php if (!empty($tarea['TareasAlbaranesclientesreparacionesPartestallere'])): ?>
                                        <?php foreach ($tarea['TareasAlbaranesclientesreparacionesPartestallere'] as $partetaller): ?>
                                            <tr>
                                                <td><?php echo $partetaller['numero'] ?></td>
                                                <td><?php echo $partetaller['fecha'] ?></td>
                                                <td><?php echo $partetaller['Mecanico']['nombre'] ?></td>
                                                <td><?php echo $partetaller['operacion'] ?></td>
                                                <td>
                                                    <?php
                                                    echo $partetaller['horasreales'];
                                                    $total_horas_trabajo_tarea_real += $partetaller['horasreales']
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php
                                                    echo $partetaller['horasimputables'];
                                                    $total_horas_trabajo_tarea_imputable += $partetaller['horasimputables']
                                                    ?>
                                                </td>
                                                <td><?php echo ($config['Config']['costo_hora_en_taller'] * $partetaller['horasreales']) ?></td>
                                                <td><?php echo ($partetaller['horasimputables'] * $albaranesclientesreparacione['Ordene']['Avisostallere']['Centrostrabajo']['preciohoraentraller']) ?></td>
                                                <td class="columna-presupuestado"></td>
                                                <td class="otros_servicios_column">
                                                    <?php
                                                    echo $partetaller['otrosservicios_real'];
                                                    $total_otrosservicios_real += $partetaller['otrosservicios_real'];
                                                    ?>
                                                </td>
                                                <td class="otros_servicios_column">
                                                    <?php
                                                    echo $partetaller['otrosservicios_imputable'];
                                                    $total_otrosservicios_imputable += $partetaller['otrosservicios_imputable'];
                                                    ?>
                                                </td>
                                                <td class="columna-presupuestado"></td>
                                                <td>
                                                    <?php echo!empty($partetaller['parteescaneado']) ? $this->Html->link($this->Html->image("clip.png"), '/files/partestallere/' . $partetaller['parteescaneado'], array('target' => '_blank', 'escape' => false)) : '' ?>
                                                </td>
                                                <td class="actions">
                                                    <?php echo $this->Html->link(__('Editar', true), array('controller' => 'tareas_albaranesclientesreparaciones_partestalleres', 'action' => 'edit', $partetaller['id']), array('class' => 'popup')); ?>
                                                    <?php echo $this->Html->link(__('Eliminar', true), array('controller' => 'tareas_albaranesclientesreparaciones_partestalleres', 'action' => 'delete', $partetaller['id']), null, sprintf(__('Seguro que quieres borrar el Parte de Taller Nº # %s?', true), $partetaller['numero'])); ?>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                    <tr>
                                        <td colspan="3" class="total_partes"></td>
                                        <td class="total_partes">Totales</td>
                                        <td class="total_partes"><?php echo $total_horas_trabajo_tarea_real ?></td>
                                        <td class="total_partes"><?php echo $total_horas_trabajo_tarea_imputable ?></td>
                                        <td class="total_partes"><?php echo $tarea['total_horastrabajoprecio_real'] ?> €</td>
                                        <td class="total_partes"><?php echo $tarea['total_horastrabajoprecio_imputable'] ?> €</td>
                                        <td class="columna-presupuestado total_partes"><?php echo redondear_dos_decimal($tarea['total_manoobra_presupuestada']) ?> €</td>
                                        <td class="total_partes"><?php echo redondear_dos_decimal($tarea['totalotroserviciosreales']) ?> €</td>
                                        <td class="total_partes"><?php echo redondear_dos_decimal($tarea['totalotroserviciosimputables']) ?> €</td>
                                        <td class="columna-presupuestado total_partes"> <?php echo redondear_dos_decimal($tarea['total_varios_presupuestado']) ?> €</td>
                                    </tr>
                                </table>
                            <?php endif; ?>
                            <?php if (!empty($tarea['ArticulosTareasAlbaranesclientesreparacione'])): ?>
                                <h4>Articulos de la Tarea</h4>
                                <table>
                                    <thead>
                                    <th>Ref.</th>
                                    <th>Nombre</th>
                                    <th>Localizacion</th>
                                    <th>Cant.<br/>Real</th>
                                    <th class="columna-presupuestado">Cant.<br/>Presup</th>
                                    <th>Cant.<br/>Imp.</th>
                                    <th>Precio<br/>Costo</th>
                                    <th>Total<br/>Costo</th>
                                    <th>PVP</th>
                                    <th>Total PVP</th>
                                    <th>Descuento</th>
                                    <th class="columna-presupuestado">Presup.</th>
                                    <th>Total con<br/> Descuento Aplicado</th>
                                    <th>Acciones</th>
                                    </thead>
                                    <?php
                                    $total_cantidad_material_real = 0;
                                    $total_cantidad_material_imputable = 0;
                                    ?>
                                    <?php foreach ($tarea['ArticulosTareasAlbaranesclientesreparacione'] as $articulo_tarea): ?>
                                        <tr>
                                            <td><?php echo $this->Html->link(__($articulo_tarea['Articulo']['ref'], true), array('controller' => 'articulos', 'action' => 'view', $articulo_tarea['Articulo']['id'])); ?></td>
                                            <td><?php echo $articulo_tarea['Articulo']['nombre'] ?></td>
                                            <td><?php echo $articulo_tarea['Articulo']['localizacion'] ?></td>
                                            <td>
                                                <?php
                                                echo $articulo_tarea['cantidadreal'];
                                                $total_cantidad_material_real += $articulo_tarea['cantidadreal'];
                                                ?>
                                            </td>
                                            <td class="columna-presupuestado">
                                                <?php
                                                echo redondear_dos_decimal($articulo_tarea['cantidad_presupuestada']);
                                                $total_cantidad_materiales_presupuestados += $articulo_tarea['cantidad_presupuestada']
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                echo $articulo_tarea['cantidad'];
                                                $total_cantidad_material_imputable += $articulo_tarea['cantidad'];
                                                ?>
                                            </td>
                                            <td><?php echo $articulo_tarea['Articulo']['ultimopreciocompra'] ?></td>
                                            <td><?php echo $articulo_tarea['cantidad'] * $articulo_tarea['Articulo']['ultimopreciocompra'] ?></td>
                                            <td><?php echo redondear_dos_decimal($articulo_tarea['precio_unidad']) ?></td>
                                            <td><?php echo $articulo_tarea['cantidad'] * $articulo_tarea['precio_unidad'] ?></td>
                                            <td><?php echo $articulo_tarea['descuento'] ?> &percnt;</td>
                                            <td class="columna-presupuestado"><?php echo redondear_dos_decimal($articulo_tarea['presupuestado']); ?></td>
                                            <td>
                                                <?php
                                                $totalcondescuento = ($articulo_tarea['cantidad'] * $articulo_tarea['precio_unidad']) - (($articulo_tarea['cantidad'] * $articulo_tarea['precio_unidad']) * ($articulo_tarea['descuento'] / 100));
                                                echo redondear_dos_decimal($totalcondescuento);
                                                ?>
                                            </td>
                                            <td class="actions">
                                                <?php echo $this->Html->link(__('Editar', true), array('controller' => 'articulos_tareas_albaranesclientesreparaciones', 'action' => 'edit', $articulo_tarea['id']), array('class' => 'popup')); ?>
                                                <?php echo $this->Html->link(__('Eliminar', true), array('controller' => 'articulos_tareas_albaranesclientesreparaciones', 'action' => 'delete', $articulo_tarea['id']), null, sprintf(__('Eliminar el articulo Ref. %s de la Tarea ?', true), $articulo_tarea['Articulo']['ref'])); ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                    <tr>
                                        <td colspan="3" style="text-align: right;" class="total_articulos">Totales</td>
                                        <td class="total_articulos"><?php echo $total_cantidad_material_real ?></td>
                                        <td class="columna-presupuestado total_articulos"><?php echo $total_cantidad_materiales_presupuestados ?></td>
                                        <td class="total_articulos"><?php echo $total_cantidad_material_imputable ?></td>
                                        <td class="total_articulos"></td>
                                        <td class="total_articulos"><?php echo redondear_dos_decimal($tarea['total_materiales_costo']) ?> &euro; </td>
                                        <td class="total_articulos"></td>
                                        <td class="total_articulos"></td>
                                        <td class="total_articulos"></td>
                                        <td class="columna-presupuestado total_articulos"><?php echo redondear_dos_decimal($tarea['total_materiales_presupuestado']) ?> &euro; </td>
                                        <td class="total_articulos"><?php echo redondear_dos_decimal($tarea['total_materiales_imputables']) ?> &euro; </td>
                                        <td class="total_articulos"></td>
                                    </tr>
                                    <tr>
                                        <td colspan="5" class="beneficio_articulos" style="background-color: #ca87ce;">
                                            Beneficio Neto Artículos: <?php echo redondear_dos_decimal($tarea['total_materiales_imputables'] - $tarea['total_materiales_costo']) ?> &euro; -- <?php echo redondear_dos_decimal((1 - @($tarea['total_materiales_costo'] / $tarea['total_materiales_imputables'])) * 100) ?> &percnt;
                                        </td>
                                    </tr>
                                    <tr>
                                </table>
                            <?php endif; ?>
                            <table class="rendimientos_tarea">
                                <tr>
                                    <td colspan="7" class="total_importe_tarea" style="background-color: #FACC2E !important;">
                                        TOTAL IMPORTE TAREA <?php echo redondear_dos_decimal($tarea['total_materiales_imputables'] + $tarea['total_partes_imputable']); ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td><span>RENDIMIENTOS TAREA</span></td>
                                    <td>REAL</td>
                                    <td><?php echo redondear_dos_decimal($tarea['total_materiales_costo'] + $tarea['total_partes_real']) ?> &euro;</td>
                                    <td>IMPUTABLE</td>
                                    <td><?php echo redondear_dos_decimal($tarea['total_materiales_imputables'] + $tarea['total_partes_imputable']); ?> &euro;</td>
                                    <td>BENEFICIO NETO</td>
                                    <td>
                                        <?php echo redondear_dos_decimal(($tarea['total_materiales_imputables'] + $tarea['total_partes_imputable']) - ($tarea['total_materiales_costo'] + $tarea['total_partes_real'])) ?> &euro; --
                                        <?php if (($tarea['total_materiales_imputables'] + $tarea['total_materiales_costo'] + $tarea['total_partes_imputable']) != 0): ?>
                                            <?php echo redondear_dos_decimal(((($tarea['total_materiales_imputables'] + $tarea['total_partes_imputable']) - ($tarea['total_materiales_costo'] + $tarea['total_partes_real'])) / ($tarea['total_materiales_imputables'] + $tarea['total_materiales_costo'] + $tarea['total_partes_imputable'])) * 100) ?> &percnt;
                                        <?php else: ?>
                                            0 &percnt;
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php endif; ?>
        <table>
            <tr>
                <td class="total_orden">Total Mano de Obra y Otros Servicios <span><?php echo $albaranesclientesreparacione['Albaranesclientesreparacione']['total_manoobra'] ?> &euro;</span></td>
                <td class="total_orden">Total Repuestos <span><?php echo $albaranesclientesreparacione['Albaranesclientesreparacione']['total_materiales'] ?> &euro;</span></td>
                <td class="total_orden">Base Imponible <span><?php echo $albaranesclientesreparacione['Albaranesclientesreparacione']['baseimponible'] ?> &euro;</span></td>
                <td class="total_orden">Impuestos <span><?php echo redondear_dos_decimal($albaranesclientesreparacione['Albaranesclientesreparacione']['baseimponible'] * $albaranesclientesreparacione['Tiposiva']['porcentaje_aplicable'] / 100) ?> &euro;</span></td>
            </tr>
            <tr>
                <td class="total_orden">Cómision <span><?php echo redondear_dos_decimal($albaranesclientesreparacione['Albaranesclientesreparacione']['baseimponible'] * @$albaranesclientesreparacione['Comerciale']['porcentaje_comision'] / 100) ?> &euro;</span></td>
                <td></td>
                <td class="total_orden">Total Albarán <span><?php echo redondear_dos_decimal($albaranesclientesreparacione['Albaranesclientesreparacione']['baseimponible'] + ($albaranesclientesreparacione['Albaranesclientesreparacione']['baseimponible'] * $albaranesclientesreparacione['Tiposiva']['porcentaje_aplicable'] / 100)) ?> &euro;</span></td>
            </tr>
        </table>
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
                if (!empty($albaranesclientesreparacione['Ordene']['Avisostallere']['id'])):
                    $class = null;
                    $i++;
                    if ($i % 2 == 0)
                        $class = ' class="alt"';
                    ?>
                    <tr <?php echo $class ?>>
                        <td>Aviso de Taller</td>
                        <td><?php echo $albaranesclientesreparacione['Ordene']['Avisostallere']['numero'] ?></td>
                        <td><?php echo!empty($albaranesclientesreparacione['Ordene']['Avisostallere']['fechaaviso']) ? $this->Time->format('d-m-Y', $albaranesclientesreparacione['Ordene']['Avisostallere']['fechaaviso']) : '' ?></td>
                        <td><?php echo $albaranesclientesreparacione['Ordene']['Avisostallere']['Cliente']['nombre'] ?></td>
                        <td><?php echo $this->Html->link('Ver', array('controller' => 'avisostalleres', 'action' => 'view', $albaranesclientesreparacione['Ordene']['Avisostallere']['id']), array('class' => 'button_brownie')) ?></td>
                    </tr>
                <?php endif; ?>
                <?php
                if (!empty($albaranesclientesreparacione['Ordene']['id'])):
                    $class = null;
                    $i++;
                    if ($i % 2 == 0)
                        $class = ' class="alt"';
                    ?>
                    <tr <?php echo $class ?>>
                        <td>Orden</td>
                        <td><?php echo $albaranesclientesreparacione['Ordene']['numero'] ?></td>
                        <td><?php echo!empty($albaranesclientesreparacione['Ordene']['fecha']) ? $this->Time->format('d-m-Y', $albaranesclientesreparacione['Ordene']['fecha']) : '' ?></td>
                        <td><?php echo $albaranesclientesreparacione['Ordene']['Avisostallere']['Cliente']['nombre'] ?></td>
                        <td><?php echo $this->Html->link('Ver', array('controller' => 'ordenes', 'action' => 'view', $albaranesclientesreparacione['Ordene']['id']), array('class' => 'button_brownie')) ?></td>
                    </tr>
                <?php endif; ?>
                <?php
                if (!empty($albaranesclientesreparacione['FacturasCliente']['id'])):
                    $class = null;
                    $i++;
                    if ($i % 2 == 0)
                        $class = ' class="alt"';
                    ?>
                    <tr <?php echo $class ?>>
                        <td>Factura de Cliente</td>
                        <td><?php echo $albaranesclientesreparacione['FacturasCliente']['numero'] ?></td>
                        <td><?php echo!empty($albaranesclientesreparacione['FacturasCliente']['fecha']) ? $this->Time->format('d-m-Y', $albaranesclientesreparacione['FacturasCliente']['fecha']) : '' ?></td>
                        <td><?php echo $albaranesclientesreparacione['FacturasCliente']['Cliente']['nombre'] ?></td>
                        <td><?php echo $this->Html->link('Ver', array('controller' => 'facturas_clientes', 'action' => 'view', $albaranesclientesreparacione['FacturasCliente']['id']), array('class' => 'button_brownie')) ?></td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<script>
    $('.tarea-relations').hide();
    $('.ver-relaciones').click(function(){
        $(this).parent().parent().next('.tarea-relations').fadeToggle("slow", "linear");
    });
    $('.orden-relations').hide();
    $('.ver-relaciones-orden').click(function(){
        $('.orden-relations').fadeToggle("slow", "linear");
    });
    
    
</script>