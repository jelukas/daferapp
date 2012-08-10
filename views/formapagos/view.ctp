<div class="formapagos">
    <h2>
        <?php __('Forma de Pago'); ?>
        <?php echo $this->Html->link(__('Editar', true), array('action' => 'edit', $formapago['Formapago']['id']), array('class' => 'button_link')); ?>
        <?php echo $this->Html->link(__('Borrar', true), array('action' => 'delete', $formapago['Formapago']['id']), array('class' => 'button_link'), sprintf(__('¿Seguro que quieres borrar la forma de pago # %s?', true), $formapago['Formapago']['nombre'])); ?>
    </h2>
    <table class="view edit">
        <tr>
            <td><span>Nombre</span></td>
            <td colspan="3">
                <?php echo $formapago['Formapago']['nombre']; ?>
            </td>
        </tr>
        <tr>
            <td><span style="padding-bottom: 5px;">Tipo de Pago</span></td>
            <td>
                
                <?php echo $formapago['Formapago']['tipodepago']; ?>
            </td>
            <td><span>Número de Vencimientos</span></td>
            <td>
                <?php echo $formapago['Formapago']['numero_vencimientos']; ?>
            </td>
            <td><span>Días entre Vencimientos</span></td>
            <td>
                <?php echo $formapago['Formapago']['dias_entre_vencimiento']; ?>
            </td>
        </tr>
        <tr>
            <td><span>Día Mes Fijo Vencimiento</span></td>
            <td colspan="3">
                <?php echo $formapago['Formapago']['dia_mes_fijo_vencimiento']; ?>
            </td>
        </tr>
         <?php if(!empty($formapago['Proveedore']['nombre'])): ?>
        <tr>
            <td><span>Proveedor</span></td>
            <td colspan="3">
                <?php echo $this->Html->link($formapago['Proveedore']['nombre'], array('controller' => 'proveedores', 'action' => 'view', $formapago['Proveedore']['id'])); ?>
            </td>
        </tr>
        <?php endif; ?>
        <?php if(!empty($formapago['Cliente']['nombre'])): ?>
        <tr>
            <td><span>Cliente</span></td>
            <td colspan="3">
                
                <?php echo $this->Html->link($formapago['Cliente']['nombre'], array('controller' => 'clientes', 'action' => 'view', $formapago['Cliente']['id'])); ?>
            </td>
        </tr>
        <?php endif; ?>
    </table>
</div>