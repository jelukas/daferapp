<div class="avisosrepuestos">
    <h2>
        <?php __('Aviso de repuesto Nº ' . $avisosrepuesto['Avisosrepuesto']['numero']); ?>
        <?php echo $this->Html->link(__('Editar', true), array('action' => 'edit', $avisosrepuesto['Avisosrepuesto']['id']), array('class' => 'button_link')); ?>
        <?php echo $this->Html->link(__('Listar Avisos de Repuestos', true), array('action' => 'index'), array('class' => 'button_link')); ?>
        <?php echo $this->Html->link(__('Nuevo Aviso de Repuestos', true), array('action' => 'add'), array('class' => 'button_link')); ?>
        <?php echo $this->Html->link(__('Eliminar', true), array('action' => 'delete', $avisosrepuesto['Avisosrepuesto']['id']), array('class' => 'button_link'), sprintf(__('¿Desea borrar el Aviso de Repuestos Nº %s?', true), $avisosrepuesto['Avisosrepuesto']['numero'])); ?>
    </h2>
    <table class="view">
        <tr>
            <td>
                <span>Fecha:</span>
                <?php echo $avisosrepuesto['Avisosrepuesto']['fechahora'] ?>
            </td>
            <td>
                <span>Estado:</span>
                <?php echo $avisosrepuesto['Estadosaviso']['estado'] ?>
            </td>
            <td>
                <span>Fecha de Aceptación:</span>
                <?php echo $avisosrepuesto['Avisosrepuesto']['fechaaceptacion'] ?>
            </td>
        </tr>
        <tr>
            <td>
                <span>Cliente:</span>
                <?php echo $this->Html->link($avisosrepuesto['Cliente']['nombre'], array('controller' => 'clientes', 'action' => 'view', $avisosrepuesto['Cliente']['id'])); ?>
            </td>
            <td>
                <span>Centro de Trabajo:</span>
                <?php echo $this->Html->link($avisosrepuesto['Centrostrabajo']['centrotrabajo'], array('controller' => 'centrostrabajos', 'action' => 'view', $avisosrepuesto['Centrostrabajo']['id'])); ?>
            </td>
            <td>
                <p>
                    <span>Máquina:</span>
                    <?php echo $this->Html->link($avisosrepuesto['Maquina']['nombre'], array('controller' => 'maquinas', 'action' => 'view', $avisosrepuesto['Maquina']['id'])); ?>
                </p>
                <p>
                    <span>Horas:</span>
                    <?php echo $avisosrepuesto['Avisosrepuesto']['horas_maquina']; ?>
                </p>
                <p>  
                    <span>Nº de Serie Máquina:</span>
                    <?php echo $avisosrepuesto['Maquina']['serie_maquina'] ?>
                </p>
                <p>  
                    <span>Nº de Serie Motor:</span>
                    <?php echo $avisosrepuesto['Maquina']['serie_motor'] ?>
                </p>
                <p>  
                    <span>Nº de Serie Transmisión:</span>
                    <?php echo $avisosrepuesto['Maquina']['serie_transmision'] ?>
                </p>
            </td>
        </tr>
        <tr>
            <td>
                <span>Aviso:</span>
                <?php echo!empty($avisosrepuesto['Avisosrepuesto']['avisotelefonico']) ? 'Aviso Telefónico' : ''; ?>
                <?php echo!empty($avisosrepuesto['Avisosrepuesto']['avisoemail']) ? 'Aviso por Email' : ''; ?>
            </td>
            <td>
                <span>Solicita Presupuesto:</span>
                <?php echo!empty($avisosrepuesto['Avisosrepuesto']['solicitapresupuesto']) ? 'Sí' : 'No'; ?>
            </td>
            <td>
                <span>Urgente:</span>
                <?php echo!empty($avisosrepuesto['Avisosrepuesto']['marcarurgente']) ? 'Sí' : 'No'; ?>
            </td>
        </tr>

        <tr>
            <td>
                <span>Almacen de Los Materiales:</span>
                <?php echo $avisosrepuesto['Almacene']['nombre']; ?>
            </td>
            <td>
                <span>Confirmado por:</span>
                <?php echo $avisosrepuesto['Avisosrepuesto']['confirmadopor']; ?>
            </td>
            <td>
                <span>Enviar a:</span>
                <?php echo $avisosrepuesto['Avisosrepuesto']['enviara']; ?>
            </td>
        </tr>
        <tr>
            <td colspan="3">
                <span>Observaciones:</span>
                <?php echo $avisosrepuesto['Avisosrepuesto']['observaciones']; ?>
            </td>
        </tr>
        <tr>
            <td colspan="3">
                <span>Descripción:</span>
                <?php echo $avisosrepuesto['Avisosrepuesto']['descripcion']; ?>
            </td>
        </tr>
        <tr>
            <td colspan="3">
                <span>Documento Adjunto:</span>
                <?php echo $this->Html->link(__($avisosrepuesto['Avisosrepuesto']['documento'], true), '/files/avisosrepuesto/' . $avisosrepuesto['Avisosrepuesto']['documento']); ?>
            </td>
        </tr>
    </table>
</div>
<div class="related">
    <h3><?php __('Artículos del Aviso de Repuesto'); ?> - Almacen de los Materiales - <?php echo $avisosrepuesto['Almacene']['nombre']; ?></h3>
    <div class="actions">
        <ul style="width: 300px">
            <li><?php echo $this->Html->link(__('Añadir Articulo al Aviso de Repuesto', true), array('controller' => 'articulos_avisosrepuestos', 'action' => 'add_popup', $avisosrepuesto['Avisosrepuesto']['id']), array('id' => 'popup_articulosavisosrepuesto')) ?></li>
        </ul>
    </div>
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
    <?php endif; ?>
    <div style="clear:both;"></div><hr/>
    <div style="margin-top: 25px">
        <?php echo $this->Html->link(__('Nuevo Presupuesto Proveedor', true), array('controller' => 'presupuestosproveedores', 'action' => 'add', $avisosrepuesto['Avisosrepuesto']['id']), array('class' => 'button_link')) ?>
        <?php echo $this->Html->link(__('Nuevo Presupuesto a Cliente', true), array('controller' => 'presupuestosclientes', 'action' => 'add', 'avisosrepuesto', $avisosrepuesto['Avisosrepuesto']['id']), array('class' => 'button_link')) ?>
        <?php echo $this->Html->link(__('Nuevo Albaran a Cliente', true), array('controller' => 'albaranesclientes', 'action' => 'add', 'avisosrepuesto', $avisosrepuesto['Avisosrepuesto']['id']), array('class' => 'button_link')) ?>
    </div>
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