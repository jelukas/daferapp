<div class="tareas view">
    <h2><?php __('Tarea'); ?></h2>
    <dl><?php
$i = 0;
$class = ' class="altrow"';
?>
        <dt<?php
        if ($i % 2 == 0)
            echo $class;
?>><?php __('ID'); ?></dt>
        <dd<?php
            if ($i++ % 2 == 0)
                echo $class;
?>>
                <?php echo $tarea['Tarea']['id']; ?>
            &nbsp;
        </dd>
        <dt<?php
                if ($i % 2 == 0)
                    echo $class;
                ?>><?php __('Tipo de Tarea'); ?></dt>
        <dd<?php
            if ($i++ % 2 == 0)
                echo $class;
                ?>>
                <?php echo $tarea['Tarea']['tipo']; ?>
            &nbsp;
        </dd>
        <dt<?php
                if ($i % 2 == 0)
                    echo $class;
                ?>><?php __('Nº Orden'); ?></dt>
        <dd<?php
            if ($i++ % 2 == 0)
                echo $class;
                ?>>
                <?php echo $this->Html->link($tarea['Ordene']['id'], array('controller' => 'ordenes', 'action' => 'view', $tarea['Ordene']['id'])); ?>
            &nbsp;
        </dd>
        <dt<?php
                if ($i % 2 == 0)
                    echo $class;
                ?>><?php __('Descripción'); ?></dt>
        <dd<?php
            if ($i++ % 2 == 0)
                echo $class;
                ?>>
                <?php echo $tarea['Tarea']['descripcion']; ?>
            &nbsp;
        </dd>
    </dl>
    <br/><br/>
    <div class="related">
        <h3><?php __('Partes Centro de Trabajo relacionados'); ?></h3>
        <?php if (!empty($tarea['Parte'])): ?>
            <table cellpadding = "0" cellspacing = "0">
                <tr>
                    <th><?php __('Centro Trabajo'); ?></th>
                    <th><?php __('Fecha'); ?></th>
                    <th><?php __('Hora inicio'); ?></th>
                    <th><?php __('Hora final'); ?></th>
                    <th><?php __('Horas imputables'); ?></th>
                    <th><?php __('Operación'); ?></th>
                    <th class="actions"><?php __('Acciones'); ?></th>
                </tr>
                <?php
                $i = 0;
                foreach ($tarea['Parte'] as $parte):
                    $class = null;
                    if ($i++ % 2 == 0) {
                        $class = ' class="altrow"';
                    }
                    ?>
                    <tr<?php echo $class; ?>>
                        <td><?php if(!empty($parte['Centrostrabajo']['centrotrabajo'])) echo $parte['Centrostrabajo']['centrotrabajo']; ?></td>
                        <td><?php echo $parte['fecha']; ?></td>
                        <td><?php echo $parte['horainicio']; ?></td>
                        <td><?php echo $parte['horafinal']; ?></td>
                        <td><?php echo $parte['horasimputables']; ?></td>
                        <td><?php echo $parte['operacion']; ?></td>
                        <td class="actions">
                            <?php echo $this->Html->link(__('Ver', true), array('controller' => 'partes', 'action' => 'view', $parte['id'])); ?>
                            <?php echo $this->Html->link(__('Editar', true), array('controller' => 'partes', 'action' => 'edit', $parte['id'])); ?>
                            <?php echo $this->Html->link(__('Eliminar', true), array('controller' => 'partes', 'action' => 'delete', $parte['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $parte['id'])); ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php endif; ?>

        <div class="actions">
            <ul>
                <li><?php echo $this->Html->link(__('Nuevo Parte C.Trabajo', true), array('controller' => 'partes', 'action' => 'add', $tarea['Tarea']['id'])); ?> </li>
            </ul>
        </div>
    </div>
    <br/><br/>
    <div class="related">
        <h3><?php __('Artículos relacionados'); ?></h3>
        <?php if (!empty($tarea['ArticulosTarea'])): ?>
            <table cellpadding = "0" cellspacing = "0">
                <tr>
                    <th><?php __('ref. Artículo'); ?></th>
                    <th><?php __('Articulo'); ?></th>
                    <th><?php __('Cantidad'); ?></th>
                    <th class="actions"><?php __('Acciones'); ?></th>
                </tr>
                <?php
                $i = 0;
                foreach ($tarea['ArticulosTarea'] as $articulo_tarea):
                    $class = null;
                    if ($i++ % 2 == 0) {
                        $class = ' class="altrow"';
                    }
                    ?>
                    <tr<?php echo $class; ?>>

                        <td><?php echo $articulo_tarea['Articulo']['ref']; ?></td>
                        <td><?php echo $articulo_tarea['Articulo']['nombre']; ?></td>
                        <td><?php echo $articulo_tarea['cantidad']; ?></td>
                        <td class="actions">
                            <?php echo $this->Html->link(__('Ver', true), array('controller' => 'articulos_tareas', 'action' => 'view', $articulo_tarea['id'])); ?>
                            <?php echo $this->Html->link(__('Editar', true), array('controller' => 'articulos_tareas', 'action' => 'edit', $articulo_tarea['id'])); ?>
                            <?php echo $this->Html->link(__('Eliminar', true), array('controller' => 'articulos_tareas', 'action' => 'delete', $articulo_tarea['id'], $articulo_tarea['tarea_id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $articulo_tarea['Articulo']['nombre'])); ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php endif; ?>
        <div class="actions">
            <ul>
                <li><?php echo $this->Html->link(__('Nuevo Artículo para la Tarea', true), array('controller' => 'articulos_tareas', 'action' => 'add_popup', $tarea['Tarea']['id']), array('id' => 'popup_articulostarea')); ?> </li>
            </ul>
        </div>
    </div>
    <br/><br/><br/>
    <div class="related">
        <h3><?php __('Partes de Taller relacionados'); ?></h3>
        <?php if (!empty($tarea['Partestallere'])): ?>
            <table cellpadding = "0" cellspacing = "0">
                <tr>

                    <th><?php __('Fecha'); ?></th>
                    <th><?php __('Hora inicio'); ?></th>
                    <th><?php __('Hora final'); ?></th>
                    <th><?php __('Horas imputables'); ?></th>

                    <th><?php __('Operación'); ?></th>

                    <th class="actions"><?php __('Acciones'); ?></th>
                </tr>
                <?php
                $i = 0;
                foreach ($tarea['Partestallere'] as $partestallere):
                    $class = null;
                    if ($i++ % 2 == 0) {
                        $class = ' class="altrow"';
                    }
                    ?>
                    <tr<?php echo $class; ?>>

                        <td><?php echo $partestallere['fecha']; ?></td>
                        <td><?php echo $partestallere['horainicio']; ?></td>
                        <td><?php echo $partestallere['horafinal']; ?></td>
                        <td><?php echo $partestallere['horasimputables']; ?></td>

                        <td><?php echo $partestallere['operacion']; ?></td>

                        <td class="actions">
                            <?php echo $this->Html->link(__('Ver', true), array('controller' => 'partestalleres', 'action' => 'view', $partestallere['id'])); ?>
                            <?php echo $this->Html->link(__('Editar', true), array('controller' => 'partestalleres', 'action' => 'edit', $partestallere['id'])); ?>
                            <?php echo $this->Html->link(__('Eliminar', true), array('controller' => 'partestalleres', 'action' => 'delete', $partestallere['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $partestallere['id'])); ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php endif; ?>

        <div class="actions">
            <ul>
                <li><?php echo $this->Html->link(__('Nuevo Parte Taller', true), array('controller' => 'partestalleres', 'action' => 'add', $tarea['Tarea']['id'])); ?> </li>
            </ul>
        </div>
    </div>

</div>

<div class="actions">
    <h3><?php __('Acciones'); ?></h3>
    <ul>
        <li><?php echo $this->Html->link(__('Editar Tarea', true), array('action' => 'edit', $tarea['Tarea']['id'])); ?> </li>
        <li><?php echo $this->Html->link(__('Eliminar Tarea', true), array('action' => 'delete', $tarea['Tarea']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $tarea['Tarea']['id'])); ?> </li>
        <li><?php echo $this->Html->link(__('Listar Tareas', true), array('action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('Volver a la Orden', true), array('controller' => 'ordenes', 'action' => 'view', $tarea['Ordene']['id'])); ?> </li>
        <li><?php echo $this->Html->link(__('Listar Ordenes', true), array('controller' => 'ordenes', 'action' => 'index')); ?> </li>
    </ul>
    <br/>
    <h3><?php __('Partes Centros de Trabajo'); ?></h3>
    <ul>
        <li><?php echo $this->Html->link(__('Nuevo Parte Centro Trabajo', true), array('controller' => 'partes', 'action' => 'add', $tarea['Tarea']['id'])); ?> </li>
    </ul>
    <br/>		
    <h3><?php __('Partes de Taller'); ?></h3>
    <ul>
        <li><?php echo $this->Html->link(__('Nuevo Parte de Taller', true), array('controller' => 'partestalleres', 'action' => 'add', $tarea['Tarea']['id'])); ?> </li>


    </ul>
    <br/>	
    <h3><?php __('Eventos'); ?></h3>
    <ul>
        <li><?php echo $this->Html->link(__('Añadir Evento', true), array('controller' => 'events', 'action' => 'add', $tarea['Tarea']['id'])); ?> </li>
    </ul>
</div>

<div id="dialog-modal" title="Añadir Artículo a la Tarea">
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
        
        $('#popup_articulostarea').click(function(){
            $( "#dialog-modal" ).load($(this).attr('href'),function(){
                $( "#dialog-modal" ).dialog('open');
            });
            return false;
        });
    });
    
</script>
