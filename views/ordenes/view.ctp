<div class="ordenes">
    <h2>
        <?php __('Orden'); ?>
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
                            <?php echo $this->Html->link(__('Ver', true), array('controller' => 'tareas', 'action' => 'view', $tarea['id'])); ?>
                            <?php echo $this->Html->link(__('Ver Relaciones', true), '#?', array('class' => 'ver-relaciones')); ?>
                            <?php echo $this->Html->link(__('Eliminar', true), array('controller' => 'tareas', 'action' => 'delete', $tarea['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $tarea['id'])); ?>
                        </td>
                    </tr>
                    <tr class="tarea-relations">
                        <td colspan="4" style="background-color: #FBEEE1;">
                            <h4>Articulos de la Tarea</h4>
                            <table>
                                <thead>
                                <th>Ref.</th>
                                <th>Nombre</th>
                                <th>Cantidad</th>
                                <th>Acciones</th>
                                </thead>
                                <?php foreach ($tarea['ArticulosTarea'] as $articulo_tarea): ?>
                                    <tr>
                                        <td><?php echo $articulo_tarea['Articulo']['ref'] ?></td>
                                        <td><?php echo $articulo_tarea['Articulo']['nombre'] ?></td>
                                        <td><?php echo $articulo_tarea['cantidad'] ?></td>
                                        <td class="actions"><?php echo $this->Html->link(__('Eliminar', true), array('controller' => 'articulos_tareas', 'action' => 'delete', $articulo_tarea['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $articulo_tarea['id'])); ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </table>
                            <?php if (!empty($tarea['Parte'])): ?>
                                <h4>Partes de Centro de Trabajo</h4>
                                <table>
                                    <thead>
                                    <th>Centro Trabajo.</th>
                                    <th>Fecha</th>
                                    <th>Hora Inicio</th>
                                    <th>Hora  Final</th>
                                    <th>Horas Imputables</th>
                                    <th>Operación</th>
                                    </thead>
                                    <?php foreach ($tarea['Parte'] as $partecentro): ?>
                                        <tr>
                                            <td><?php echo (!empty($partecentro['Centrostrabajo'])) ? $partecentro['Centrostrabajo']['centrotrabajo'] : '' ?></td>
                                            <td><?php echo $partecentro['fecha'] ?></td>
                                            <td><?php echo $partecentro['horainicio'] ?></td>
                                            <td><?php echo $partecentro['horafinal'] ?></td>
                                            <td><?php echo $partecentro['horasimputables'] ?></td>
                                            <td><?php echo $partecentro['operacion'] ?></td>
                                        </tr>
                                    <?php endforeach; ?>
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
        <br/><br/><br/>
    </div>
    <div class="related">
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
                <?php endforeach; ?>
            </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h3><?php __('Presupuestos a Cliente ' . $avisostallere['Cliente']['nombre'] . ' en la Orden ' . $ordene['Ordene']['id']); ?></h3>
        <?php if (!empty($ordene['Presupuestoscliente'])): ?>
            <table cellpadding = "0" cellspacing = "0">
                <tr>
                    <th><?php __('ID'); ?></th>
                    <th><?php __('Nº Orden'); ?></th>
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
                        <td><?php echo $presupuestoscliente['ordene_id']; ?></td>
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
                <?php endforeach; ?>
            </table>
        <?php endif; ?>
    </div>
</div>
<div class="actions">
    <ul>     
        <li><a href="#?">Buscar Orden</a></li>
        <h3><?php __('Acciones'); ?></h3>
        <li><?php echo $this->Html->link(__('Editar Orden', true), array('action' => 'edit', $ordene['Ordene']['id'])); ?> </li>
        <li><?php echo $this->Html->link(__('Eliminar Orden', true), array('action' => 'delete', $ordene['Ordene']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $ordene['Ordene']['id'])); ?> </li>
        <li><?php echo $this->Html->link(__('Listar Ordenes', true), array('action' => 'index')); ?> </li>
        <h3 style="margin-top: 40px">Ventas</h3>
        <li><?php echo $this->Html->link(__('Nuevo Presupuesto a cliente', true), array('controller' => 'presupuestosclientes', 'action' => 'add', 'ordene', $ordene['Ordene']['id'])); ?> </li>
        <h3 style="margin-top: 40px">Compras</h3>
        <li><?php echo $this->Html->link(__('Nuevo Presupuesto de Proveedor', true), array('controller' => 'presupuestosproveedores', 'action' => 'add', -1, -1, $ordene['Ordene']['id'])); ?> </li>
    </ul>
</div>

<script>
    $('.tarea-relations').hide();
    $('.ver-relaciones').click(function(){
        $(this).parent().parent().next('.tarea-relations').fadeToggle("slow", "linear");
    });
</script>
