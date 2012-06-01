<div class="avisosrepuestos view">
    <h2><?php __('Aviso de repuesto'); ?></h2>
    <?php
    echo $crumb->getHtml();
    echo '<br /><br />';
    ?>
    <dl><?php
    $i = 0;
    $class = ' class="altrow"';
    ?>
        <dt<?php if ($i % 2 == 0) echo $class; ?>><?php __('Id'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class; ?>>
            <?php echo $avisosrepuesto['Avisosrepuesto']['id']; ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0) echo $class; ?>><?php __('Fecha'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class; ?>>
            <?php echo $avisosrepuesto['Avisosrepuesto']['fechahora']; ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0) echo $class; ?>><?php __('Aviso telefónico'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class; ?>>
            <?php echo $avisosrepuesto['Avisosrepuesto']['avisotelefonico']; ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0) echo $class; ?>><?php __('Aviso por email'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class; ?>>
            <?php echo $avisosrepuesto['Avisosrepuesto']['avisoemail']; ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0) echo $class; ?>><?php __('Estado'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class; ?>>
            <?php echo $avisosrepuesto['Estadosaviso']['estado']; ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0) echo $class; ?>><?php __('Cliente'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class; ?>>
            <?php echo $this->Html->link($avisosrepuesto['Cliente']['nombre'], array('controller' => 'clientes', 'action' => 'view', $avisosrepuesto['Cliente']['id'])); ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0) echo $class; ?>><?php __('Centros de trabajo'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class; ?>>
            <?php echo $this->Html->link($avisosrepuesto['Centrostrabajo']['centrotrabajo'], array('controller' => 'centrostrabajos', 'action' => 'view', $avisosrepuesto['Centrostrabajo']['id'])); ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0) echo $class; ?>><?php __('Máquina'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class; ?>>
            <?php echo $this->Html->link($avisosrepuesto['Maquina']['nombre'], array('controller' => 'maquinas', 'action' => 'view', $avisosrepuesto['Maquina']['id'])); ?>
            &nbsp;
        </dd>

        <dt<?php if ($i % 2 == 0) echo $class; ?>><?php __('Nº Serie Máquina'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class; ?>>
            <?php echo $avisosrepuesto['Maquina']['serie_maquina']; ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0) echo $class; ?>><?php __('Nº Serie Motor'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class; ?>>
            <?php echo $avisosrepuesto['Maquina']['serie_motor']; ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0) echo $class; ?>><?php __('Modelo Transmisión'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class; ?>>
            <?php echo $avisosrepuesto['Maquina']['modelo_transmision']; ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0) echo $class; ?>><?php __('Almacen de los Materiales'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class; ?>>
            <?php echo $avisosrepuesto['Almacene']['nombre']; ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0) echo $class; ?>><?php __('Horas'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class; ?>>
            <?php echo $avisosrepuesto['Maquina']['horas']; ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0) echo $class; ?>><?php __('Observaciones Máquina'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class; ?>>
            <?php echo $avisosrepuesto['Maquina']['observaciones']; ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0) echo $class; ?>><?php __('Solicita presupuesto'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class; ?>>
            <?php echo $avisosrepuesto['Avisosrepuesto']['solicitapresupuesto']; ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0) echo $class; ?>><?php __('Urgente'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class; ?>>
            <?php echo $avisosrepuesto['Avisosrepuesto']['marcarurgente']; ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0) echo $class; ?>><?php __('Confirmado por'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class; ?>>
            <?php echo $avisosrepuesto['Avisosrepuesto']['confirmadopor']; ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0) echo $class; ?>><?php __('Pendiente de confirmar'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class; ?>>
            <?php echo $avisosrepuesto['Avisosrepuesto']['pendienteconfirmar']; ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0) echo $class; ?>><?php __('Fecha de aceptación'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class; ?>>
            <?php echo $avisosrepuesto['Avisosrepuesto']['fechaaceptacion']; ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0) echo $class; ?>><?php __('Enviar a'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class; ?>>
            <?php echo $avisosrepuesto['Avisosrepuesto']['enviara']; ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0) echo $class; ?>><?php __('Observaciones'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class; ?>>
            <?php echo $avisosrepuesto['Avisosrepuesto']['observaciones']; ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0) echo $class; ?>><?php __('Descripción'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class; ?>>
            <?php echo $avisosrepuesto['Avisosrepuesto']['descripcion']; ?>
            &nbsp;
        </dd>

    </dl>

    <div class="related">
        <h3><?php __('Artículos del Aviso de Repuesto'); ?></h3>
        <?php if (!empty($avisosrepuesto['ArticulosAvisosrepuesto'])): ?>
            <table cellpadding = "0" cellspacing = "0">
                <tr>
                    <th><?php __('Ref'); ?></th>
                    <th><?php __('Nombre'); ?></th>
                    <th><?php __('Precio Sin Iva'); ?></th>
                    <th><?php __('Familia Id'); ?></th>
                    <th><?php __('Localizacion'); ?></th>
                    <th><?php __('Existencias'); ?></th>
                    <th><?php __('Cantidad'); ?></th>
                    <th class="actions"><?php __('Acciones'); ?></th>
                </tr>
                <?php
                $i = 0;
                foreach ($avisosrepuesto['ArticulosAvisosrepuesto'] as $articulo):
                    $class = null;
                    if ($i++ % 2 == 0) {
                        $class = ' class="altrow"';
                    }
                    ?>
                    <tr<?php echo $class; ?>>

                        <td><?php echo $articulo['Articulo']['ref']; ?></td>
                        <td><?php echo $articulo['Articulo']['nombre']; ?></td>
                        <td><?php echo $articulo['Articulo']['precio_sin_iva']; ?></td>
                        <td><?php echo $articulo['Articulo']['familia_id']; ?></td>
                        <td><?php echo $articulo['Articulo']['localizacion']; ?></td>
                        <td><?php echo $articulo['Articulo']['existencias']; ?></td>
                        <td><?php echo $articulo['cantidad']; ?></td>
                        <td class="actions">
                            <?php echo $this->Html->link(__('Ver', true), array('controller' => 'articulos_avisosrepuestos', 'action' => 'view', $articulo['id'])); ?>
                            <?php echo $this->Html->link(__('Eliminar', true), array('controller' => 'articulos_avisosrepuestos', 'action' => 'delete', $articulo['id'], $avisosrepuesto['Avisosrepuesto']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $articulo['Articulo']['nombre'])); ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
            <div class="actions">
                <ul style="width: 300px">
                    <li><?php echo $this->Html->link(__('Añadir Articulo al Aviso de Repuesto', true), array('controller' => 'articulos_avisosrepuestos', 'action' => 'add_popup', $avisosrepuesto['Avisosrepuesto']['id']), array('id' => 'popup_articulosavisosrepuesto')) ?></li>
                </ul>
            </div>
            <div style="clear:both;"><hr/></div>
            <div class="actions" >
                <ul>
                    <li><?php echo $this->Html->link(__('Nuevo Presupuesto Proveedor', true), array('controller' => 'presupuestosproveedores', 'action' => 'add', $avisosrepuesto['Avisosrepuesto']['id'])) ?></li>
                    <li><?php echo $this->Html->link(__('Nuevo Presupuesto a Cliente', true), array('controller' => 'presupuestosclientes', 'action' => 'add', 'avisosrepuesto', $avisosrepuesto['Avisosrepuesto']['id'])) ?></li>
                    <li><?php echo $this->Html->link(__('Nuevo Albaran a Cliente', true), array('controller' => 'albaranesclientes', 'action' => 'add', 'avisosrepuesto', $avisosrepuesto['Avisosrepuesto']['id'])) ?></li>
                </ul>
            </div>
        <?php endif; ?>
    </div>
</div>

<div class="actions">
    <h3><?php __('Acciones'); ?></h3>
    <ul>
        <li><?php echo $this->Html->link(__('Editar Aviso de repuesto', true), array('action' => 'edit', $avisosrepuesto['Avisosrepuesto']['id'])); ?> </li>
        <li><?php echo $this->Html->link(__('Listar Avisos de repuesto', true), array('action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('Nuevo Aviso de repuesto', true), array('action' => 'add')); ?> </li>
        <br><br>
        <li><?php echo '<h3>Compras</h3>'; ?></li>
        <li><?php echo $this->Html->link(__('Nuevo Presupuesto proveedor', true), array('controller' => 'presupuestosproveedores', 'action' => 'add', $avisosrepuesto['Avisosrepuesto']['id'])); ?> </li>
        <li><?php echo $this->Html->link(__('Nuevo Pedido proveedor', true), array('controller' => 'pedidosproveedores', 'action' => 'add', $avisosrepuesto['Avisosrepuesto']['id'])); ?> </li>
        <br><br>
        <li><?php echo '<h3>Ventas</h3>'; ?></li>
        <li><?php echo $this->Html->link(__('Nuevo Presupuesto a clientes', true), array('controller' => 'presupuestosclientes', 'action' => 'add', 'avisosrepuesto', $avisosrepuesto['Avisosrepuesto']['id'])); ?> </li>
        <li><?php echo $this->Html->link(__('Nuevo Pedido de cliente', true), array('controller' => 'pedidosclientes', 'action' => 'add', $avisosrepuesto['Avisosrepuesto']['id'])); ?> </li>
        <li><?php echo $this->Html->link(__('Nuevo Albaran a Cliente', true), array('controller' => 'albaranesclientes', 'action' => 'add', 'avisosrepuesto', $avisosrepuesto['Avisosrepuesto']['id'])) ?></li>
        <br><br>
        <li><?php echo '<h3>Maestros</h3>'; ?></li>
        <li><?php echo $this->Html->link(__('Listar Clientes', true), array('controller' => 'clientes', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('Nuevo Cliente', true), array('controller' => 'clientes', 'action' => 'add')); ?> </li>
        <li><?php echo $this->Html->link(__('Listar Centros de trabajo', true), array('controller' => 'centrostrabajos', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('Nuevo Centro de trabajo', true), array('controller' => 'centrostrabajos', 'action' => 'add')); ?> </li>
        <li><?php echo $this->Html->link(__('Listar Máquinas', true), array('controller' => 'maquinas', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('Nueva Maquina', true), array('controller' => 'maquinas', 'action' => 'add')); ?> </li>
        <li><?php echo $this->Html->link(__('Listar Artículos', true), array('controller' => 'articulos', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('Nuevo Artículo', true), array('controller' => 'articulos', 'action' => 'add')); ?> </li>
    </ul>
</div>
<script type="text/javascript">
    $(function() {
        $( "#dialog:ui-dialog" ).dialog( "destroy" );
	
        $( "#dialog-modal" ).dialog({
            autoOpen: false,
            width: '800',
            height: 'auto',
            modal: true
        });
        
        $('#popup_articulosavisosrepuesto').click(function(){
            $( "#dialog-modal" ).load($(this).attr('href'),function(){
                $( "#dialog-modal" ).dialog('open');
            });
            return false;
        });
    });
    
</script>