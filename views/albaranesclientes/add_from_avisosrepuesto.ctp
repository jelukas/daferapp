<div class="albaranesclientes form">
    <?php echo $this->Form->create('Albaranescliente', array('type' => 'file')); ?>
    <fieldset>
        <legend><?php __('Nuevo Albaran de Cliente proveniente del Aviso de Repuestos ' . $avisosrepuesto['Avisosrepuesto']['id']); ?></legend>
        <?php
        echo "<h3>Cliente: ".$avisosrepuesto['Cliente']['nombre'].'</h3>';
        echo $this->Form->input('fecha');
        echo $this->Form->input('numeroalbaran');
        echo $this->Form->input('observaciones');
        echo $this->Form->input('file', array('type' => 'file', 'label' => 'Factura Escaneada'));
        echo $this->Form->input('avisosrepuesto_id', array('type' => 'hidden', 'value' => $avisosrepuesto['Avisosrepuesto']['id']));
        echo $this->Form->input('tiposiva_id');
        echo $this->Form->input('facturable');
        echo $this->Form->input('cliente_id', array('type' => 'hidden', 'value' => $avisosrepuesto['Avisosrepuesto']['cliente_id']));
        ?>
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
