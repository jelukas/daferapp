
<?php foreach ($cliente_list as $cliente): ?>
    <?php if (!empty($cliente['Albaranescliente']) || !empty($cliente['Albaranesclientesreparacione'])): ?>
        <h2><?php echo $cliente['Cliente']['nombre'] ?></h2>
        <?php if ($cliente['Cliente']['modo_facturacion'] == 'albaran'): ?>
            <h3>Este Cliente Factura por Albarán</h3>
            <?php foreach ($cliente['Albaranescliente'] as $albaranescliente): ?>
                <h4>Nueva Posible Factura</h4>
                <table class="albaranesclientes_list">
                    <caption>Albaranes de Repuestos incluidos en la Posible Factura</caption>
                    <tr>
                        <th>Número</th>
                        <th>Centro de Trabajo</th>
                        <th>Máquina</th>
                    </tr>
                    <tr>
                        <td><?php echo $albaranescliente['numero'] ?></td>
                        <td><?php echo!empty($albaranescliente['Centrostrabajo']) ? $albaranescliente['Centrostrabajo']['centrotrabajo'] : '' ?></td>
                        <td><?php echo!empty($albaranescliente['Maquina']) ? $albaranescliente['Maquina']['nombre'] : '' ?></td>
                    </tr>
                </table>
            <?php endforeach; ?>
        <?php endif; ?>
        <?php if ($cliente['Cliente']['modo_facturacion'] == 'centrotrabajo'): ?>
            <h3>Este Cliente Factura por Centro de Trabajo</h3>
            <?php foreach ($cliente['Albaranescliente'] as $albaranescliente): ?>
                <h4>Nueva Posible Factura</h4>
                <table class="albaranesclientes_list">
                    <caption>Albaranes de Repuestos incluidos en la Posible Factura</caption>
                    <tr>
                        <th>Número</th>
                        <th>Centro de Trabajo</th>
                        <th>Máquina</th>
                    </tr>
                    <tr>
                        <td><?php echo $this->Html->Link($albaranescliente['numero'],array('controller' => 'albaranesclientes','action'=>'view',$albaranescliente['id'])) ?></td>
                        <td><?php echo!empty($albaranescliente['Centrostrabajo']) ? $albaranescliente['Centrostrabajo']['centrotrabajo'] : '' ?></td>
                        <td><?php echo!empty($albaranescliente['Maquina']) ? $albaranescliente['Maquina']['nombre'] : '' ?></td>
                    </tr>
                </table>
            <?php endforeach; ?>
        <?php endif; ?>
    <?php endif; ?>
<?php endforeach; ?>
