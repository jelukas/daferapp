<div class="mecanicos">
    <h2>
        <?php __('Ficha de Mecánico ' . $mecanico['Mecanico']['nombre']); ?>
        <?php echo $this->Html->link(__('Editar', true), array('action' => 'edit', $mecanico['Mecanico']['id']), array('class' => 'button_link')); ?> 
        <?php echo $this->Html->link(__('Eliminar', true), array('action' => 'delete', $mecanico['Mecanico']['id']), array('class' => 'button_link'), sprintf(__('¿Está seguro que desea eliminar # %s?', true), $mecanico['Mecanico']['nombre'])); ?> 
        <?php echo $this->Html->link(__('Listar', true), array('action' => 'index'), array('class' => 'button_link')); ?> 
    </h2>
    <table class="view">
        <tr>
            <td><span>Nombre</span></td>
            <td><?php echo $mecanico['Mecanico']['nombre']; ?></td>
            <td><span>DNI</span></td>
            <td><?php echo $mecanico['Mecanico']['dni']; ?></td>
        </tr>
        <tr>
            <td><span>Fecha de Alta</span></td>
            <td><?php echo $mecanico['Mecanico']['fechaalta']; ?></td>
        </tr>
        <tr>
           <td><span>Observaciones</span></td>
            <td><?php echo $mecanico['Mecanico']['observaciones']; ?></td>
        </tr>
    </table>
</div>