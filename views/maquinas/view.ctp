<div class="maquinas">
    <h2>
        <?php __('Máquina'); ?>		
        <?php echo $this->Html->link(__('Editar ', true), array('action' => 'edit', $maquina['Maquina']['id']), array('class' => 'button_link')); ?>		
        <?php echo $this->Html->link(__('Borrar', true), array('action' => 'delete', $maquina['Maquina']['id']), array('class' => 'button_link'), sprintf(__('Are you sure you want to delete # %s?', true), $maquina['Maquina']['nombre'])); ?>		
        <?php echo $this->Html->link(__('Listar', true), array('action' => 'index'), array('class' => 'button_link')); ?>		
        <?php echo $this->Html->link(__('Nueva Máquina', true), array('action' => 'add'), array('class' => 'button_link')); ?>		
    </h2>
    <table class="view">
        <tr>
            <td><span>Código Máquina</span></td>
            <td><?php echo $maquina['Maquina']['codigo']; ?></td>
            <td><span>Cliente</span></td>
            <td><?php echo $this->Html->link($maquina['Centrostrabajo']['Cliente']['nombre'], array('controller' => 'clientes', 'action' => 'view', $maquina['Centrostrabajo']['Cliente']['id'])); ?></td>
            <td><span>Centro de Trabajo</span></td>
            <td><?php echo $this->Html->link($maquina['Centrostrabajo']['centrotrabajo'], array('controller' => 'centrostrabajos', 'action' => 'view', $maquina['Centrostrabajo']['id'])); ?></td>
        </tr>
        <tr>
            <td><span>Modelo</span></td>
            <td><?php echo $maquina['Maquina']['nombre']; ?></td>
            <td><span>Observaciones</span></td>
            <td colspan="3"><?php echo $maquina['Maquina']['observaciones']; ?></td>
        </tr>
        <tr>
            <td><span>Serie Máquina</span></td>
            <td><?php echo $maquina['Maquina']['serie_maquina']; ?></td>
            <td><span>Modelo Motor</span></td>
            <td><?php echo $maquina['Maquina']['modelo_motor']; ?></td>
            <td><span>Serie Motor</span></td>
            <td><?php echo $maquina['Maquina']['serie_motor']; ?></td>
        </tr>
        <tr>
            <td><span>Modelo Transmisión</span></td>
            <td><?php echo $maquina['Maquina']['modelo_transmision']; ?></td>
            <td><span>Serie Transmisión</span></td>
            <td><?php echo $maquina['Maquina']['serie_transmision']; ?></td>
            <td><span>Año Fabricación</span></td>
            <td><?php echo $maquina['Maquina']['anio_fabricacion']; ?></td>
        </tr>
        <tr>
            <td><span>Horas de la Máquina</span></td>
            <td><?php echo $maquina['Maquina']['horas']; ?></td>
        </tr>
    </table>
    <?php echo $this->Form->create('Presupuestoscliente', array('action' => 'add')); ?>
    <?php echo $this->Form->input('Cliente.id', array('type' => 'hidden', 'value' => $maquina['Centrostrabajo']['Cliente']['id'])); ?>
    <fieldset>
        <legend>
            Mantenimientos
            <?php echo $this->Html->link(__('Añadir Articulo', true), array('controller' => 'Articulosparamantenimientos', 'action' => 'add', $maquina['Maquina']['id']), array('class' => 'button_link popup')); ?>			
        </legend>
        <table class="view">
            <tr>
                <th>Referencia</th>
                <th>Articulo</th>
                <th>Cantidad</th>
                <th>Stock</th>
                <th>Localización</th>
                <th>Precio Ud.</th>
                <th>Borrar</th>
                <th>Validar</th>
            </tr>
            <?php if (!empty($maquina['Articulosparamantenimiento'])): ?>
                <?php $j = 0; ?>
                <?php foreach ($maquina['Articulosparamantenimiento'] as $articulosparamantenimiento): ?>
                    <tr>
                        <td><?php echo $articulosparamantenimiento['Articulo']['ref'] ?></td>
                        <td><?php echo $articulosparamantenimiento['Articulo']['nombre'] ?></td>
                        <td><?php echo $articulosparamantenimiento['cantidad'] ?></td>
                        <td><?php echo $articulosparamantenimiento['Articulo']['existencias'] ?></td>
                        <td><?php echo $articulosparamantenimiento['Articulo']['localizacion'] ?></td>
                        <td><?php echo $articulosparamantenimiento['Articulo']['precio_sin_iva'] ?></td>
                        <td class="actions"><?php echo $this->Html->link(__('Borrar', true), array('controller' => 'articulosparamantenimientos', 'action' => 'delete', $articulosparamantenimiento['id']), array('class' => 'button_link'), sprintf(__('Are you sure you want to delete # %s?', true), $articulosparamantenimiento['Articulo']['ref'])); ?></td>
                        <td><?php echo $this->Form->input('Articulosparamantenimiento.' . $j . '.id', array('type' => 'checkbox', 'label' => false, 'hiddenField' => false, 'value' => $articulosparamantenimiento['id'])); ?></td>
                    </tr>
                    <?php $j++; ?>
                <?php endforeach; ?>
            <?php endif; ?>
        </table>
        <?php echo $this->Form->end('Nuevo Presupuesto a Cliente') ?>	
    </fieldset>
    <fieldset>
        <legend>
            Otros Repuestos
            <?php echo $this->Html->link(__('Añadir Articulo', true), array('controller' => 'Otrosrepuestos', 'action' => 'add', $maquina['Maquina']['id']), array('class' => 'button_link popup')); ?>			
        </legend>
        <table class="view">
            <tr>
                <th>Referencia</th>
                <th>Articulo</th>
                <th>Cantidad</th>
                <th>Stock</th>
                <th>Localización</th>
                <th>Precio Ud.</th>
                <th>Eliminar</th>
            </tr>
            <?php if (!empty($maquina['Otrosrepuesto'])): ?>
                <?php $j = 0; ?>
                <?php foreach ($maquina['Otrosrepuesto'] as $otrosrepuesto): ?>
                    <tr>
                        <td><?php echo $otrosrepuesto['Articulo']['ref'] ?></td>
                        <td><?php echo $otrosrepuesto['Articulo']['nombre'] ?></td>
                        <td><?php echo $otrosrepuesto['cantidad'] ?></td>
                        <td><?php echo $otrosrepuesto['Articulo']['existencias'] ?></td>
                        <td><?php echo $otrosrepuesto['Articulo']['localizacion'] ?></td>
                        <td><?php echo $otrosrepuesto['Articulo']['precio_sin_iva'] ?></td>
                        <td class="actions"><?php echo $this->Html->link(__('Borrar', true), array('controller' => 'otrosrepuestos', 'action' => 'delete', $otrosrepuesto['id']), array('class' => 'button_link'), sprintf(__('Are you sure you want to delete # %s?', true), $otrosrepuesto['Articulo']['ref'])); ?></td>
                    </tr>
                    <?php $j++; ?>
                <?php endforeach; ?>
            <?php endif; ?>
        </table>
    </fieldset>
</div>
