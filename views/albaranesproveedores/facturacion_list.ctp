<div>
    <p style="margin-bottom: 15px;font-style: italic;">* Solo se muestran los albaranes de compra confirmados que son posibles facturar.</p>
    <?php echo $this->Form->create('Facturasproveedore', array('action' => 'facturar')) ?>
    <?php echo $this->Form->submit('FACTURAR'); ?>
    <?php $factura_index = 0; ?>
    <?php foreach ($proveedore_list as $nombre => $proveedore): ?>
        <h3>Posible Factura:  <?php echo $nombre ?> </h3>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th>Nº Albarán</th>
                <th>Fecha</th>
                <th>Base Imponible</th>
                <th>Observaciones</th>
                <th>Albarán Escaneado</th>
                <th>Marcar</th>
            </tr>
            <?php
            $i = 0;

            foreach ($proveedore as $albaranesproveedore):
                $class = null;
                if ($i++ % 2 == 0) {
                    $class = ' class="altrow"';
                }
                ?>
                <tr<?php echo $class; ?>>
                    <td><?php echo $albaranesproveedore['Albaranesproveedore']['numero']; ?>&nbsp;</td>
                    <td><?php echo $albaranesproveedore['Albaranesproveedore']['fecha']; ?>&nbsp;</td>
                    <td><?php echo $albaranesproveedore['Albaranesproveedore']['baseimponible']; ?>&nbsp;</td>
                    <td><?php echo $albaranesproveedore['Albaranesproveedore']['observaciones']; ?>&nbsp;</td>
                    <td><?php echo $this->Html->link(__($albaranesproveedore['Albaranesproveedore']['albaranescaneado'], true), '/files/albaranesproveedore/' . $albaranesproveedore['Albaranesproveedore']['albaranescaneado']); ?></td>
                    <td><?php echo $this->Form->checkbox('marcado', array('name' => 'data[facturable][' . $factura_index . '][]', 'hiddenField' => false, 'checked' => true, 'value' => $albaranesproveedore['Albaranesproveedore']['id'])) ?></td>
                </tr>
                
            <?php endforeach; $factura_index++; ?>
        </table>
    <?php endforeach; ?>
    <?php echo $this->Form->end('FACTURAR'); ?>
</div>