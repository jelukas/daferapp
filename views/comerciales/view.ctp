<div class="comerciales">
    <h2>
        <?php __('Comerciales'); ?>
        <?php echo $html->link(__('Editar Comercial', true), array('action' => 'edit', $comerciale['Comerciale']['id']), array('class' => 'button_link')); ?> 
        <?php echo $html->link(__('Eliminar Comercial', true), array('action' => 'delete', $comerciale['Comerciale']['id']), array('class' => 'button_link'), sprintf(__('¿Desea eliminar el comercial %s?', true), $comerciale['Comerciale']['id'])); ?> 
        <?php echo $html->link(__('Listar Comerciales', true), array('action' => 'index'), array('class' => 'button_link')); ?> 
    </h2>
    <table class="view">
        <tr>
            <td><span>Nombre</span></td>
            <td><?php echo $comerciale['Comerciale']['nombre']; ?></td>
            <td><span>Apellidos</span></td>
            <td><?php echo $comerciale['Comerciale']['apellidos']; ?></td>
            <td><span>Teléfono</span></td>
            <td><?php echo $comerciale['Comerciale']['telefono']; ?></td>
            <td><span>Email</span></td>
            <td><?php echo $comerciale['Comerciale']['email']; ?></td>
        </tr>
        <tr>
            <td><span>Dirección</span></td>
            <td colspan="3"><?php echo $comerciale['Comerciale']['direccion']; ?></td>
            <td><span>Porcentaje Comisión</span></td>
            <td><?php echo $comerciale['Comerciale']['porcentaje_comision']; ?></td>
        </tr>
    </table>
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
