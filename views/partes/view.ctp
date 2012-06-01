<div class="partes view">
    <h2><?php __('Parte'); ?></h2>
    <dl><?php $i = 0;
$class = ' class="altrow"';
?>
        <dt<?php if ($i % 2 == 0) echo $class; ?>><?php __('Id'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class; ?>>
<?php echo $parte['Parte']['id']; ?>
            &nbsp;
        </dd>

        <dt<?php if ($i % 2 == 0) echo $class; ?>><?php __('Tarea Id'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class; ?>>
<?php echo $parte['Parte']['tarea_id']; ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0) echo $class; ?>><?php __('Orden'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class; ?>>
<?php echo $parte['Tarea']['Ordene']['id']; ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0) echo $class; ?>><?php __('Centros trabajo'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class; ?>>
<?php echo $parte['Parte']['centrostrabajo_id']; ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0) echo $class; ?>><?php __('Fecha'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class; ?>>
<?php echo $parte['Parte']['fecha']; ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0) echo $class; ?>><?php __('Hora inicio'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class; ?>>
<?php echo $parte['Parte']['horainicio']; ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0) echo $class; ?>><?php __('Hora final'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class; ?>>
<?php echo $parte['Parte']['horafinal']; ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0) echo $class; ?>><?php __('Horas imputables'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class; ?>>
<?php echo $parte['Parte']['horasimputables']; ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0) echo $class; ?>><?php __('Horas no imputables'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class; ?>>
<?php echo $parte['Parte']['horasnoimputables']; ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0) echo $class; ?>><?php __('Operacion'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class; ?>>
<?php echo $parte['Parte']['operacion']; ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0) echo $class; ?>><?php __('Observaciones'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class; ?>>
<?php echo $parte['Parte']['observaciones']; ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0) echo $class; ?>><?php __('Firmado por'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class; ?>>
<?php echo $parte['Parte']['firmadopor']; ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0) echo $class; ?>><?php __('DNI'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class; ?>>
<?php echo $parte['Parte']['DNI']; ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0) echo $class; ?>><?php __('Parte escaneado'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class; ?>>
<?php echo $this->Html->link(__($parte['Parte']['parteescaneado'], true), '/files/parte/' . $parte['Parte']['parteescaneado']); ?>
            &nbsp;
        </dd>
    </dl>
    <div class="related">
        <h3><?php __('Mecánicos'); ?></h3>
<?php if (!empty($parte['Mecanico'])): ?>
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
                foreach ($parte['Mecanico'] as $mecanico):
                    $class = null;
                    if ($i++ % 2 == 0)
                        $class = ' class="altrow"';
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
    <h3><?php __('Actions'); ?></h3>
    <ul>
        <li><?php echo $this->Html->link(__('Edit Parte', true), array('action' => 'edit', $parte['Parte']['id'])); ?> </li>
        <li><?php echo $this->Html->link(__('Delete Parte', true), array('action' => 'delete', $parte['Parte']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $parte['Parte']['id'])); ?> </li>
        <li><?php echo $this->Html->link(__('List Partes', true), array('action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Parte', true), array('action' => 'add')); ?> </li>
        <li><?php echo $this->Html->link(__('List Ordenes', true), array('controller' => 'ordenes', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Ordene', true), array('controller' => 'ordenes', 'action' => 'add')); ?> </li>
        <li><?php echo $this->Html->link(__('List Mecanicos', true), array('controller' => 'mecanicos', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Mecanico', true), array('controller' => 'mecanicos', 'action' => 'add')); ?> </li>
    </ul>
</div>
