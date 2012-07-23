<div class="albaranesclientesreparaciones">
    <h2>
        <?php __('Albarán de Reparación Nº ' . $albaranesclientesreparacione['Albaranesclientesreparacione']['numero']); ?>
        <?php echo $this->Html->link(__('Editar', true), array('action' => 'edit', $albaranesclientesreparacione['Albaranesclientesreparacione']['id']), array('class' => 'button_link')); ?> 
        <?php echo $this->Html->link(__('Eliminar', true), array('action' => 'delete', $albaranesclientesreparacione['Albaranesclientesreparacione']['id']), array('class' => 'button_link'), sprintf(__('¿Seguro que quieres borrar el Albaran de Reparación Nº # %s?', true), $albaranesclientesreparacione['Albaranesclientesreparacione']['numero'])); ?> 
        <?php echo $this->Html->link(__('Listar Albaranes de Reparación', true), array('action' => 'index'), array('class' => 'button_link')); ?> 
        <?php echo $this->Html->link(__('Nuevo', true), array('action' => 'add'), array('class' => 'button_link')); ?> 
    </h2>
    <table class="view edit">
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
    <div class="related">
        <h3><?php __('Tareas'); ?></h3>
        <?php if (!empty($albaranesclientesreparacione['TareasAlbaranesclientesreparacione'])): ?>
            <table cellpadding = "0" cellspacing = "0">
                <tr>
                    <th><?php __('Tarea'); ?></th>
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
                    ?>
                    <tr<?php echo $class; ?>>
                        <td style="background-color: #FACC2E">Tarea <?php echo $i ?> - <?php echo $tarea['tipo'] ?></td>
                        <td style="background-color: #FACC2E"><?php echo $tarea['descripcion']; ?></td>
                        <td class="actions" style="background-color: #FACC2E">
                            <?php echo $this->Html->link(__('Añadir Material', true), array('controller' => 'articulos_tareas', 'action' => 'add', $tarea['id']), array('class' => 'popup')); ?> 
                            <?php if ($tarea['tipo'] == 'taller'): ?>
                                <?php echo $this->Html->link(__('Añadir Parte Taller', true), array('controller' => 'partestalleres', 'action' => 'add', $tarea['id']), array('class' => 'popup')); ?>
                            <?php elseif ($tarea['tipo'] == 'centro'): ?>
                                <?php echo $this->Html->link(__('Añadir Parte C.Trabajo', true), array('controller' => 'partes', 'action' => 'add', $tarea['id']), array('class' => 'popup')); ?>
                            <?php endif; ?>
                            <?php echo $this->Html->link(__('Ver Contenido', true), '#?', array('class' => 'ver-relaciones')); ?>
                            <?php echo $this->Html->link(__('Eliminar', true), array('controller' => 'tareasalbaranesclientes_controller', 'action' => 'delete', $tarea['id']), null, sprintf(__('Seguro que quieres borrar la Tarea del Albarán ?', true))); ?>
                        </td>
                    </tr>
                    <tr class="tarea-relations">
                        <td colspan="4" style="background-color: #FBEEE1;">
                            <?php if (!empty($tarea['TareasAlbaranesclientesreparacionesParte'])): ?>
                                <h4>Partes de Centro de Trabajo</h4>
                                <table>
                                    <tr>
                                        <th>Número</th>
                                        <th>Fecha</th>
                                        <th>Mecánico</th>
                                        <th>Descripción Operación</th>
                                        <th>Horas de Desplazamiento</th>
                                        <th>Costo</th>
                                        <th>PVP</th>
                                        <th>Kilometraje</th>
                                        <th>Costo</th>
                                        <th>PVP</th>
                                        <th>Desplazamiento</th>
                                        <th>Horas de Trabajo</th>
                                        <th>Costo</th>
                                        <th>PVP</th>
                                        <th>Dietas</th>
                                        <th>Otros Servicios</th>
                                        <th>Parte<br/> Adjunto</th>
                                        <th>Acciones</th>
                                    </tr>
                                    <?php foreach ($tarea['TareasAlbaranesclientesreparacionesParte'] as $partecentro): ?>
                                        <tr>    
                                            <td><?php echo $partecentro['numero'] ?></td>
                                            <td><?php echo $partecentro['fecha'] ?></td>
                                            <td><?php echo (!empty($partecentro['Mecanico'])) ? $partecentro['Mecanico']['nombre'] : '' ?></td>
                                            <td><?php echo $partecentro['operacion'] ?></td>
                                            <td>
                                                <table>
                                                    <tr>
                                                        <th>Real</th>
                                                        <th>Imput.</th>
                                                    </tr>
                                                    <tr>
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
                                                    </tr>
                                                </table>
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
                                                <table>
                                                    <tr>
                                                        <th>Real</th>
                                                        <th>Imput.</th>
                                                    </tr>
                                                    <tr>
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
                                                    </tr>
                                                </table>
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
                                            <td>
                                                <table>
                                                    <tr>
                                                        <th>Real</th>
                                                        <th>Imput.</th>
                                                    </tr>
                                                    <tr>
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
                                                    </tr>
                                                </table>
                                            </td>
                                            <td><?php echo $partecentro['horasreales'] * $config['Config']['costo_hora_en_centrotrabajo'] ?></td>
                                            <td><?php echo $partecentro['horasimputables'] * $albaranesclientesreparacione['Ordene']['Avisostallere']['Centrostrabajo']['preciohoraencentro'] ?></td>
                                            <td>
                                                <table>
                                                    <tr>
                                                        <th>Real</th>
                                                        <th>Imput.</th>
                                                    </tr>
                                                    <tr>
                                                        <td><?php echo $partecentro['dietasreales'] ?> €</td>
                                                        <td><?php echo $partecentro['dietasimputables'] ?> €</td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td>
                                                <table>
                                                    <tr>
                                                        <th>Real</th>
                                                        <th>Imput.</th>
                                                    </tr>
                                                    <tr>
                                                        <td><?php echo $partecentro['otrosservicios_real'] ?> €</td>
                                                        <td><?php echo $partecentro['otrosservicios_imputable'] ?> €</td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td>
                                                <?php echo!empty($partecentro['parteescaneado']) ? $this->Html->link($this->Html->image("clip.png"), '/files/parte/' . $partecentro['parteescaneado'], array('target' => '_blank', 'escape' => false)) : '' ?>
                                            </td>
                                            <td class="actions">
                                                <?php echo $this->Html->link(__('Editar', true), array('controller' => 'partes', 'action' => 'edit', $partecentro['id']), array('class' => 'popup')); ?>
                                                <?php echo $this->Html->link(__('Eliminar', true), array('controller' => 'partes', 'action' => 'delete', $partecentro['id']), null, sprintf(__('Seguro que quieres borrar el Parte de Centro de Trabajo Nº # %s?', true), $partecentro['numero'])); ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                    <tr style="background-color: #27642;">
                                        <td colspan="3"></td>
                                        <td style="font-weight: bold;">Totales</td>
                                        <td>
                                            <table>
                                                <tr>
                                                    <th>Real</th>
                                                    <th>Imput.</th>
                                                </tr>
                                                <tr>
                                                    <td><?php echo $total_horas_desplazamiento_real ?> h</td>
                                                    <td><?php echo $total_horas_desplazamiento_imputable ?> h</td>
                                                </tr>
                                            </table>
                                        </td>
                                        <td><?php echo $tarea['totaldesplazamientoreal'] ?> €</td>
                                        <td><?php echo $tarea['totaldesplazamientoimputado'] ?> €</td>
                                        <td>
                                            <table>
                                                <tr>
                                                    <th>Real</th>
                                                    <th>Imput.</th>
                                                </tr>
                                                <tr>
                                                    <td><?php echo $total_km_desplazamiento_real ?> Km.</td>
                                                    <td><?php echo $total_km_desplazamiento_imputable ?> Km.</td>
                                                </tr>
                                            </table>
                                        </td>
                                        <td><?php echo $tarea['totalkilometrajereal'] ?> €</td>
                                        <td><?php echo $tarea['totalkilometrajeimputable'] ?> €</td>
                                        <td>
                                            <?php echo $tarea['totalpreciodesplazamiento'] ?> €
                                        </td>
                                        <td>
                                            <table>
                                                <tr>
                                                    <th>Real</th>
                                                    <th>Imput.</th>
                                                </tr>
                                                <tr>
                                                    <td><?php echo $total_horas_trabajo_tarea_real ?> h</td>
                                                    <td><?php echo $total_horas_trabajo_tarea_imputable ?> h</td>
                                                </tr>
                                            </table>
                                        </td>
                                        <td><?php echo $tarea['total_horastrabajoprecio_real'] ?> €</td>
                                        <td><?php echo $tarea['total_horastrabajoprecio_imputable'] ?> €</td>
                                        <td>
                                            <table>
                                                <tr>
                                                    <th>Real</th>
                                                    <th>Imput.</th>
                                                </tr>
                                                <tr>
                                                    <td><?php echo $tarea['totaldietasreales'] ?> €</td>
                                                    <td><?php echo $tarea['totaldietasimputables'] ?> €</td>
                                                </tr>
                                            </table>
                                        </td>
                                        <td>
                                            <table>
                                                <tr>
                                                    <th>Real</th>
                                                    <th>Imput.</th>
                                                </tr>
                                                <tr>
                                                    <td><?php echo $tarea['totalotroserviciosreales'] ?> €</td>
                                                    <td><?php echo $tarea['totalotroserviciosimputables'] ?> €</td>
                                                </tr>
                                            </table>
                                        </td>
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
                                            <?php if ($albaranesclientesreparacione['Ordene']['Avisostallere']['Centrostrabajo']['modofacturacion'] == 'preciokm'): ?>
                                                <p><span>Total Partes Real: <?php echo $tarea['total_partes_real']; ?> €</span></p>
                                                <p><span>Total Partes Imputable: <?php echo $tarea['total_partes_imputable']; ?> €</span></p>
                                                <p><span>Beneficio Neto: <?php echo $tarea['total_partes_imputable'] - $tarea['total_partes_real']; ?> €</span></p>
                                                <p><span>Porcentaje de Beneficio: <?php echo (1 - ($tarea['total_partes_real'] / $tarea['total_partes_imputable'])) * 100; ?> %</span></p>
                                            <?php elseif ($albaranesclientesreparacione['Ordene']['Avisostallere']['Centrostrabajo']['modofacturacion'] == 'preciofijio'): ?>
                                                <p><span>Total Partes Real: <?php echo $tarea['total_partes_real']; ?> €</span></p>
                                                <p><span>Total Partes Imputable: <?php echo $tarea['total_partes_imputable']; ?> €</span></p>
                                                <p><span>Beneficio Neto: <?php echo $tarea['total_partes_imputable'] - $tarea['total_partes_real']; ?> €</span></p>
                                                <p><span>Porcentaje de Beneficio: <?php echo (1 - ( $tarea['total_partes_real'] / $tarea['total_partes_imputable'])) * 100; ?> %</span></p>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                </table>
                            <?php endif; ?>
                            <?php if (!empty($tarea['TareasAlbaranesclientesreparacionesPartestallere'])): ?>
                                <?php $total_horas_trabajo_tarea_real = 0; ?>
                                <?php $total_horas_trabajo_tarea_imputable = 0; ?>
                                <h4>Partes de Taller</h4>
                                <table>
                                    <thead>
                                    <th>Nº Parte</th>
                                    <th>Fecha</th>
                                    <th>Operario</th>
                                    <th>Descripción de Operación</th>
                                    <th>Horas de Trabajo</th>
                                    <th>Costo</th>
                                    <th>PVP</th>
                                    <th>Parte<br/> Adjunto</th>
                                    <th class="actions">Acciones</th>
                                    </thead>
                                    <?php foreach ($tarea['TareasAlbaranesclientesreparacionesPartestallere'] as $partetaller): ?>
                                        <tr>
                                            <td><?php echo $partetaller['numero'] ?></td>
                                            <td><?php echo $partetaller['fecha'] ?></td>
                                            <td><?php echo $partetaller['Mecanico']['nombre'] ?></td>
                                            <td><?php echo $partetaller['operacion'] ?></td>
                                            <td>
                                                <table>
                                                    <tr>
                                                        <th>Real</th>
                                                        <th>Imput.</th>
                                                    </tr>
                                                    <tr>
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
                                                    </tr>
                                                </table>
                                            </td>
                                            <td><?php echo ($config['Config']['costo_hora_en_taller'] * $partetaller['horasreales']) ?></td>
                                            <td><?php echo ($partetaller['horasimputables'] * $albaranesclientesreparacione['Ordene']['Avisostallere']['Centrostrabajo']['preciohoraentraller']) ?></td>
                                            <td>
                                                <?php echo!empty($partetaller['parteescaneado']) ? $this->Html->link($this->Html->image("clip.png"), '/files/partestallere/' . $partetaller['parteescaneado'], array('target' => '_blank', 'escape' => false)) : '' ?>
                                            </td>
                                            <td class="actions">
                                                <?php echo $this->Html->link(__('Editar', true), array('controller' => 'partestalleres', 'action' => 'edit', $partetaller['id']), array('class' => 'popup')); ?>
                                                <?php echo $this->Html->link(__('Eliminar', true), array('controller' => 'partestalleres', 'action' => 'delete', $partetaller['id']), null, sprintf(__('Seguro que quieres borrar el Parte de Taller Nº # %s?', true), $partetaller['numero'])); ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                    <tr style="background-color: #27642;">
                                        <td colspan="3"></td>
                                        <td style="font-weight: bold;">Totales</td>
                                        <td>
                                            <table>
                                                <tr>
                                                    <th>Real</th>
                                                    <th>Imput.</th>
                                                </tr>
                                                <tr>
                                                    <td><?php echo $total_horas_trabajo_tarea_real ?></td>
                                                    <td><?php echo $total_horas_trabajo_tarea_imputable ?></td>
                                                </tr>
                                            </table>
                                        </td>
                                        <td><?php echo $tarea['total_horastrabajoprecio_real'] ?> €</td>
                                        <td><?php echo $tarea['total_horastrabajoprecio_imputable'] ?> €</td>
                                    </tr>
                                </table>
                            <?php endif; ?>
                            <?php if (!empty($tarea['ArticulosTareasAlbaranesclientesreparacione'])): ?>
                                <h4>Articulos de la Tarea</h4>
                                <table>
                                    <thead>
                                    <th>Ref.</th>
                                    <th>Nombre</th>
                                    <th>Cant. Real</th>
                                    <th>Cant. Imputable</th>
                                    <th>Ultimo <br/>Precio Costo</th>
                                    <th>Total Costo</th>
                                    <th>PVP</th>
                                    <th>Total PVP</th>
                                    <th>Descuento</th>
                                    <th>Total <br/> Descuento Aplicado</th>
                                    <th>Acciones</th>
                                    </thead>
                                    <?php
                                    $total_cantidad_material_real = 0;
                                    $total_cantidad_material_imputable = 0;
                                    ?>
                                    <?php foreach ($tarea['ArticulosTareasAlbaranesclientesreparacione'] as $articulo_tarea): ?>
                                        <tr>
                                            <td><?php echo $this->Html->link(__($articulo_tarea['Articulo']['ref'], true), array('controller' => 'articulos', 'action' => 'view', $articulo_tarea['Articulo']['id']), array('class' => 'popup')); ?></td>
                                            <td><?php echo $articulo_tarea['Articulo']['nombre'] ?></td>
                                            <td><?php echo $articulo_tarea['cantidadreal'];
                        $total_cantidad_material_real += $articulo_tarea['cantidadreal'] ?></td>
                                            <td><?php echo $articulo_tarea['cantidad'];
                        $total_cantidad_material_imputable += $articulo_tarea['cantidad'] ?></td>
                                            <td><?php echo $articulo_tarea['Articulo']['ultimopreciocompra'] ?></td>
                                            <td><?php echo $articulo_tarea['cantidad'] * $articulo_tarea['Articulo']['ultimopreciocompra'] ?></td>
                                            <td><?php echo $articulo_tarea['Articulo']['precio_sin_iva'] ?></td>
                                            <td><?php echo $articulo_tarea['cantidad'] * $articulo_tarea['Articulo']['precio_sin_iva'] ?></td>
                                            <td><?php echo $articulo_tarea['descuento'] ?> &percnt;</td>
                                            <td>
                                                <?php
                                                $totalcondescuento = ($articulo_tarea['cantidad'] * $articulo_tarea['Articulo']['precio_sin_iva']) - (($articulo_tarea['cantidad'] * $articulo_tarea['Articulo']['precio_sin_iva']) * ($articulo_tarea['descuento'] / 100));
                                                echo $totalcondescuento;
                                                ?>
                                            </td>
                                            <td class="actions"><?php echo $this->Html->link(__('Eliminar', true), array('controller' => 'articulos_tareas', 'action' => 'delete', $articulo_tarea['id']), null, sprintf(__('Eliminar el articulo Ref. %s de la Tarea ?', true), $articulo_tarea['Articulo']['ref'])); ?></td>
                                        </tr>
            <?php endforeach; ?>
                                    <tr>
                                        <td colspan="2" style="text-align: right; font-weight: bold;">Totales</td>
                                        <td><?php echo $total_cantidad_material_real ?></td>
                                        <td><?php echo $total_cantidad_material_imputable ?></td>
                                        <td></td>
                                        <td><?php echo $tarea['total_materiales_costo'] ?> &euro; </td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td><?php echo $tarea['total_materiales_imputables'] ?> &euro; </td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td colspan="9" style="font-weight: bold; text-align: center;">
                                            <p>Beneficio Neto: <?php echo $tarea['total_materiales_imputables'] - $tarea['total_materiales_costo'] ?> &euro; &nbsp;  &nbsp;  &nbsp; Porcentaje Beneficio: <?php echo (1 - @($tarea['total_materiales_costo'] / $tarea['total_materiales_imputables'])) * 100 ?> &percnt;</p>
                                        </td>
                                    </tr>
                                </table>
        <?php endif; ?>
                            <h5>Total de la Tarea Real: <?php echo $tarea['total_materiales_costo'] + $tarea['total_materiales_costo'] + $tarea['total_partes_real'] ?> &euro;</h5>
                            <h5>Total de la Tarea Imputable: <?php echo $tarea['total_materiales_imputables'] + $tarea['total_materiales_costo'] + $tarea['total_partes_imputable'] ?> &euro;</h5>
                            <h5>Beneficio Neto: <?php echo ($tarea['total_materiales_imputables'] + $tarea['total_materiales_costo'] + $tarea['total_partes_imputable']) - ($tarea['total_materiales_costo'] + $tarea['total_materiales_costo'] + $tarea['total_partes_real']) ?> &euro;</h5>
                            <?php if (($tarea['total_materiales_imputables'] + $tarea['total_materiales_costo'] + $tarea['total_partes_imputable']) != 0): ?>
                                <h5>Porcentaje Beneficio: <?php echo ((($tarea['total_materiales_imputables'] + $tarea['total_materiales_costo'] + $tarea['total_partes_imputable']) - ($tarea['total_materiales_costo'] + $tarea['total_materiales_costo'] + $tarea['total_partes_real'])) / ($tarea['total_materiales_imputables'] + $tarea['total_materiales_costo'] + $tarea['total_partes_imputable'])) * 100 ?> &percnt;</h5>
                            <?php else: ?>
                                <h5>Porcentaje Beneficio: 0 &percnt;</h5>
                    <?php endif; ?>
                        </td>
                    </tr>
            <?php endforeach; ?>
            </table>
<?php endif; ?>
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