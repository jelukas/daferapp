<p style="margin-bottom: 15px;font-style: italic;">* Solo se muestran los albaranes no facturados y con la casilla Facturable marcada</p>
<?php echo $this->Form->create('FacturasCliente', array('action' => 'facturar')) ?>
<?php echo $this->Form->submit('FACTURAR'); ?>
<?php $factura_index = 0; ?>
<?php foreach ($cliente_facturable_list as $cliente_facturable): ?>
    <?php
    /*
     * En el caso de que el modo de facturacion sea por albaran
     */
    ?>
    <?php if ($cliente_facturable['Cliente']['modo_facturacion'] == 'albaran'): ?>
        <?php if (!empty($cliente_facturable['Albaranescliente']) || !empty($cliente_facturable['Albaranesclientesreparacione'])): ?>
            <h2><?php echo $cliente_facturable['Cliente']['nombre'] ?></h2>
            <?php foreach ($cliente_facturable['Albaranescliente'] as $albaranescliente): ?>
                <h3>Nueva Posible Factura Nº <?php echo $siguiente_numero ?></h3>
                <?php $factura_index++ ?>
                <table>
                    <caption>Albaranes de Repuestos</caption>
                    <tr>
                        <th>Número</th>
                        <th>Fecha</th>
                        <th>Centro de Trabajo</th>
                        <th>Máquina</th>
                        <th>Validar</th>
                    </tr>
                    <tr>
                        <td><?php echo $albaranescliente['numero'] ?></td>
                        <td><?php echo $albaranescliente['fecha'] ?></td>
                        <td><?php echo @$albaranescliente['Centrostrabajo']['centrotrabajo'] ?></td>
                        <td><?php echo @$albaranescliente['Maquina']['nombre'] ?></td>
                        <td>
                            <?php echo $this->Form->checkbox('marcado', array('name' => 'data[facturable][' .$factura_index . '][albaranescliente][]', 'hiddenField' => false, 'checked' => true, 'value' => $albaranescliente['id'])) ?>
                            <?php echo $this->Form->hidden('cliente_id', array('name' => 'data[facturable][' .$factura_index . '][cliente_id]', 'value' => $cliente_facturable['Cliente']['id'])) ?>
                            <?php echo $this->Form->hidden('numero', array('name' => 'data[facturable][' .$factura_index . '][numero]', 'value' => $siguiente_numero)); ?>
                        </td>
                    </tr>
                </table>
                <?php $siguiente_numero++ ?>
            <?php endforeach; ?>
            <?php foreach ($cliente_facturable['Albaranesclientesreparacione'] as $albaranesclientesreparacione): ?>
                <h3>Nueva Posible Factura Nº <?php echo $siguiente_numero ?></h3>
                <?php $factura_index++ ?>
                <table>
                    <caption>Albaranes de Reparación</caption>
                    <tr>
                        <th>Número</th>
                        <th>Fecha</th>
                        <th>Centro de Trabajo</th>
                        <th>Máquina</th>
                        <th>Validar</th>
                    </tr>
                    <tr>
                        <td><?php echo $albaranesclientesreparacione['numero'] ?></td>
                        <td><?php echo $albaranesclientesreparacione['fecha'] ?></td>
                        <td><?php echo @$albaranesclientesreparacione['Centrostrabajo']['centrotrabajo'] ?></td>
                        <td><?php echo @$albaranesclientesreparacione['Maquina']['nombre'] ?></td>
                        <td>
                            <?php echo $this->Form->checkbox('marcado', array('name' => 'data[facturable][' . $factura_index . '][albaranesclientesreparacione][]', 'hiddenField' => false, 'checked' => true, 'value' => $albaranesclientesreparacione['id'])) ?>
                            <?php echo $this->Form->hidden('cliente_id', array('name' => 'data[facturable][' .$factura_index . '][cliente_id]', 'value' => $cliente_facturable['Cliente']['id'])) ?>
                            <?php echo $this->Form->hidden('numero', array('name' => 'data[facturable][' .$factura_index . '][numero]', 'value' => $siguiente_numero)); ?>
                        </td>
                    </tr>
                </table>
                <?php $siguiente_numero++ ?>
            <?php endforeach; ?>
        <?php endif; ?>
    <?php endif; ?>
    <?php
    /*
     * En el caso de que el modo de facturacion sea por centrotrabajo
     */
    ?>
    <?php if ($cliente_facturable['Cliente']['modo_facturacion'] == 'centrotrabajo'): ?>
        <h2><?php echo $cliente_facturable['Cliente']['nombre'] ?></h2>
        <?php foreach ($cliente_facturable['Centrostrabajo'] as $centrostrabajo): ?>
            <?php if (!empty($centrostrabajo['Albaranescliente']) || !empty($centrostrabajo['Albaranesclientesreparacione'])): ?>
                <h3>Nueva Posible Factura Nº <?php echo $siguiente_numero ?> -- Centro: <?php echo $centrostrabajo['centrotrabajo'] ?></h3>
                <?php $factura_index++ ?>
                <?php if (!empty($centrostrabajo['Albaranescliente'])): ?>
                    <table>
                        <caption>Albaranes de Repuestos</caption>
                        <tr>
                            <th>Número</th>
                            <th>Fecha</th>
                            <th>Centro de Trabajo</th>
                            <th>Máquina</th>
                            <th>Validar</th>
                        </tr>
                        <?php foreach ($centrostrabajo['Albaranescliente'] as $albaranescliente): ?>
                            <tr>
                                <td><?php echo $albaranescliente['numero'] ?></td>
                                <td><?php echo $albaranescliente['fecha'] ?></td>
                                <td><?php echo @$centrostrabajo['centrotrabajo'] ?></td>
                                <td><?php echo @$albaranescliente['Maquina']['nombre'] ?></td>
                                <td>
                                    <?php echo $this->Form->checkbox('marcado', array('name' => 'data[facturable][' . $factura_index . '][albaranescliente][]', 'hiddenField' => false, 'checked' => true, 'value' => $albaranescliente['id'])) ?>
                                    <?php echo $this->Form->hidden('cliente_id', array('name' => 'data[facturable][' .$factura_index . '][cliente_id]', 'value' => $cliente_facturable['Cliente']['id'])) ?>
                                    <?php echo $this->Form->hidden('numero', array('name' => 'data[facturable][' .$factura_index . '][numero]', 'value' => $siguiente_numero)); ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </table>
                <?php endif; ?>
                <?php if (!empty($centrostrabajo['Albaranesclientesreparacione'])): ?>
                    <table>
                        <caption>Albaranes de Reparación</caption>
                        <tr>
                            <th>Número</th>
                            <th>Fecha</th>
                            <th>Centro de Trabajo</th>
                            <th>Máquina</th>
                            <th>Validar</th>
                        </tr>
                        <?php foreach ($centrostrabajo['Albaranesclientesreparacione'] as $albaranesclientesreparacione): ?>
                            <tr>
                                <td><?php echo $albaranesclientesreparacione['numero'] ?></td>
                                <td><?php echo $albaranesclientesreparacione['fecha'] ?></td>
                                <td><?php echo @$centrostrabajo['centrotrabajo'] ?></td>
                                <td><?php echo @$albaranesclientesreparacione['Maquina']['nombre'] ?></td>
                                <td>
                                    <?php echo $this->Form->checkbox('marcado', array('name' => 'data[facturable][' . $factura_index . '][albaranesclientesreparacione][]', 'hiddenField' => false, 'checked' => true, 'value' => $albaranesclientesreparacione['id'])) ?>
                                    <?php echo $this->Form->hidden('cliente_id', array('name' => 'data[facturable][' .$factura_index . '][cliente_id]', 'value' => $cliente_facturable['Cliente']['id'])) ?>
                                    <?php echo $this->Form->hidden('numero', array('name' => 'data[facturable][' .$factura_index . '][numero]', 'value' => $siguiente_numero)); ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </table>
                <?php endif; ?>
                <?php $siguiente_numero++ ?>
            <?php endif; ?>
        <?php endforeach; ?>
    <?php endif; ?><?php
    /*
     * En el caso de que el modo de facturacion sea por maquina
     */
    ?>
    <?php if ($cliente_facturable['Cliente']['modo_facturacion'] == 'maquina'): ?>
        <h2><?php echo $cliente_facturable['Cliente']['nombre'] ?></h2>
        <?php foreach ($cliente_facturable['Centrostrabajo'] as $centrostrabajo): ?>
            <?php foreach ($centrostrabajo['Maquina'] as $maquina): ?>
                <?php if (!empty($maquina['Albaranescliente']) || !empty($maquina['Albaranesclientesreparacione'])): ?>
                    <h3>Nueva Posible Factura Nº <?php echo $siguiente_numero ?> -- Máquina:  <?php echo $maquina['nombre'] ?></h3>
                    <?php $factura_index++ ?>
                    <?php if (!empty($maquina['Albaranescliente'])): ?>
                        <table>
                            <caption>Albaranes de Repuestos</caption>
                            <tr>
                                <th>Número</th>
                                <th>Fecha</th>
                                <th>Máquina</th>
                                <th>Validar</th>
                            </tr>
                            <?php foreach ($maquina['Albaranescliente'] as $albaranescliente): ?>
                                <tr>
                                    <td><?php echo $albaranescliente['numero'] ?></td>
                                    <td><?php echo $albaranescliente['fecha'] ?></td>
                                    <td><?php echo @$maquina['nombre'] ?></td>
                                    <td>
                                        <?php echo $this->Form->checkbox('marcado', array('name' => 'data[facturable][' . $factura_index . '][albaranescliente][]', 'hiddenField' => false, 'checked' => true, 'value' => $albaranescliente['id'])) ?>
                                        <?php echo $this->Form->hidden('cliente_id', array('name' => 'data[facturable][' .$factura_index . '][cliente_id]', 'value' => $cliente_facturable['Cliente']['id'])) ?>
                                        <?php echo $this->Form->hidden('numero', array('name' => 'data[facturable][' .$factura_index . '][numero]', 'value' => $siguiente_numero)); ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </table>
                    <?php endif; ?>
                    <?php if (!empty($maquina['Albaranesclientesreparacione'])): ?>
                        <table>
                            <caption>Albaranes de Reparación</caption>
                            <tr>
                                <th>Número</th>
                                <th>Fecha</th>
                                <th>Máquina</th>
                                <th>Validar</th>
                            </tr>
                            <?php foreach ($maquina['Albaranesclientesreparacione'] as $albaranesclientesreparacione): ?>
                                <tr>
                                    <td><?php echo $albaranesclientesreparacione['numero'] ?></td>
                                    <td><?php echo $albaranesclientesreparacione['fecha'] ?></td>
                                    <td><?php echo @$maquina['nombre'] ?></td>
                                    <td>
                                        <?php echo $this->Form->checkbox('marcado', array('name' => 'data[facturable][' . $factura_index . '][albaranesclientesreparacione][]', 'hiddenField' => false, 'checked' => true, 'value' => $albaranesclientesreparacione['id'])) ?>
                                        <?php echo $this->Form->hidden('cliente_id', array('name' => 'data[facturable][' .$factura_index . '][cliente_id]', 'value' => $cliente_facturable['Cliente']['id'])) ?>
                                        <?php echo $this->Form->hidden('numero', array('name' => 'data[facturable][' .$factura_index . '][numero]', 'value' => $siguiente_numero)); ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </table>
                    <?php endif; ?>
                    <?php $siguiente_numero++ ?>
                <?php endif; ?>
            <?php endforeach; ?>
        <?php endforeach; ?>
    <?php endif; ?>
<?php endforeach; ?>
<?php echo $this->Form->end('FACTURAR'); ?>