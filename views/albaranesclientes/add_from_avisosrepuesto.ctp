<div class="albaranesclientes">
    <?php echo $this->Form->create('Albaranescliente', array('type' => 'file')); ?>
    <fieldset>
        <legend><?php __('Nuevo Albaran de Cliente proveniente del Aviso de Repuestos ' . $avisosrepuesto['Avisosrepuesto']['numero']); ?></legend>
        <table class="view">
            <tr>
                <td><span><?php __('Número'); ?></span></td>
                <td>
                    <?php
                    echo $this->Form->input('id');
                    echo $this->Form->input('numero', array('label' => False,'value' => $numero));
                    ?>
                </td>
                <td><span><?php __('Fecha'); ?></span></td>
                <td><?php echo $this->Form->input('fecha', array('label' => False)); ?></td>
                <td><span><?php __('Almacén de los Materiales'); ?></span></td>
                <td><?php echo $this->Form->input('almacene_id', array('label' => False)); ?></td>
                <td><span><?php __('Comercial'); ?></span></td>
                <td><?php echo $this->Form->input('comerciale_id', array('label' => False, 'empty' => ' -- Ninguno --')); ?></td>
            </tr>
            <tr>
                <td><span><?php __('Cliente') ?></span></td>
                <td><?php echo $this->Form->input('cliente_id', array('type' => 'hidden', 'label' => False, 'value' => $avisosrepuesto['Cliente']['id'])); ?><?php echo $avisosrepuesto['Cliente']['nombre']; ?></td>
                <td><span><?php __('Centro de Trabajo') ?> </span></td>
                <td><?php echo $this->Form->input('centrostrabajo_id', array('type' => 'hidden', 'label' => False, 'value' => $avisosrepuesto['Avisosrepuesto']['centrostrabajo_id'])); ?><?php echo $avisosrepuesto['Centrostrabajo']['centrotrabajo']; ?></td>
                <td><span><?php __('Maquina') ?> </span></td>
                <td><?php echo $this->Form->input('maquina_id', array('type' => 'hidden', 'label' => False, 'value' => $avisosrepuesto['Avisosrepuesto']['maquina_id'])); ?><?php echo $avisosrepuesto['Maquina']['nombre']; ?></td>
            </tr>
            <tr>
                <td>
                    <h4><?php __('Aviso de Repuestos'); ?></h4>
                    <?php echo $this->Form->input('avisosrepuesto_id', array('type' => 'hidden', 'value' => $avisosrepuesto['Avisosrepuesto']['id'])); ?>
                </td>
                <td><?php echo $this->Html->link($avisosrepuesto['Avisosrepuesto']['numero'], array('controller' => 'avisosrepuestos', 'action' => 'view', $avisosrepuesto['Avisosrepuesto']['id'])); ?></td>
                <td><span><?php __('Centro de Trabajo del Aviso'); ?></span></td>
                <td><?php echo $avisosrepuesto['Centrostrabajo']['centrotrabajo']; ?></td>
                <td><span><?php __('Máquina'); ?></span></td>
                <td><?php echo $this->Html->link($avisosrepuesto['Maquina']['nombre'], array('controller' => 'maquinas', 'action' => 'view', $avisosrepuesto['Maquina']['id'])); ?></td>
                <td><span><?php __('Nº Serie Máquina'); ?></span></td>
                <td><?php echo $avisosrepuesto['Maquina']['serie_maquina']; ?></td>
                <td><span><?php __('Horas'); ?></span></td>
                <td><?php echo $avisosrepuesto['Avisosrepuesto']['horas_maquina']; ?></td>
            </tr>
            <tr>
                <td><span><?php __('Albarán Escaneado'); ?></span></td>
                <td colspan="5">
                    <?php
                    echo $this->Form->input('file', array('type' => 'file', 'label' => False));
                    ?>
                </td>
                <td><span><?php __('Estado') ?></span></td>
                <td><?php echo $this->Form->input('estadosalbaranescliente_id', array('label' => False)) ?></td>
            </tr>
            <tr>
                <td><span><?php __('Observaciones'); ?></span></td>
                <td colspan="5"><?php echo $this->Form->input('observaciones', array('label' => False)); ?></td>
            </tr>
            <tr>
                <td><span><?php __('Centro de Coste') ?></span></td>
                <td><?php echo $this->Form->input('centrosdecoste_id', array('label' => False)); ?></td>
                <td><span><?php __('Tipo de IVA Aplicado') ?></span></td>
                <td><?php echo $this->Form->input('tiposiva_id', array('label' => False)); ?></td>
                <td><span><?php __('Facturable'); ?></span></td>
                <td><?php echo $this->Form->input('facturable', array('label' => False,'checked' => True)); ?></td>
            </tr>
        </table>
        <div class="related">
            <h4>Materiales</h4>
            <table>
                <tr>
                    <th>Articulo</th>
                    <th>Cantidad</th>
                    <th>Validar</th>
                </tr>
                <?php $l = 0; ?>
                <?php foreach ($avisosrepuesto['ArticulosAvisosrepuesto'] as $materiale): ?>
                    <tr>
                        <td><?php echo $materiale['Articulo']['nombre'] ?></td>
                        <td><?php echo $materiale['cantidad'] ?></td>
                        <td><?php echo $this->Form->input('ArticulosAvisosrepuesto.' . $l . '.id', array('label' => '', 'type' => 'checkbox', 'checked' => true, 'value' => $materiale['id'])) ?></td>
                    </tr>
                    <?php $l++; ?>
                <?php endforeach; ?>
            </table>
        </div>
    </fieldset>
    <?php echo $this->Form->end(__('Guardar', true)); ?>
</div>
