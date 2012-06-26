<div class="ordenes">
    <h2>
        <?php __('Orden Nº ' . $ordene['Ordene']['numero']); ?>
        <?php echo $this->Html->link(__('Editar', true), array('action' => 'edit', $ordene['Ordene']['id']), array('class' => 'button_link')); ?>
        <?php echo $this->Html->link(__('Listar Ordenes', true), array('action' => 'index'), array('class' => 'button_link')); ?>
    </h2>
    <table class="view">
        <tr>
            <td colspan="3" style="font-size: 120%;">
                <span>Número</span>
                <?php echo $ordene['Ordene']['numero']; ?>
            </td>
            <td>
                <span>Aviso de Taller</span>
                <?php echo $ordene['Avisostallere']['numero']; ?>
            </td>
        </tr>
        <tr>
            <td>
                <span>Fecha</span>
                <?php echo $ordene['Ordene']['fecha'] ?>
            </td>
            <td colspan="2">
                <span>Estado</span>
                <?php echo $ordene['Estadosordene']['estado']; ?>
            </td>
            <td>
                <span>Reparación Prevista</span>
                <?php echo $ordene['Ordene']['fecha_prevista_reparacion'] ?>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <span>Fecha de Aceptación</span>
                <?php echo $ordene['Avisostallere']['fechaaceptacion'] ?>
            </td>
            <td colspan="2">
                <span>Urgente</span>
                <?php echo!empty($ordene['Ordene']['urgente']) ? 'Sí' : 'No' ?>
            </td>
        </tr>
        <tr>
            <td>
                <span>Cliente</span>
                <?php echo $ordene['Avisostallere']['Cliente']['nombre'] ?>
            </td>
            <td>
                <span>Centro</span>
                <?php echo $ordene['Avisostallere']['Centrostrabajo']['centrotrabajo'] ?>
            </td>
            <td>
                <p>
                    <span>Máquina</span>
                    <?php echo $ordene['Avisostallere']['Maquina']['nombre'] ?>
                </p>
                <p>
                    <span>Horas</span>
                    <?php echo $ordene['Avisostallere']['horas_maquina'] ?>
                </p>
            </td>
            <td>
                <p>
                    <span>Nº Serie Máquina</span> 
                    <?php echo $ordene['Avisostallere']['Maquina']['serie_maquina'] ?>
                </p>
                <p>
                    <span>Nº Serie Motor</span> 
                    <?php echo $ordene['Avisostallere']['Maquina']['serie_motor'] ?>
                </p>
                <p>
                    <span>Nº Serie Transmisión</span> 
                    <?php echo $ordene['Avisostallere']['Maquina']['serie_transmision'] ?>
                </p>
            </td>
        </tr>
        <tr>
            <td colspan="4">
                <span>Descripción</span> 
                <?php echo $ordene['Ordene']['descripcion'] ?>
            </td>
        </tr>
        <tr>
            <td colspan="4">
                <span>Observaciones</span> 
                <?php echo $ordene['Ordene']['observaciones'] ?>
            </td>
        </tr>
    </table>
    <div class="actions">
        <?php if ($ordene['Estadosordene']['id'] == '5'): ?>
            <ul><li><?php echo $this->Html->link(__('Nuevo Albaran desde la Orden', true), array('controller' => 'albaranesclientes', 'action' => 'add', 'ordene', $ordene['Ordene']['id'])) ?></li></ul>
        <?php endif; ?>
    </div>
    <br/><br/><br/>
    <div class="related">
        <h3><?php __('Tareas'); ?></h3>
        <?php if (!empty($ordene['Tarea'])): ?>
            <table cellpadding = "0" cellspacing = "0">
                <tr>
                    <th><?php __('Tarea'); ?></th>
                    <th><?php __('Descripción'); ?></th>
                    <th class="actions"><?php __('Acciones'); ?></th>
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
                        <td>Tarea <?php echo $i ?> - <?php echo $tarea['tipo'] ?></td>
                        <td><?php echo $tarea['descripcion']; ?></td>
                        <td class="actions">
                            <?php echo $this->Html->link(__('Añadir Material', true), array('controller' => 'articulos_tareas', 'action' => 'add', $tarea['id']), array('class' => 'popup')); ?> 
                            <?php if ($tarea['tipo'] == 'taller'): ?>
                                <?php echo $this->Html->link(__('Añadir Parte Taller', true), array('controller' => 'partestalleres', 'action' => 'add', $tarea['id']), array('class' => 'popup')); ?>
                            <?php elseif ($tarea['tipo'] == 'centro'): ?>
                                <?php echo $this->Html->link(__('Añadir Parte C.Trabajo', true), array('controller' => 'partes', 'action' => 'add', $tarea['id']), array('class' => 'popup')); ?>
                            <?php endif; ?>
                            <?php echo $this->Html->link(__('Ver Relaciones', true), '#?', array('class' => 'ver-relaciones')); ?>
                            <?php echo $this->Html->link(__('Eliminar', true), array('controller' => 'tareas', 'action' => 'delete', $tarea['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $tarea['id'])); ?>
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
                                        <th>Acciones</th>
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
                                                <?php echo $this->Html->link(__('Editar', true), array('controller' => 'partes', 'action' => 'edit', $partecentro['id']), array('class' => 'popup')); ?>
                                                <?php echo $this->Html->link(__('Eliminar', true), array('controller' => 'partes', 'action' => 'delete', $partecentro['id']), null, sprintf(__('Seguro que quieres borrar el Parte de Centro de Trabajo Nº # %s?', true), $partecentro['numero'])); ?>
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
                                <h4>Partes de Taller</h4>
                                <table>
                                    <thead>
                                    <th>Nº Parte</th>
                                    <th>Fecha</th>
                                    <th>Operario</th>
                                    <th>Descripción de Operación</th>
                                    <th>Horas de Trabajo</th>
                                    <th class="actions">Acciones</th>
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
                                                        <th>Imputadas</th>
                                                    </tr>
                                                    <tr>
                                                        <td><?php echo $partetaller['horasreales'] ?></td>
                                                        <td><?php echo $partetaller['horasimputables'] ?></td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td class="actions">
                                                <?php echo $this->Html->link(__('Editar', true), array('controller' => 'partestalleres', 'action' => 'edit', $partetaller['id']), array('class' => 'popup')); ?>
                                                <?php echo $this->Html->link(__('Eliminar', true), array('controller' => 'partestalleres', 'action' => 'delete', $partetaller['id']), null, sprintf(__('Seguro que quieres borrar el Parte de Taller Nº # %s?', true), $partetaller['numero'])); ?>
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
                                    <th>Acciones</th>
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
                                            <td><?php $totalcondescuento = ($articulo_tarea['cantidad'] * $articulo_tarea['Articulo']['precio_sin_iva'])-(($articulo_tarea['cantidad'] * $articulo_tarea['Articulo']['precio_sin_iva'])*($articulo_tarea['descuento']/100)); echo $totalcondescuento; ?></td>
                                            <td class="actions"><?php echo $this->Html->link(__('Eliminar', true), array('controller' => 'articulos_tareas', 'action' => 'delete', $articulo_tarea['id']), null, sprintf(__('Eliminar el articulo Ref. %s de la Tarea ?', true), $articulo_tarea['Articulo']['ref'])); ?></td>
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
        <br/>
        <div class="actions">
            <ul>
                <li><?php echo $this->Html->link(__('Nueva Tarea', true), array('controller' => 'tareas', 'action' => 'add', $ordene['Ordene']['id']), array('class' => 'popup')); ?> </li>
            </ul>
        </div>
    </div>
    <div style="clear: both"><?php echo $this->Html->link(__('Presupuestos y Pedidos Relacionados', true), '#?', array('class' => 'ver-relaciones-orden button_link')); ?></div>
    <div class="orden-relations">
        <h3><?php __('Presupuestos de Proveedores'); ?></h3>
        <?php if (!empty($ordene['Presupuestosproveedore'])): ?>
            <table cellpadding = "0" cellspacing = "0">
                <tr>
                    <th><?php __('ID'); ?></th>
                    <th><?php __('Nº Orden'); ?></th>
                    <th><?php __('Id Proveedor'); ?></th>
                    <th class="actions"><?php __('Acciones'); ?></th>
                </tr>
                <?php
                $i = 0;
                foreach ($ordene['Presupuestosproveedore'] as $presupuestoproveedore):
                    $class = ' class="altrow"';
                    if ($i++ % 2 == 0) {
                        $class = ' class="altrow"';
                    }
                    ?>
                    <tr<?php echo $class; ?>>
                        <td><?php echo $presupuestoproveedore['id']; ?></td>
                        <td><?php echo $presupuestoproveedore['ordene_id']; ?></td>
                        <td><?php echo $presupuestoproveedore['Proveedore']['nombre']; ?></td>
                        <td class="actions">
                            <?php echo $this->Html->link(__('Ver', true), array('controller' => 'presupuestosproveedores', 'action' => 'view', $presupuestoproveedore['id'])); ?>
                            <?php echo $this->Html->link(__('Editar', true), array('controller' => 'presupuestosproveedores', 'action' => 'edit', $presupuestoproveedore['id'])); ?>
                            <?php echo $this->Html->link(__('Eliminar', true), array('controller' => 'presupuestosproveedores', 'action' => 'delete', $presupuestoproveedore['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $presupuestoproveedore['id'])); ?>
                        </td>
                    </tr>
                    <?php if (!empty($presupuestoproveedore['Pedidosproveedore'])): ?>
                        <tr>
                            <td>
                                <h4>Pedidos a Proveedores</h4>
                                <table cellpadding="0" cellspacing="0">
                                    <tr>
                                        <th>Número</th>
                                        <th>Proveedor</th>
                                        <th>Fecha de entrega</th>
                                        <th>Observaciones</th>
                                        <th>confirmado</th>
                                        <th>pedidoescaneado</th>
                                    </tr>
                                    <?php foreach ($presupuestoproveedore['Pedidosproveedore'] as $pedidosproveedore): ?>
                                        <tr<?php echo $class; ?>>
                                            <td><?php echo $pedidosproveedore['Pedidosproveedore']['numero']; ?>&nbsp;</td>
                                            <td><?php echo $this->Html->link($presupuestoproveedore['Proveedore']['nombre'], array('controller' => 'proveedores', 'action' => 'view', $presupuestoproveedore['Proveedore']['id'])); ?></td>
                                            <td><?php echo $pedidosproveedore['Pedidosproveedore']['fecharecepcion']; ?>&nbsp;</td>
                                            <td><?php echo $pedidosproveedore['Pedidosproveedore']['observaciones']; ?>&nbsp;</td>
                                            <td><?php echo!empty($pedidosproveedore['Pedidosproveedore']['confirmado']) ? 'Sí' : 'No'; ?></td>
                                            <td><?php echo $this->Html->link(__($pedidosproveedore['Pedidosproveedore']['pedidoescaneado'], true), '/files/pedidosproveedore/' . $pedidosproveedore['Pedidosproveedore']['pedidoescaneado']); ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </table>
                            </td>
                        </tr>
                    <?php endif; ?>
                <?php endforeach; ?>
            </table>
        <?php endif; ?>

        <h3><?php __('Presupuestos a Cliente ' . $avisostallere['Cliente']['nombre'] . ' en la Orden ' . $ordene['Ordene']['id']); ?></h3>
        <?php if (!empty($ordene['Presupuestoscliente'])): ?>
            <table cellpadding = "0" cellspacing = "0">
                <tr>
                    <th><?php __('Id'); ?></th>
                    <th><?php __('Cliente'); ?></th>
                    <th><?php __('Precio Material'); ?></th>
                    <th><?php __('Precio Mano de Obra'); ?></th>
                    <th><?php __('Impuestos'); ?></th>
                    <th><?php __('Precio (Sin Impuestos)'); ?></th>
                    <th class="actions"><?php __('Acciones'); ?></th>
                </tr>
                <?php
                $i = 0;
                foreach ($ordene['Presupuestoscliente'] as $presupuestoscliente):
                    $class = ' class="altrow"';
                    if ($i++ % 2 == 0) {
                        $class = ' class="altrow"';
                    }
                    ?>
                    <tr<?php echo $class; ?>>
                        <td><?php echo $presupuestoscliente['id']; ?></td>
                        <td><?php echo $presupuestoscliente['Cliente']['nombre']; ?></td>
                        <td><?php echo $presupuestoscliente['precio_mat']; ?></td>
                        <td><?php echo $presupuestoscliente['precio_obra']; ?></td>
                        <td><?php echo $presupuestoscliente['impuestos']; ?></td>
                        <td><?php echo $presupuestoscliente['precio']; ?></td>
                        <td class="actions">
                            <?php echo $this->Html->link(__('Ver', true), array('controller' => 'presupuestosclientes', 'action' => 'view', $presupuestoscliente['id'])); ?>
                            <?php echo $this->Html->link(__('Editar', true), array('controller' => 'presupuestosclientes', 'action' => 'edit', $presupuestoscliente['id'])); ?>
                            <?php echo $this->Html->link(__('Eliminar', true), array('controller' => 'presupuestosclientes', 'action' => 'delete', $presupuestoscliente['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $presupuestoscliente['id'])); ?>
                        </td>
                    </tr>
                    <?php if (!empty($presupuestoscliente['Pedidoscliente'])): ?>
                        <tr>
                            <td>
                                <h4>Pedidos de Cliente</h4>
                                <table cellpadding="0" cellspacing="0">
                                    <tr>
                                        <th><?php echo __('id'); ?></th>
                                        <th><?php echo __('fecha_plazo'); ?></th>
                                        <th><?php echo __('confirmado'); ?></th>
                                        <th><?php echo __('recepcion'); ?></th>
                                    </tr>
                                    <?php foreach ($presupuestoscliente['Pedidoscliente'] as $pedidoscliente): ?>
                                        <tr>
                                            <td><?php echo $pedidoscliente['id']; ?>&nbsp;</td>
                                            <td><?php echo $pedidoscliente['fecha_plazo']; ?>&nbsp;</td>
                                            <td><?php echo $pedidoscliente['confirmado']; ?>&nbsp;</td>
                                            <td><?php echo $pedidoscliente['recepcion']; ?>&nbsp;</td>
                                        </tr>
                                    <?php endforeach; ?>
                                </table>
                            </td>
                        </tr>
                    <?php endif; ?>
                <?php endforeach; ?>

            </table>
        <?php endif; ?>
    </div>
    <div style="clear: both; margin-top: 30px;">
        <?php echo $this->Html->link(__('Nuevo Presupuesto a cliente', true), array('controller' => 'presupuestosclientes', 'action' => 'add', 'ordene', $ordene['Ordene']['id']), array('class' => 'button_link')); ?>
        <?php echo $this->Html->link(__('Nuevo Presupuesto de Proveedor', true), array('controller' => 'presupuestosproveedores', 'action' => 'add', -1, -1, $ordene['Ordene']['id']), array('class' => 'button_link')); ?>
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
