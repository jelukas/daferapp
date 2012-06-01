<div class="partestalleres view">
    <h2><?php __('Partes de taller'); ?></h2>
    <dl><?php
$i = 0;
$class = ' class="altrow"';
?>
        <dt<?php if ($i % 2 == 0) echo $class; ?>><?php __('Id'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class; ?>>
<?php echo $partestallere['Partestallere']['id']; ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0) echo $class; ?>><?php __('Orden'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class; ?>>
<?php echo $this->Html->link($tarea['Ordene']['id'], array('controller' => 'ordenes', 'action' => 'view', $tarea['Ordene']['id'])); ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0) echo $class; ?>><?php __('Tarea'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class; ?>>
<?php echo $this->Html->link($partestallere['Tarea']['id'], array('controller' => 'tareas', 'action' => 'view', $partestallere['Tarea']['id'])); ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0) echo $class; ?>><?php __('Fecha'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class; ?>>
<?php echo $partestallere['Partestallere']['fecha']; ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0) echo $class; ?>><?php __('Hora de inicio'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class; ?>>
<?php echo $partestallere['Partestallere']['horainicio']; ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0) echo $class; ?>><?php __('Hora de final'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class; ?>>
<?php echo $partestallere['Partestallere']['horafinal']; ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0) echo $class; ?>><?php __('Horas imputables'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class; ?>>
<?php echo $partestallere['Partestallere']['horasimputables']; ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0) echo $class; ?>><?php __('Horas no imputables'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class; ?>>
<?php echo $partestallere['Partestallere']['horasnoimputables']; ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0) echo $class; ?>><?php __('Operación'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class; ?>>
<?php echo $partestallere['Partestallere']['operacion']; ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0) echo $class; ?>><?php __('Observaciones'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class; ?>>
<?php echo $partestallere['Partestallere']['observaciones']; ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0) echo $class; ?>><?php __('Firmado por'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class; ?>>
<?php echo $partestallere['Partestallere']['firmadopor']; ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0) echo $class; ?>><?php __('DNI'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class; ?>>
<?php echo $partestallere['Partestallere']['DNI']; ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0) echo $class; ?>><?php __('Parte escaneado'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class; ?>>
<?php echo $this->Html->link(__($partestallere['Partestallere']['parteescaneado'], true), '/files/partestallere/' . $partestallere['Partestallere']['parteescaneado']); ?>
            &nbsp;
        </dd>

    </dl>
    <div class="related">
        <h3><?php __('Mecánicos'); ?></h3>
<?php if (!empty($partestallere['Mecanico'])): ?>
            <table cellpadding = "0" cellspacing = "0">
                <tr>
                    <th><?php __('Id'); ?></th>
                    <th><?php __('Dni'); ?></th>
                    <th><?php __('Nombre'); ?></th>
                    <th><?php __('Coste de hora'); ?></th>
                    <th><?php __('Coste de hora extra'); ?></th>
                    <th><?php __('Fecha de alta'); ?></th>
                    <th><?php __('Observaciones'); ?></th>
                    <th class="actions"><?php __('Acciones'); ?></th>
                </tr>
                <?php
                $i = 0;
                foreach ($partestallere['Mecanico'] as $mecanico):
                    $class = null;
                    if ($i++ % 2 == 0) {
                        $class = ' class="altrow"';
                    }
                    ?>
                    <tr<?php echo $class; ?>>
                        <td><?php echo $mecanico['id']; ?></td>
                        <td><?php echo $mecanico['dni']; ?></td>
                        <td><?php echo $mecanico['nombre']; ?></td>
                        <td><?php echo $mecanico['costehora']; ?></td>
                        <td><?php echo $mecanico['costehoraextra']; ?></td>
                        <td><?php echo $mecanico['fechaalta']; ?></td>
                        <td><?php echo $mecanico['observaciones']; ?></td>
                        <td class="actions">
                            <?php echo $this->Html->link(__('Ver', true), array('controller' => 'mecanicos', 'action' => 'view', $mecanico['id'])); ?>
                            <?php echo $this->Html->link(__('Editar', true), array('controller' => 'mecanicos', 'action' => 'edit', $mecanico['id'])); ?>
        <?php echo $this->Html->link(__('Eliminar', true), array('controller' => 'mecanicos', 'action' => 'delete', $mecanico['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $mecanico['id'])); ?>
                        </td>
                    </tr>
            <?php endforeach; ?>
            </table>
<?php endif; ?>

        <div class="actions">
            <ul>
                <li><?php echo $this->Html->link(__('Nuevo Mecánico', true), array('controller' => 'mecanicos', 'action' => 'add')); ?> </li>
            </ul>
        </div>
    </div>
</div>
<div class="actions">
    <h3><?php __('Acciones'); ?></h3>
    <ul>
        <li><?php echo $this->Html->link(__('Editar Partes de taller', true), array('action' => 'edit', $partestallere['Partestallere']['id'])); ?> </li>
        <li><?php echo $this->Html->link(__('Eliminar Parte de taller', true), array('action' => 'delete', $partestallere['Partestallere']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $partestallere['Partestallere']['id'])); ?> </li>
        <li><?php echo $this->Html->link(__('Listar Partes de taller', true), array('action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('Listar Ordenes', true), array('controller' => 'ordenes', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('Nueva Orden', true), array('controller' => 'ordenes', 'action' => 'add')); ?> </li>
        <li><?php echo $this->Html->link(__('Listar Tareas', true), array('controller' => 'tareas', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('Nueva Tarea', true), array('controller' => 'tareas', 'action' => 'add')); ?> </li>
        <li><?php echo $this->Html->link(__('Listar Articulos', true), array('controller' => 'articulos', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('Nuevo Articulo', true), array('controller' => 'articulos', 'action' => 'add')); ?> </li>
        <li><?php echo $this->Html->link(__('Listar Mecanicos', true), array('controller' => 'mecanicos', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('Nuevo Mecanico', true), array('controller' => 'mecanicos', 'action' => 'add')); ?> </li>
    </ul>
    <br><br>  
    <h3><?php __('Ventas'); ?></h3>
    <ul>
        <li><?php echo $this->Html->link(__('Nuevo Albarán de cliente', true), array('controller' => 'albaranesclientes', 'action' => 'add', -1, $tarea['Ordene']['avisostallere_id'])); ?> </li>
    </ul>
    <br><br>
    <h3><?php __('Compras'); ?></h3>
    <ul>
        <li><?php echo $this->Html->link(__('Nuevo Albarán de proveedor', true), array('controller' => 'albaranesproveedores', 'action' => 'add', -1, $tarea['Ordene']['avisostallere_id'])); ?> </li>
    </ul>

</div>