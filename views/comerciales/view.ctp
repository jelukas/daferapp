<div class="comerciales view">
    <h2><?php __('Comerciales'); ?></h2>
    <dl><?php $i = 0;
$class = ' class="altrow"'; ?>
        <dt<?php if ($i % 2 == 0) echo $class; ?>><?php __('ID'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class; ?>>
<?php echo $comerciale['Comerciale']['id']; ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0) echo $class; ?>><?php __('Nombre'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class; ?>>
<?php echo $comerciale['Comerciale']['nombre']; ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0) echo $class; ?>><?php __('Apellidos'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class; ?>>
<?php echo $comerciale['Comerciale']['apellidos']; ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0) echo $class; ?>><?php __('Teléfono'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class; ?>>
<?php echo $comerciale['Comerciale']['telefono']; ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0) echo $class; ?>><?php __('DNI'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class; ?>>
<?php echo $comerciale['Comerciale']['dni']; ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0) echo $class; ?>><?php __('Dirección'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class; ?>>
<?php echo $comerciale['Comerciale']['direccion']; ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0) echo $class; ?>><?php __('Porcentaje Comisión'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class; ?>>
<?php echo $comerciale['Comerciale']['porcentaje_comision']; ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0) echo $class; ?>><?php __('Fecha de Alta'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) echo $class; ?>>
<?php echo $comerciale['Comerciale']['fecha_alta']; ?>
            &nbsp;
        </dd>
    </dl>
</div>
<div class="actions">
    <ul>
        <li><?php echo $html->link(__('Editar Comercial', true), array('action' => 'edit', $comerciale['Comerciale']['id'])); ?> </li>
        <li><?php echo $html->link(__('Eliminar Comercial', true), array('action' => 'delete', $comerciale['Comerciale']['id']), null, sprintf(__('¿Desea eliminar el comercial %s?', true), $comerciale['Comerciale']['id'])); ?> </li>
        <li><?php echo $html->link(__('Listar Comerciales', true), array('action' => 'index')); ?> </li>
        <li><?php echo $html->link(__('Nuevo Comercial', true), array('action' => 'add')); ?> </li>
        <li><?php echo $html->link(__('Listar Clientes', true), array('controller' => 'clientes', 'action' => 'index')); ?> </li>
        <li><?php echo $html->link(__('Nuevo Cliente', true), array('controller' => 'clientes', 'action' => 'add')); ?> </li>
    </ul>
</div>
<div class="related">
    <h3><?php __('Clientes'); ?></h3>
<?php if (!empty($comerciale['Cliente'])): ?>
        <table cellpadding = "0" cellspacing = "0">
            <tr>

                <th><?php __('Cif'); ?></th>
                <th><?php __('Codigo'); ?></th>
                <th><?php __('Nombre'); ?></th>


                <th><?php __('Telefono'); ?></th>


                <th class="actions"><?php __('Acciones'); ?></th>
            </tr>
            <?php
            $i = 0;
            foreach ($comerciale['Cliente'] as $cliente):
                $class = null;
                if ($i++ % 2 == 0) {
                    $class = ' class="altrow"';
                }
                ?>
                <tr<?php echo $class; ?>>

                    <td><?php echo $cliente['cif']; ?></td>
                    <td><?php echo $cliente['nombre']; ?></td>
                    <td><?php echo $cliente['telefono']; ?></td>
                    <td class="actions">
                        <?php echo $html->link(__('Ver', true), array('controller' => 'clientes', 'action' => 'view', $cliente['id'])); ?>
                        <?php echo $html->link(__('Editar', true), array('controller' => 'clientes', 'action' => 'edit', $cliente['id'])); ?>
        <?php echo $html->link(__('Eliminar', true), array('controller' => 'clientes', 'action' => 'delete', $cliente['id']), null, sprintf(__('¿Desea eliminar el cliente %s?', true), $cliente['id'])); ?>
                    </td>
                </tr>
        <?php endforeach; ?>
        </table>
<?php endif; ?>

    <div class="actions">
        <ul>
            <li><?php echo $html->link(__('Nuevo Cliente', true), array('controller' => 'clientes', 'action' => 'add')); ?> </li>
        </ul>
    </div>
</div>
