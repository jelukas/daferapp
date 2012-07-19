<div class="albaranesclientesreparaciones">
    <?php echo $this->Form->create('Albaranesclientesreparacione', array('type' => 'file')); ?>
    <fieldset>
        <legend>
            <?php __('Nuevo Albarán de Reparación desde la Orden ' . $ordene['Ordene']['numero']); ?>
            <?php echo $this->Html->link(__('Listar Albaranes de Reparación', true), array('action' => 'index'), array('class' => 'button_link')); ?>
        </legend>
        <table class="view edit">
            <tr>
                <td><span><?php __('Número'); ?></span></td>
                <td><?php echo $this->Form->input('numero', array('value' => $numero, 'label' => false)); ?></td>
                <td><span><?php __('Fecha'); ?></span></td>
                <td><?php echo $this->Form->input('fecha', array('label' => false)); ?></td>
                <td><span><?php __('Almacén de los Materiales'); ?></span></td>
                <td><?php echo $ordene['Almacene']['nombre'] ?><?php echo $this->Form->input('almacene_id', array('type' => 'hidden', 'value' => $ordene['Ordene']['almacene_id'])); ?></td>
                <td><span><?php __('Comercial'); ?></span></td>
                <td><?php echo $this->Form->input('comerciale_id', array('label' => false)); ?></td>
            </tr>
            <tr>
                <td><span><?php __('Cliente') ?></span></td>
                <td>
                    <?php echo $this->Html->link($ordene['Avisostallere']['Cliente']['nombre'], array('controller' => 'clientes', 'action' => 'view', $ordene['Avisostallere']['Cliente']['id'])); ?>
                    <?php echo $this->Form->input('cliente_id', array('type' => 'hidden', 'value' => $ordene['Avisostallere']['cliente_id'])); ?>
                </td>
                <td><span><?php __('Centro de Trabajo') ?></span></td>
                <td>
                    <?php echo $ordene['Avisostallere']['Centrostrabajo']['centrotrabajo'] ?>
                    <?php echo $this->Form->input('centrostrabajo_id', array('type' => 'hidden', 'value' => $ordene['Avisostallere']['centrostrabajo_id'])); ?>
                </td>
                <td><span><?php __('Maquina') ?></span></td>
                <td>
                    <?php echo $this->Html->link($ordene['Avisostallere']['Maquina']['nombre'], array('controller' => 'maquinas', 'action' => 'view', $ordene['Avisostallere']['Maquina']['id'])); ?>
                    <?php echo $this->Form->input('maquina_id', array('type' => 'hidden', 'value' => $ordene['Avisostallere']['maquina_id'])); ?>
                </td>
            </tr>
            <tr>
                <td><h4><?php __('Nº Orden'); ?></h4></td>
                <td>
                    <?php echo $this->Html->link($ordene['Ordene']['numero'], array('controller' => 'ordenes', 'action' => 'view', $ordene['Ordene']['id'])); ?>
                    <?php echo $this->Form->input('ordene_id', array('type' => 'hidden', 'value' => $ordene['Ordene']['id'])); ?>
                </td>
                <td colspan="3"><span><?php __('Número Aceptación Aportado por el Cliente') ?></span></td>
                <td><?php echo $this->Form->input('numero_aceptacion_aportado', array('label' => false)) ?></td>
            </tr>
            <tr>
                <td><span><?php __('Albarán de Reparación Escaneado'); ?></span></td>
                <td colspan="5"><?php echo $this->Form->input('file', array('type' => 'file','label' => false)); ?></td>
            </tr>
            <tr>
                <td><span><?php __('Observaciones'); ?></span></td>
                <td colspan="5"><?php echo $this->Form->input('observaciones', array('label' => false)); ?></td>
            </tr>
            <tr>
                <td><span><?php __('Centro de Coste') ?></span></td>
                <td><?php echo $this->Form->input('centrosdecoste_id', array('label' => false)); ?></td>
                <td><span><?php __('Tipo de IVA') ?></span></td>
                <td><?php echo $this->Form->input('tiposiva_id', array('label' => false)); ?></td>
                <td><span><?php __('Facturable'); ?></span></td>
                <td><?php echo $this->Form->input('facturable', array('label' => false)); ?></td>
                <td><span><?php __('Es devolución') ?></span></td>
                <td><?php echo $this->Form->input('es_devolucion', array('label' => false)); ?></td>
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
                                <?php echo $this->Html->link(__('Ver Contenido', true), '#?', array('class' => 'ver-relaciones')); ?>
                                <?php echo $this->Form->input('Tarea.' . $i . '.id', array('label' => false, 'div' => false, 'class' => 'validartarea', 'type' => 'checkbox', 'checked' => true, 'value' => $tarea['id'], 'hiddenField' => false)) ?>
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
                                    <?php $totalhorasreales_partestaller = 0; ?>
                                    <?php $totalhorasimput_partestaller = 0; ?>
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
                                                            <td><?php echo $partetaller['horasreales'] ?> <?php $totalhorasreales_partestaller += $partetaller['horasreales']; ?></td>
                                                            <td><?php echo $partetaller['horasimputables'] ?> <?php $totalhorasimput_partestaller += $partetaller['horasimputables']; ?></td>
                                                        </tr>
                                                    </table>
                                                </td>
                                                <td><?php $totalcosto_partestaller += ($partetaller['Mecanico']['costehora'] * $partetaller['horasreales']) ?><?php echo $partetaller['Mecanico']['costehora'] * $partetaller['horasreales'] ?></td>
                                                <td><?php $totalpvp_partestaller += ($partetaller['horasimputables'] * $ordene['Avisostallere']['Centrostrabajo']['preciohoraentraller']) ?><?php echo $partetaller['horasimputables'] * $ordene['Avisostallere']['Centrostrabajo']['preciohoraentraller'] ?></td>
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
                                                        <td><?php echo $totalhorasreales_partestaller ?></td>
                                                        <td><?php echo $totalhorasimput_partestaller ?></td>
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

    </fieldset>
    <?php echo $this->Form->end(__('Guardar', true)); ?>
</div>
<script type="text/javascript">
    $('.tarea-relations').hide();
    $('.ver-relaciones').click(function(){
        $(this).parent().parent().next('.tarea-relations').fadeToggle("slow", "linear");
    });
</script>