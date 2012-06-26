<div class="centrosdecostes">
    <h2>
        <?php __('Centros de Coste'); ?>
        <?php echo $this->Html->link(__('Editar', true), array('action' => 'edit', $centrosdecoste['Centrosdecoste']['id']), array('class' => 'button_link')); ?>
        <?php echo $this->Html->link(__('Eliminar', true), array('action' => 'delete', $centrosdecoste['Centrosdecoste']['id']), array('class' => 'button_link'), sprintf(__('Seguro que quieres eliminar el Centro de Coste # %s?', true), $centrosdecoste['Centrosdecoste']['denominacion'])); ?>
        <?php echo $this->Html->link(__('Listar Centros de Coste', true), array('action' => 'index'), array('class' => 'button_link')); ?>
        <?php echo $this->Html->link(__('Nuevo Centro de Coste', true), array('action' => 'add'), array('class' => 'button_link')); ?>
    </h2>
    <table class="view">
        <tr>
            <td><span>Denominación</span></td>
            <td><?php echo $centrosdecoste['Centrosdecoste']['denominacion']; ?></td>
        </tr>
        <tr>
            <td><span>Código</span></td>
            <td><?php echo $centrosdecoste['Centrosdecoste']['codigo']; ?></td>
        </tr>
    </table>
</div>