<div>
    <p style="margin-bottom: 15px;font-style: italic;">* Solo se muestran los albaranes de venta confirmados que son posibles facturar.</p>
    <?php echo $this->Form->create('FacturasCliente', array('action' => 'facturar')) ?>
    <?php echo $this->Form->submit('FACTURAR'); ?>
    <?php $factura_index = 0; ?>
    <?php foreach ($cliente_list as $cliente): ?>
        <h3><?php echo $cliente['Cliente']['nombre'] ?> </h3>
        <?php if ($cliente['Cliente']['modo_facturacion'] == 'centrotrabajo'): ?>
            <?php foreach ($cliente['Centrostrabajo'] as $centrostrabajo): ?>
                <?php if (!empty($centrostrabajo['Albaranescliente'])): ?>
                    <h4>Posible Factura:
                        <?php
                        echo $centrostrabajo['centrotrabajo'];
                        $factura_index++;
                        ?> - <?php echo $centrostrabajo['direccion'] ?> - Id: <?php echo $centrostrabajo['id'] ?></h4>
                    <table class="index">
                        <tr>
                            <th>Numero</th>
                            <th>Fecha</th>
                            <th>Pedido de Venta</th>
                            <th>Aviso de Repuestos</th>
                            <th>Facturable</th>
                            <th>Documento de Confirmación</th>
                            <th>Total</th>
                            <th>Marcar</th>
                        </tr>
                        <?php foreach ($centrostrabajo['Albaranescliente'] as $albaran): ?>
                            <tr>
                                <td><?php echo $this->Html->link($albaran['Albaranescliente']['numero'], array('controller' => 'albaranesclientes', 'action' => 'view', $albaran['Albaranescliente']['id'])) ?></td>
                                <td><?php echo $albaran['Albaranescliente']['fecha'] ?></td>
                                <td><?php echo $albaran['Albaranescliente']['pedidoscliente_id'] ?></td>
                                <td><?php echo $albaran['Albaranescliente']['avisosrepuesto_id'] ?></td>
                                <td><?php echo $albaran['Albaranescliente']['facturable'] == 0 ? 'No' : 'Si' ?></td>
                                <td><?php echo $albaran['Albaranescliente']['albaranescaneado'] ?></td>
                                <td><?php echo $albaran['Albaranescliente']['precio'] ?></td>
                                <td><?php echo $this->Form->checkbox('marcado', array('name' => 'data[facturable][' . $factura_index . '][]', 'hiddenField' => false, 'checked' => true, 'value' => $albaran['Albaranescliente']['id'])) ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </table>
                <?php endif; ?>
            <?php endforeach; ?>
        <?php elseif ($cliente['Cliente']['modo_facturacion'] == 'maquina'): ?>
            <?php foreach ($cliente['Centrostrabajo'] as $centrostrabajo): ?>
                <?php foreach ($centrostrabajo['Maquina'] as $maquina): ?>
                    <?php if (!empty($maquina['Albaranescliente'])): ?>
                        <h4>Posible Factura: <?php
                    echo $maquina['nombre'];
                    $factura_index++;
                        ?> -- Id: <?php echo $maquina['id'] ?></h4>
                        <table class="index">
                            <tr>
                                <th>Numero</th>
                                <th>Fecha</th>
                                <th>Pedido de Venta</th>
                                <th>Aviso de Repuestos</th>
                                <th>Facturable</th>
                                <th>Documento de Confirmación</th>
                                <th>Total</th>
                                <th>Marcar</th>
                            </tr>
                            <?php foreach ($maquina['Albaranescliente'] as $albaran): ?>
                                <tr>
                                    <td><?php echo $this->Html->link($albaran['Albaranescliente']['numero'], array('controller' => 'albaranesclientes', 'action' => 'view', $albaran['Albaranescliente']['id'])) ?></td>
                                    <td><?php echo $albaran['Albaranescliente']['fecha'] ?></td>
                                    <td><?php echo $albaran['Albaranescliente']['pedidoscliente_id'] ?></td>
                                    <td><?php echo $albaran['Albaranescliente']['avisosrepuesto_id'] ?></td>
                                    <td><?php echo $albaran['Albaranescliente']['facturable'] == 0 ? 'No' : 'Si' ?></td>
                                    <td><?php echo $albaran['Albaranescliente']['albaranescaneado'] ?></td>
                                    <td><?php echo $albaran['Albaranescliente']['precio'] ?></td>
                                    <td><?php echo $this->Form->checkbox('marcado', array('name' => 'data[facturable][' . $factura_index . '][]', 'hiddenField' => false, 'checked' => true, 'value' => $albaran['Albaranescliente']['id'])) ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </table>
                    <?php endif; ?>
                <?php endforeach; ?>       
            <?php endforeach; ?>       
        <?php elseif ($cliente['Cliente']['modo_facturacion'] == 'albaran'): ?>
            <?php if (!empty($cliente['Cliente']['Albaranescliente'])): ?>
                <?php foreach ($cliente['Cliente']['Albaranescliente'] as $albaran): ?>
                    <h4>Posible Factura: <?php
                echo $albaran['Albaranescliente']['numero'];
                $factura_index++;
                    ?> -- Id: <?php echo $albaran['Albaranescliente']['id'] ?></h4>
                    <table class="index">
                        <tr>
                            <th>Numero</th>
                            <th>Fecha</th>
                            <th>Pedido de Venta</th>
                            <th>Aviso de Repuestos</th>
                            <th>Facturable</th>
                            <th>Documento de Confirmación</th>
                            <th>Total</th>
                            <th>Marcar</th>
                        </tr>
                        <tr>
                            <td><?php echo $this->Html->link($albaran['Albaranescliente']['numero'], array('controller' => 'albaranesclientes', 'action' => 'view', $albaran['Albaranescliente']['id'])) ?></td>
                            <td><?php echo $albaran['Albaranescliente']['fecha'] ?></td>
                            <td><?php echo $albaran['Albaranescliente']['pedidoscliente_id'] ?></td>
                            <td><?php echo $albaran['Albaranescliente']['avisosrepuesto_id'] ?></td>
                            <td><?php echo $albaran['Albaranescliente']['facturable'] == 0 ? 'No' : 'Si' ?></td>
                            <td><?php echo $albaran['Albaranescliente']['albaranescaneado'] ?></td>
                            <td><?php echo $albaran['Albaranescliente']['precio'] ?></td>
                            <td><?php echo $this->Form->checkbox('marcado', array('name' => 'data[facturable][' . $factura_index . '][]', 'hiddenField' => false, 'checked' => true, 'value' => $albaran['Albaranescliente']['id'])) ?></td>
                        </tr>
                    </table>
                <?php endforeach; ?>
            <?php endif; ?>
        <?php elseif ($cliente['Cliente']['modo_facturacion'] == 'todo'): ?>
            <?php if (!empty($cliente['Cliente']['Albaranescliente'])): ?>
                <h4>Posible Factura de Todo</h4><?php $factura_index++; ?>
                <table class="index">
                    <tr>
                        <th>Numero</th>
                        <th>Fecha</th>
                        <th>Pedido de Venta</th>
                        <th>Aviso de Repuestos</th>
                        <th>Facturable</th>
                        <th>Documento de Confirmación</th>
                        <th>Total</th>
                        <th>Marcar</th>
                    </tr>
                    <?php foreach ($cliente['Cliente']['Albaranescliente'] as $albaran): ?>
                        <tr>
                            <td><?php echo $this->Html->link($albaran['Albaranescliente']['numero'], array('controller' => 'albaranesclientes', 'action' => 'view', $albaran['Albaranescliente']['id'])) ?></td>
                            <td><?php echo $albaran['Albaranescliente']['fecha'] ?></td>
                            <td><?php echo $albaran['Albaranescliente']['pedidoscliente_id'] ?></td>
                            <td><?php echo $albaran['Albaranescliente']['avisosrepuesto_id'] ?></td>
                            <td><?php echo $albaran['Albaranescliente']['facturable'] == 0 ? 'No' : 'Si' ?></td>
                            <td><?php echo $albaran['Albaranescliente']['albaranescaneado'] ?></td>
                            <td><?php echo $albaran['Albaranescliente']['precio'] ?></td>
                            <td><?php echo $this->Form->checkbox('marcado', array('name' => 'data[facturable][' . $factura_index . '][]', 'hiddenField' => false, 'checked' => true, 'value' => $albaran['Albaranescliente']['id'])) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            <?php endif; ?>
        <?php endif; ?>
    <?php endforeach; ?>
    <?php echo $this->Form->end('FACTURAR'); ?>
</div>