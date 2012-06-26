<div class="tiposivas">
    <h2>
        <?php __('Tiposiva'); ?>
        <?php echo $this->Html->link(__('Editar Tipo de iva', true), array('action' => 'edit', $tiposiva['Tiposiva']['id']),array('class'=>'button_link')); ?> 
        <?php echo $this->Html->link(__('Listar Tipos de iva', true), array('action' => 'index'),array('class'=>'button_link')); ?>
        <?php echo $this->Html->link(__('Eliminar Tipo de iva', true), array('action' => 'delete', $tiposiva['Tiposiva']['id']),array('class'=>'button_link'), sprintf(__('Seguro que quieres borrar el tipo de IVA # %s?', true), $tiposiva['Tiposiva']['tipoiva'])); ?> 
    </h2>
    <table class="view">
        <tr>
            <td><span><?php __('Denominación'); ?></span></td>
            <td><?php echo $tiposiva['Tiposiva']['tipoiva']; ?></td>
        </tr>
        <tr>
            <td><span><?php __('Porcentaje Aplicable'); ?></span></td>
            <td><?php echo $tiposiva['Tiposiva']['porcentaje_aplicable']; ?></td>
        </tr>
    </table>
</div>