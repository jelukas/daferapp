<div class="albaranesclientesreparaciones">
    <h2>
        <?php __('Albarán de Reparación Nº '.$albaranesclientesreparacione['Albaranesclientesreparacione']['numero']); ?>
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
            <td><?php echo empty($albaranesclientesreparacione['Albaranesclientesreparacione']['facturable'])? 'No' : 'Sí' ; ?></td>
            <td><span><?php __('Es devolución') ?></span></td>
            <td><?php echo empty($albaranesclientesreparacione['Albaranesclientesreparacione']['es_devolucion'])? 'No' : 'Sí' ; ?></td>
        </tr>
    </table>
    <div class="related">
        <h3><?php __('Tareas'); ?></h3>
        <?php if (!empty($ordene['Tarea'])): ?>
            <table cellpadding = "0" cellspacing = "0">
                <tr>
                    <th><?php __('Tarea'); ?></th>
                    <th><?php __('Descripción'); ?></th>
                    <th class="actions"><?php __('Validar'); ?></th>
                </tr>
                <?php
                $i = 0;
                foreach ($ordene['Tarea'] as $tarea):
                    $class = ' class="altrow"';
                    if ($i++ % 2 == 0) {
                        $class = ' class="altrow"';
                    }
                    ?>
                    <tr<?php echo $class; ?>>
                        <td style="background-color: #FACC2E">Tarea <?php echo $i ?> - <?php echo $tarea['tipo'] ?></td>
                        <td style="background-color: #FACC2E"><?php echo $tarea['descripcion']; ?></td>
                        <td class="actions" style="background-color: #FACC2E">
                            VALIDAR
                        </td>
                    </tr>
                    <tr class="tarea-relations">
                        <td colspan="4" style="background-color: #FBEEE1;">
                            <?php if (!empty($tarea['Parte'])): ?>
                                <h4>Partes de Centro de Trabajo</h4>
                                <table>
                                    <tr>
                                        <th>Número</th>
                                        <th>Fecha</th>
                                        <th>Mecánico</th>
                                        <th>Descripción Operación</th>
                                        <th>Hora Desplazamiento</th>
                                        <th>Kilometraje</th>
                                        <th>Desplazamiento</th>
                                        <th>Horas de Trabajo</th>
                                        <th>Dietas</th>
                                        <th>Validar</th>
                                    </tr>
                                    <?php foreach ($tarea['Parte'] as $partecentro): ?>
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
                                                        <td><?php echo $partecentro['horasdesplazamientoreales'] ?> h</td>
                                                        <td><?php echo $partecentro['horasdesplazamientoimputables'] ?> h</td>
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
                                                        <td><?php echo $partecentro['kilometrajereal'] ?> Km.</td>
                                                        <td><?php echo $partecentro['kilometrajeimputable'] ?> Km.</td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td><?php echo $partecentro['preciodesplazamiento'] ?> €</td>
                                            <td>
                                                <table>
                                                    <tr>
                                                        <th>Real</th>
                                                        <th>Imput.</th>
                                                    </tr>
                                                    <tr>
                                                        <td><?php echo $partecentro['horasreales'] ?> h</td>
                                                        <td><?php echo $partecentro['horasimputables'] ?> h</td>
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
                                                        <td><?php echo $partecentro['dietasreales'] ?> €</td>
                                                        <td><?php echo $partecentro['dietasimputables'] ?> €</td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td class="actions">
                                                VALIDAR
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                    <tr style="background-color: #27642;">
                                        <td colspan="3"></td>
                                        <td style="font-weight: bold;">Precios Totales</td>
                                        <td>
                                            <table>
                                                <tr>
                                                    <th>Real</th>
                                                    <th>Imput.</th>
                                                </tr>
                                                <tr>
                                                    <td><?php echo $tarea['totaldesplazamientoreal'] ?> €</td>
                                                    <td><?php echo $tarea['totaldesplazamientoimputado'] ?> €</td>
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
                                                    <td><?php echo $tarea['totalkilometrajereal'] ?> €</td>
                                                    <td><?php echo $tarea['totalkilometrajeimputable'] ?> €</td>
                                                </tr>
                                            </table>
                                        </td>
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
                                                    <td><?php echo $tarea['totalhorasreales'] ?> €</td>
                                                    <td><?php echo $tarea['totalhorasimputables'] ?> €</td>
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
                                                    <td><?php echo $tarea['totaldietasreales'] ?> €</td>
                                                    <td><?php echo $tarea['totaldietasimputables'] ?> €</td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="9" style="font-weight: bold; text-align: center;">
                                            <p style="font-style: italic; font-weight: normal;">
                                                Este Centro de Trabajo Factura el Desplazamiento mediante:
                                                <?php if ($ordene['Avisostallere']['Centrostrabajo']['modofacturacion'] == 'preciokm'): ?>
                                                    Precio por Kilometro (* No se tendrá encuenta el Precio de Desplazamiento Fijo)
                                                <?php elseif ($ordene['Avisostallere']['Centrostrabajo']['modofacturacion'] == 'preciofijio'): ?>
                                                    Precio Fijo Definido (* No se tendrá encuenta el Kilometraje)
                                                <?php endif; ?>
                                            </p>
                                            <?php if ($ordene['Avisostallere']['Centrostrabajo']['modofacturacion'] == 'preciokm'): ?>
                                                <p>Total Partes Real: <?php echo $tarea['totaldietasreales'] + $tarea['totalhorasreales'] + $tarea['totalkilometrajereal'] + $tarea['totaldesplazamientoreal'] ?> &euro;</p>
                                                <p>Total Partes Imputable: <?php echo $tarea['totaldietasimputables'] + $tarea['totalhorasimputables'] + $tarea['totalkilometrajeimputable'] + $tarea['totaldesplazamientoimputado'] ?> &euro;</p>

                                            <?php elseif ($ordene['Avisostallere']['Centrostrabajo']['modofacturacion'] == 'preciofijio'): ?>
                                                <p>Total Partes Real: <?php echo $tarea['totaldietasreales'] + $tarea['totalhorasreales'] + $tarea['totalpreciodesplazamiento'] ?> &euro;</p>
                                                <p>Total Partes Imputable: <?php echo $tarea['totaldietasimputables'] + $tarea['totalhorasimputables'] + $tarea['totalpreciodesplazamiento'] ?> &euro;</p>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                </table>
                            <?php endif; ?>
                            <?php if (!empty($tarea['Partestallere'])): ?>
                                <?php $totalcosto_partestaller = 0; ?>
                                <?php $totalpvp_partestaller = 0; ?>
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
                                    <th class="actions">Validar</th>
                                    </thead>
                                    <?php foreach ($tarea['Partestallere'] as $partetaller): ?>
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
                                                        <td><?php echo $partetaller['horasreales'] ?></td>
                                                        <td><?php echo $partetaller['horasimputables'] ?></td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td><?php $totalcosto_partestaller += ($partetaller['Mecanico']['costehora'] * $partetaller['horasreales']) ?><?php echo $partetaller['Mecanico']['costehora'] * $partetaller['horasreales'] ?></td>
                                            <td><?php $totalpvp_partestaller += $totalpvp_partestaller + ($partetaller['Mecanico']['costehora'] * $ordene['Avisostallere']['Centrostrabajo']['preciohoraentraller']) ?><?php echo $partetaller['Mecanico']['costehora'] * $ordene['Avisostallere']['Centrostrabajo']['preciohoraentraller'] ?></td>
                                            <td class="actions">
                                                VALIDAR
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                    <tr style="background-color: #27642;">
                                        <td colspan="3"></td>
                                        <td style="font-weight: bold;">Precios Totales</td>
                                        <td>
                                            <table>
                                                <tr>
                                                    <th>Real</th>
                                                    <th>Imput.</th>
                                                </tr>
                                                <tr>
                                                    <td><?php echo $tarea['totalhorasreales'] ?> €</td>
                                                    <td><?php echo $tarea['totalhorasimputables'] ?> €</td>
                                                </tr>
                                            </table>
                                        </td>
                                        <td><?php echo $totalcosto_partestaller ?> €</td>
                                        <td><?php echo $totalpvp_partestaller ?> €</td>
                                    </tr>
                                </table>
                            <?php endif; ?>
                            <?php if (!empty($tarea['ArticulosTarea'])): ?>
                                <h4>Articulos de la Tarea</h4>
                                <table>
                                    <thead>
                                    <th>Ref.</th>
                                    <th>Nombre</th>
                                    <th>Cant. Real</th>
                                    <th>Cant. Imputable</th>
                                    <th>Precio Costo</th>
                                    <th>Total Costo</th>
                                    <th>PVP</th>
                                    <th>Total PVP</th>
                                    <th>Descuento</th>
                                    <th>Total <br/> Descuento Aplicado</th>
                                    <th>Validar</th>
                                    </thead>
                                    <?php
                                    $totalmateriales_real = 0;
                                    $totalmateriales_imputable = 0;
                                    $totalmateriales_imputable_descuento = 0;
                                    ?>
                                    <?php foreach ($tarea['ArticulosTarea'] as $articulo_tarea): ?>
                                        <tr>
                                            <td><?php echo $this->Html->link(__($articulo_tarea['Articulo']['ref'], true), array('controller' => 'articulos', 'action' => 'view', $articulo_tarea['Articulo']['id']), array('class' => 'popup')); ?></td>
                                            <td><?php echo $articulo_tarea['Articulo']['nombre'] ?></td>
                                            <td><?php echo $articulo_tarea['cantidadreal'] ?></td>
                                            <td><?php echo $articulo_tarea['cantidad'] ?></td>
                                            <td><?php echo $articulo_tarea['Articulo']['ultimopreciocompra'] ?></td>
                                            <td><?php echo $articulo_tarea['cantidad'] * $articulo_tarea['Articulo']['ultimopreciocompra'] ?></td>
                                            <td><?php echo $articulo_tarea['Articulo']['precio_sin_iva'] ?></td>
                                            <td><?php echo $articulo_tarea['cantidad'] * $articulo_tarea['Articulo']['precio_sin_iva'] ?></td>
                                            <td><?php echo $articulo_tarea['descuento'] ?> &percnt;</td>
                                            <td><?php
                        $totalcondescuento = ($articulo_tarea['cantidad'] * $articulo_tarea['Articulo']['precio_sin_iva']) - (($articulo_tarea['cantidad'] * $articulo_tarea['Articulo']['precio_sin_iva']) * ($articulo_tarea['descuento'] / 100));
                        echo $totalcondescuento;
                                        ?></td>
                                            <td class="actions">Validar</td>
                                        </tr>
                                        <?php $totalmateriales_real += $articulo_tarea['cantidadreal'] * $articulo_tarea['Articulo']['precio_sin_iva']; ?>
                                        <?php $totalmateriales_imputable += $articulo_tarea['cantidad'] * $articulo_tarea['Articulo']['precio_sin_iva']; ?>
                                        <?php $totalmateriales_imputable_descuento += $totalcondescuento; ?>
                                    <?php endforeach; ?>
                                    <tr>
                                        <td colspan="9" style="font-weight: bold; text-align: center;">
                                            <p>Total Materiales Real: <?php echo $totalmateriales_real ?> &euro;</p>
                                            <p>Total Materiales Imputable: <?php echo $totalmateriales_imputable ?> &euro;</p>
                                            <p>Total Materiales Imputable con Descuento Aplicado: <?php echo $totalmateriales_imputable_descuento ?> &euro;</p>
                                        </td>
                                    </tr>
                                </table>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php endif; ?>
    </div>
</div>
