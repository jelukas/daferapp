<div class="transportistas">
    <h2>
        <?php __('Transportista'); ?>
        <?php echo $html->link(__('Editar Transportista', true), array('action' => 'edit', $transportista['Transportista']['id']), array('class' => 'button_link')); ?>
        <?php echo $html->link(__('Listar Transportistas', true), array('action' => 'index'), array('class' => 'button_link')); ?>
        <?php echo $html->link(__('Nuevo Transportista', true), array('action' => 'add'), array('class' => 'button_link')); ?>
    </h2>
    <table class="view">
        <tr>
            <td><span><?php __('Nombre'); ?></span></td>
            <td><?php echo $transportista['Transportista']['nombre']; ?></td>
            <td><span><?php __('Código cliente'); ?></span></td>
            <td><?php echo $transportista['Transportista']['codigocliente']; ?></td>
        </tr>
        <tr>
            <td><span><?php __('Descripción'); ?></span></td>
            <td colspan="3"><?php echo $transportista['Transportista']['descripcion']; ?></td>
        </tr>
        <tr>
            <td><span><?php __('Observaciones'); ?></span></td>
            <td colspan="3"><?php echo $transportista['Transportista']['observaciones']; ?></td>
        </tr>
    </table>
    <div class="datagrid">
        <table>
            <caption>Teléfonos <?php echo $this->Html->link('Añadir', array('controller' => 'telefonos', 'action' => 'add', 'transportista', $transportista['Transportista']['id']), array('class' => 'popup button_brownie')); ?> </caption>
            <thead>
                <tr><th>Número</th><th>Eliminar</th></tr>
            </thead>
            <tfoot>
                <tr><td colspan="2"></td></tr>
            </tfoot>
            <tbody>
                <?php foreach ($transportista['Telefono'] as $telefono): ?>
                    <tr>
                        <td><?php echo $telefono['telefono'] ?></td>
                        <td>
                            <?php echo $html->link(__('Eliminar', true), array('controller' => 'telefonos', 'action' => 'delete', $telefono['id']), array('class' => 'button_brownie'), sprintf(__('¿Seguro que quieres borrar el teléfono # %s?', true), $telefono['telefono'])); ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>